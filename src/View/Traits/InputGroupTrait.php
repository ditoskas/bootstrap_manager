<?php

namespace BootstrapManager\View\Traits;


trait InputGroupTrait
{
    protected function getGroup($type, $data){
        $inputGroupClass = isset($data['class'])?$data['class'].' input-group-'.$type:'input-group-'.$type;
        $result = '<div class="'.$inputGroupClass.'">';
        if (!is_array($data)){
            $data = ['text' => $data];
        }
        if (isset($data['text'])){
            if (is_array($data['text'])){
                foreach ($data['text'] as $text){
                    $result .= '<span class="input-group-text" >'.$text.'</span>';
                }
            }
            else {
                $result .= '<span class="input-group-text" >'.$data['text'].'</span>';
            }
        }
        if (isset($data['control']) && isset($data['control']['data'])){
            if (is_array($data['control']['data'])){
                foreach ($data['control'['data']] as $control){
                    $fieldName = $control;
                    $options = [];
                    if (is_array($control)){
                        if (isset($control['fieldName'])){
                            $fieldName = $control['fieldName'];
                        }
                        if (isset($control['options'])){
                            $options = $control['options'];
                        }
                    }
                    $options['wrapper'] = false;
                    $options['label'] = false;

                    $result .= $this->control($fieldName, $options);

                    $result .= $control;
                }
            }
            else {
                $result .= $this->control($data['control']);
            }
        }
        $result .= '</div>';
        return $result;
    }

    protected function inputGroup($fieldName, $options = [])
    {
        $prepend = '';
        if (isset($options['prepend'])){
            $prependData = $options['prepend'];
            $prepend = $this->getGroup('prepend', $prependData);
            unset($options['prepend']);
        }
        $append = '';
        if (isset($options['append']) && is_array(isset($options['append']))){
            $appendData = $options['append'];
            $append = $this->getGroup('append', $prependData);
            unset($options['append']);
        }

        if (!empty($prepend) || !empty($append)){
            $inputGroupClass = '';
            if (isset($options['size'])){
                $inputGroupClass .= ' input-group-'.$options['size'];
                unset($options['size']);
            }
            if (isset($options['inputGroupClass'])){
                $inputGroupClass .= ' '.$options['inputGroupClass'];
                unset($options['inputGroupClass']);
            }
            $templateVars = ['inputGroupClass' => $inputGroupClass];

            $options['label'] = false;
            $options['templates']['inputContainer'] = '{{content}}';
            $control = parent::control($fieldName, $options);
            return $this->formatTemplate('inputGroupContainer', [
                'content'      => $control,
                'prepend'      => $prepend,
                'append'       => $append,
                'templateVars' => $templateVars,
            ]);
        }

        if (isset($options['size'])){
            $options['class'] = isset($options['class'])?$options['class'].' form-control-'.$options['size']:' form-control-'.$options['size'];
            unset($options['size']);
        }

        return parent::control($fieldName, $options);
    }
}
