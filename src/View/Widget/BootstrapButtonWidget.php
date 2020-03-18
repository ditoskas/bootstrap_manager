<?php
namespace BootstrapManager\View\Widget;

use BootstrapManager\View\Traits\BootstrapOptionsTrait;
use Cake\View\Form\ContextInterface;
use Cake\View\Widget\ButtonWidget;
class BootstrapButtonWidget extends ButtonWidget
{
    use BootstrapOptionsTrait;

    public function render(array $data, ContextInterface $context): string
    {
        $style = ['type' => 'button'];

        if (isset($data['style'])){
            $style['style'] = $data['style'];
            unset($data['style']);
        }
        $this->combineClasses($data, $style);
        return parent::render($data, $context);
    }
}
