<!doctype html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Cinema · Bootstrap</title>
        <?php 
            echo $this->Html->css('bootstrap.min.css');
            echo $this->Html->css('starter-template.css');
            echo $this->Html->css('signin.css');
        ?>
    </head>
    <body class="text-center" id="content">
        <?php 
            echo $this->fetch('content');
            echo $this->Html->script('jquery-3.4.1.min.js');
            echo $this->Html->script('bootstrap.bundle.min.js');
            echo $this->Js->writeBuffer();
        ?>
    </body>
</html>