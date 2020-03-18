<?php
namespace BootstrapManager\View\Helper;

use BootstrapManager\View\Traits\InputGroupTrait;
use BootstrapManager\View\Widget\BootstrapBasicWidget;
use BootstrapManager\View\Widget\BootstrapButtonWidget;
use BootstrapManager\View\Widget\BootstrapSelectBoxWidget;
use BootstrapManager\View\Widget\BootstrapTextareaWidget;
use Cake\View\Helper\FormHelper;
use Cake\View\View;


/**
 * BootstrapForm helper
 */
class BootstrapFormHelper extends FormHelper
{
    use InputGroupTrait;

    public function __construct(View $View, array $config = [])
    {
        $config['templates'] = [
            'inputContainer'      => '<div class="form-group {{formGroupClass}} {{required}}" {{formGroupAttrs}} >{{content}}</div>',
            'textareaContainer'      => '<div class="form-group {{formGroupClass}} {{required}}" {{formGroupAttrs}} >{{content}}</div>',
            'inputContainerError'      => '<div class="form-group form-group-error {{formGroupClass}} {{required}}" {{formGroupAttrs}} >{{content}}{{error}}</div>',
            'inputGroupContainer' => '<div class="input-group {{inputGroupClass}}">{{prepend}}{{content}}{{append}}</div>',
            'input'               => '<input type="{{type}}" name="{{name}}" {{attrs}}/>',
        ];
        $config['widgets'] = [
            'button'   => BootstrapButtonWidget::class,
            'textarea' => BootstrapTextareaWidget::class,
            'select'   => BootstrapSelectBoxWidget::class,
            '_default' => BootstrapBasicWidget::class,
        ];
        parent::__construct($View, $config);
    }

    public function control(string $fieldName, array $options = []): string
    {
        return $this->inputGroup($fieldName, $options);
    }

}
