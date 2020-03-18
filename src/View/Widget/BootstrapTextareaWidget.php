<?php

namespace BootstrapManager\View\Widget;


use BootstrapManager\View\Traits\BootstrapOptionsTrait;
use Cake\View\Form\ContextInterface;
use Cake\View\Widget\TextareaWidget;

class BootstrapTextareaWidget extends TextareaWidget
{
    use BootstrapOptionsTrait;

    public function render(array $data, ContextInterface $context): string
    {
        $data['class'] = isset($data['class'])?'form-control '.$data['class']:'form-control';

        $this->combineClasses($data);

        return parent::render($data, $context);
    }
}
