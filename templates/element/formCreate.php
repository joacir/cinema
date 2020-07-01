<?php
$templates = [
    'button' => '<button{{attrs}}>{{text}}</button>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}" class="form-control"{{attrs}}>',
    'checkboxFormGroup' => '{{label}}',
    'checkboxWrapper' => '<div class="checkbox">{{label}}</div>',
	'error' => '<div class="invalid-feedback">{{content}}</div>',
	'errorList' => '<ul>{{content}}</ul>',
	'errorItem' => '<li>{{text}}</li>',
	'file' => '<input type="file" name="{{name}}"{{attrs}}>',
	'fieldset' => '<fieldset{{attrs}}>{{content}}</fieldset>',
	'formStart' => '<form{{attrs}}>',
	'formEnd' => '</form>',
	'formGroup' => '{{label}}{{input}}',
	'hiddenBlock' => '<div style="display:none;">{{content}}</div>',
	'input' => '<input type="{{type}}" name="{{name}}" class="form-control"{{attrs}}/>',
	'inputSubmit' => '<input type="{{type}}"{{attrs}}/>',
	'inputContainer' => '<div class="form-group {{type}}">{{content}}</div>',
	'inputContainerError' => '<div class="form-group {{type}}{{required}} form-error">{{content}}{{error}}</div>',
	'label' => '<label{{attrs}}>{{text}}</label>',
	'nestingLabel' => '{{hidden}}<label{{attrs}}>{{input}}{{text}}</label>',
	'legend' => '<legend>{{text}}</legend>',
	'multicheckboxTitle' => '<legend>{{text}}</legend>',
	'multicheckboxWrapper' => '<fieldset{{attrs}}>{{content}}</fieldset>',
	'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
	'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
	'select' => '<select name="{{name}}" class="form-control"{{attrs}}>{{content}}</select>',
	'selectMultiple' => '<select name="{{name}}[]" multiple="multiple" class="form-control"{{attrs}}>{{content}}</select>',
	'radio' => '<input type="radio" name="{{name}}" value="{{value}}" class="form-control"{{attrs}}>',
	'radioWrapper' => '{{label}}',
	'textarea' => '<textarea name="{{name}}"{{attrs}} class="form-control">{{value}}</textarea>',
	'submitContainer' => '{{content}}',
	'confirmJs' => '{{confirm}}',
	'selectedClass' => 'selected'
];
if ($this->request->getParam('action') == 'view') {
	$templates['input'] = '<input type="{{type}}" name="{{name}}" class="form-control" disabled="disabled" {{attrs}}/>';
	$templates['select'] = '<select name="{{name}}" class="form-control" disabled="disabled"{{attrs}}>{{content}}</select>';
	$templates['selectMultiple'] = '<select name="{{name}}[]" multiple="multiple" class="form-control" disabled="disabled"{{attrs}}>{{content}}</select>';
	$templates['textarea'] = '<textarea name="{{name}}"{{attrs}} class="form-control" disabled="disabled">{{value}}</textarea>';
}
$entity = !isset($entity) ? null : $entity;
$options = !isset($options) ? compact('templates') : array_merge(compact('templates'), $options);
$formCreate = $this->Form->create($entity, $options);

echo $formCreate;