<?php
namespace BootstrapManager\View\Helper;

use Cake\View\Helper;
use Cake\View\View;

/**
 * BootstrapSources helper
 */
class BootstrapSourcesHelper extends Helper {
	public $helpers = ['Html','Form'];
	
 	protected $_css = [         
        'BootstrapManager.bootstrap/css/bootstrap.min',
        'BootstrapManager.bootstrap/css/bootstrap-theme.min',
    ];
    protected $_js = [        
        'BootstrapManager.bootstrap/js/bootstrap.min',
    ];
    /**
     * Get the meta reference required by bootstrap
     * @param bool $isZoomDisable - True to disable the zooming
     * @return meta tag
     */
    public function getMeta($isZoomDisable = false){
        $content = 'width=device-width, initial-scale=1';
        if ($isZoomDisable){
            $content = 'width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no';
        }
        return $this->Html->meta(
            'viewport',
            $content
        );
    }
    
    /**
     * Get the Bootstrap css files
     * @return link tag with the bootstrap css files
     */
    public function getCss(){
        return $this->Html->css($this->_css);
    }
    /**
     * Get the Bootstrap js files
     * @return script tag with bootstrap js files
     */
    public function getJs(){
        return $this->Html->script($this->_js);
    }

}
