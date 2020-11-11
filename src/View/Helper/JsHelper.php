<?php
declare(strict_types=1);

namespace App\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * Js helper
 */
class JsHelper extends Helper
{
    protected $_defaultConfig = [];
    protected $_bufferedScripts = [];

	public $helpers = ['Html'];    

    public function buffer(string $script, $top = false): void
    {
		if ($top) {
			array_unshift($this->_bufferedScripts, $script);
		} else {
			$this->_bufferedScripts[] = $script;
		}
	}

    public function writeBuffer($options = []) 
    {
        $domReady = !$this->getView()->getRequest()->is('ajax');
		$defaults = [
			'onDomReady' => $domReady, 'inline' => true,
			'cache' => false, 'clear' => true, 'safe' => true
        ];
		$options += $defaults;
		$script = implode("\n", $this->getBuffer($options['clear']));

		if (empty($script)) {
			return null;
		}

		if ($options['onDomReady']) {
			$script = $this->domReady($script);
		}
		$opts = $options;
		unset($opts['onDomReady'], $opts['cache'], $opts['clear']);

		if ($options['cache'] && $options['inline']) {
			$filename = md5($script);
			$path = WWW_ROOT . Configure::read('App.jsBaseUrl');
			if (file_exists($path . $filename . '.js')
				|| cache(str_replace(WWW_ROOT, '', $path) . $filename . '.js', $script, '+999 days', 'public')
				) {
				return $this->Html->script($filename);
			}
		}

		$return = $this->Html->scriptBlock($script, $opts);
		if ($options['inline']) {
			return $return;
		}
		return null;
	}
    
    public function getBuffer($clear = true): array
    {
		$scripts = $this->_bufferedScripts;
		if ($clear) {
			$this->_bufferedScripts = [];
		}

        return $scripts;
    }

    public function domReady(string $functionBody): string 
    {
		return '$(document).ready(function () {' . $functionBody . '});';
	}

}
