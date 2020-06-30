function createRequestGets(tag) {
    $(tag + '[update]').each(function (index) {
        var options = [];
        options['update'] = $(this).attr('update');
        if ($(this).attr('href') != null) {
            options['url'] = $(this).attr('href');
        }
        if ($(this).attr('get-url') != null) {
            options['url'] = $(this).attr('get-url');
        }
        $(this).bind('click', function (event) {
            event.preventDefault();
            requestGet(this, options);            
            
            return true;
        });
    });
}

function createRequestPosts(tag) {
    $(tag + '[update]').each(function (index) {
        var options = [];
        options['update'] = $(this).attr('update');
        if ($(this).attr('post-url')) {
            options['url'] = $(this).attr('post-url');
        }
        $(this).bind('click', function (event) {
            event.preventDefault();
            requestPost(this, options);            
    
            return true;
        });
    });
}

function requestGet(element, options) {
    $.ajax({
        async: true,
        cache: false,
        type: 'get',
        dataType: 'html',
        url: options['url'],
        beforeSend: function () {
            if (element != null) {
                $(element).addClass('disabled');
                $(element).attr('disabled', true);                                    
            }
        }                   
    }).done(function (response) {
        $(options['update']).html(response);     
    });    
}

function requestPost(element, options) {
    if (options['url'] == null) {
        options['url'] = $(element).closest('form').attr('action');
    }
    $.ajax({
        async: true,
        cache: false,
        type: 'post',
        data: $(element).closest('form').serialize(),
        url: options['url'],
    }).done(function (response) {
        $(options['update']).html(response); 
    });
}

