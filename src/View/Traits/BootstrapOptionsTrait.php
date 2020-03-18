<?php
namespace BootstrapManager\View\Traits;

trait BootstrapOptionsTrait
{

    protected $styles = [
        'primary',
        'secondary',
        'success',
        'danger',
        'warning',
        'info',
        'light',
        'dark',
        'link',
    ];

    public function combineClasses(&$data, $style = [])
    {
        $result = '';
        if (!empty($style) && isset($style['type'])){
            switch ($style['type']){
                case 'button':
                    $isOutline = isset($style['outline'])?true:false;
                    $style = isset($style['style'])?$style['style']:'primary';
                    $result .= $this->getButtonClass($style, $isOutline);
                    break;
            }
        }
        if (isset($data['display'])){
            $result .= $this->getDisplayClasses($data['display']);
            unset($data['display']);
        }
        if (isset($data['grid'])){
            $result .= ' '.$this->getGridClasses($data['grid']);
            unset($data['grid']);
        }
        if (isset($data['offset'])){
            $result .= ' '.$this->getOffsetClasses($data['offset']);
            unset($data['offset']);
        }
        if (isset($data['class'])){
            $data['class'] .= ' '.$result;
        }
        else {
            $data['class'] = $result;
        }
    }

    /**
     * Get button style
     * @param string | array $style
     * @example $style = [
     *  'style' => 'secondary',
     *  'size' => 'lg',
     *  'disabled',
     *  'active'
     * ];
     * @param bool $isOutline
     * @return string
     */
    public function getButtonClass($style, $isOutline = false)
    {
        $result = ($isOutline)?'btn btn-outline-':'btn btn-';
        if (is_array($style)){
            $result .= ' btn-'.(isset($style['style']))?$style['style']:'primary';
            if (isset($style['size'])){
                $result .= ' btn-'.$style['size'];
            }
            if (isset($style['disabled'])){
                $result .= ' disabled';
            }
            if (isset($style['active'])){
                $result .= ' active';
            }
        }
        else {
            $result .= $style;
        }
        return trim($result);
    }
    /**
     * Get the bootstrap display class
     * @param array $display
     * @example $grid = [
     *  'xs' => 2,
     *  'sm' => 2,
     *  'md' => 2,
     *  'lg' => 2,
     *  'xl' => 2
     * ];
     * @return string
     */
    public function getDisplayClasses($display = [])
    {
        $result = 'd-';
        foreach ($display as $size => $value){
            if ($size !== 'xs'){
                $result .= $size;
            }
            $result .= '-'.$value.' ';
        }
        return trim($result);
    }
    /**
     * Get the bootstrap grid classes
     * @param array $grid
     * @example $grid = [
     *  'xs' => 2,
     *  'sm' => 2,
     *  'md' => 2,
     *  'lg' => 2,
     *  'xl' => 2
     * ];
     * @param array $offset
     * @example $offset = [
     *  'xs' => 2,
     *  'sm' => 2,
     *  'md' => 2,
     *  'lg' => 2,
     *  'xl' => 2
     * ];
     * @return string
     */
    public function getGridClasses($grid = [], $offset = [])
    {
        $result = '';
        foreach ($grid as $size => $value){
            if ($size === 'xs'){
                $result .= 'col';
            }
            else {
                $result .= 'col-'.$size;
            }
            $result .= '-'.$value.' ';
        }
        if (!empty($offset)){
            $result .= $this->getOffsetClasses($offset);
        }
        return trim($result);
    }
    /**
     * Get the offset bootstrap classes
     * @param array $offset
     * @example $offset = [
     *  'xs' => 2,
     *  'sm' => 2,
     *  'md' => 2,
     *  'lg' => 2,
     *  'xl' => 2
     * ];
     * @return string
     */
    public function getOffsetClasses($offset = [])
    {
        $result = '';
        foreach ($offset as $size => $value){
            if ($size === 'xs'){
                $result .= 'offset';
            }
            else {
                $result .= 'offset-'.$size;
            }
            $result .= '-'.$value.' ';
        }
        return trim($result);
    }
}
