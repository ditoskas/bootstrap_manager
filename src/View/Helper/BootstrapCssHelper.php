<?php
namespace BootstrapManager\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use BootstrapManager\Lib\BootstrapClasses;
use BootstrapManager\Lib\GeneralFunctions;
/**
 * BootstrapCss helper
 */
class BootstrapCssHelper extends Helper {
    public $helpers = ['Html','Form'];   
    /**
     * Get a text styled with one of bootstrap contextual backgrounds
     * @param string $content - The text
     * @param string $style - One of bootstrap styles e.g. primary
     * @param string $tag - In which tag the text will wrap in
     * @param array $options - Html options
     * @return $tag element with the $content
     */
    public function getBackgroundText($content,$style,$tag = 'p',$options = []){
        $css = GeneralFunctions::getBackgroundClass($style);
        $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        return $this->Html->tag(
                    $tag,
                    $content,
                    $options
                );
    }
    /**
     * Get a text colored with onn of bootstrap helper classes
     * @param string $content - The text
     * @param string $style - One of bootstrap styles e.g. primary
     * @param string $tag - In which tag the text will wrap in
     * @param array $options - Html options
     * @return $tag element with the $content
     */
    public function getColorText($content,$style,$tag = 'p',$options = []){
        $css = GeneralFunctions::getColorTextClass($style);
        $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        return $this->Html->tag(
                    $tag,
                    $content,
                    $options
                );
    }
    /**
     * Get an image tag styled with bootstrap shapes
     * @param string $path - Image path
     * @param array $options - Html options
     * @param string $style - One of circle,rounded,thumbnail
     * @param bool $isResponsive - true to use responsive class
     * @return <img src=$path class=$style />
     */
    public function getImage($path,$options = [],$style = null, $isResponsive = false){
        if ($style){
            $css = GeneralFunctions::getImageClass($style);
            $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        }
        if($isResponsive){
            $options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::IMAGE_RESPONSIVE);
        }
        return $this->Html->image($path,$options);
    }
    /**
     * Get a submit button     
     * @param string $title - The button's value
     * @param array $options - Html options
     * @param string $style - The bootstrap button style
     * @return input tag type="submit"
     */
    public function getButtonSubmit($title,$options = [], $style = 'default'){
        $options['type'] = 'submit';
        return $this->getButton($style, $title, $options);
    }
    /**
     * Get a bootstrap link button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonLink($title,$options = []){
        return $this->getButton('link', $title,$options);
    }
    /**
     * Get a bootstrap danger button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonDanger($title,$options = []){
        return $this->getButton('danger', $title,$options);
    }
    /**
     * Get a bootstrap warning button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonWarning($title,$options = []){
        return $this->getButton('warning', $title,$options);
    }
    /**
     * Get a bootstrap info button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonInfo($title,$options = []){
        return $this->getButton('info', $title,$options);
    }
    /**
     * Get a bootstrap success button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonSuccess($title,$options = []){
        return $this->getButton('success', $title,$options);
    }
    /**
     * Get a bootstrap primary button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonPrimary($title,$options = []){
        return $this->getButton('primary', $title,$options);
    }
    
    /**
     * Get a bootstrap default button
     * @param string $title - The button's value
     * @param array $options - Html options
     * @return input tag type="button"
     */
    public function getButtonDefault($title,$options = []){
        return $this->getButton('default', $title,$options);
    }
    /**
     * Get a bootstrap button
     * @param string $style - The bootstrap button style
     * @param string $title - The button's value
     * @param array $options - Html options
     * @param bool $isBlock - true to use block class
     * @param string $size - One of 'lg','sm','xs' to set the size of the button
     * @return input tag type="button"
     */
    public function getButton($style,$title, $options = [],$isBlock = false,$size = null){
        $css = GeneralFunctions::getButtonClass($style);
        $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        if ($size){
            $sizeClass = GeneralFunctions::getButtonSizeClass($size);
            $options['class'] = GeneralFunctions::combineValues($options, 'class', $sizeClass);
        }
        if ($isBlock){
            $options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::BUTTON_BLOCK);
        }
        if (!isset($options['type'])){
            $options['type'] = 'button';
        }
        return $this->Form->button($title,$options);
    }
    /**
     * Get an anchor styled as bootstrap button
     * @param string $style - The bootstrap button style
     * @param string $title - The button's value
     * @param mixed $path - Either the string location, or a routing array.
     * @param array $options - Html options
     * @param bool $isBlock - true to use block class
     * @param string $size - One of 'lg','sm','xs' to set the size of the button
     * @return input tag type="button"
     */
    public function getAnchorButton($style,$title,$path, $options = [],$isBlock = false,$size = null){
        $css = GeneralFunctions::getButtonClass($style);
        $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        if ($size){
            $sizeClass = GeneralFunctions::getButtonSizeClass($size);
            $options['class'] = GeneralFunctions::combineValues($options, 'class', $sizeClass);
        }
        if ($isBlock){
            $options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::BUTTON_BLOCK);
        }
        return $this->Html->link($title,$path,$options);
    }
    /**
     * Get an inline list of checkboxes
     * @param array $checkboxes - Array with the checkbox parameters
     * @example $checkboxes = [
     *      0   =>  ['fieldName' => 'users.option1', 'text' => 'Option 1', 'options' => ['class' => 'foo']
     * ];
     * @return div with a checkboxes
     */
    public function getInlineCheckboxList($checkboxes){
        $html = [];
        $html[] = '<div class="'.BootstrapClasses::FORM_GROUP.'">';        
        foreach($checkboxes as $checkbox){
            $html[] = '<label class="'.BootstrapClasses::CHECKBOX_INLINE.'">';
            $fieldName = $checkbox['fieldName'];
            $options = isset($checkbox['options'])?$checkbox['options']:[];
            $options['hiddenField'] = false;
            $html[] = $this->Form->checkbox($fieldName,$options);
            $html[] = $checkbox['text'];
            $html[] = '</label>';
        }        
        $html[] = '</div>';
        
        return implode(' ',$html);
    }
    /**
     * Get a checkbox
     * @param mixed $fieldName - The models name
     * @param string $text - The label
     * @param array $options - Html options 
     * @return checkbox tag
     */
    public function getCheckbox($fieldName,$text = '', $options = []){
        $html = [];
        $html[] = '<div class="checkbox">';
        $html[] = '<label>';
        $options['hiddenField'] = false;
        $html[] = $this->Form->checkbox($fieldName,$options);
        $html[] = $text;
        $html[] = '</label>';
        $html[] = '</div>';
        
        return implode(' ',$html);
    }
    /**
     * Get an input control
     * @param mixed $model - CakePHP model
     * @param string $label - The field's label
     * @param array $options - Html options
     * @return input tag
     */
    public function getInputForm($model,$label = null,$options = []){        
        $options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::FORM_CONTROL);
        if ($label == null){
            $options['label'] = false;
        }
        else {
            $options['label']['text'] = $label;
            $options['label']['class'] = BootstrapClasses::CONTROL_LABEL;
        }
        
        $this->Form->templates([
            'inputContainer' => '<div class="'.BootstrapClasses::FORM_GROUP.' {{type}}{{required}}">{{content}}</div>'
        ]);
        return $this->Form->input($model,$options);
    }
    /**
     * Get a close form tag
     * @return form closing tag
     */
    public function endForm(){
        return $this->Form->end();
    }
    /**
     * Get a form tag for horizontal forms
     * @param mixed $model - The associate model
     * @param array $options - Html options
     * @return form opening tag
     */
    public function startFormHorizontal($model = null,$options = []){
        return $this->startForm($model,$options,true);
    }
    /**
     * Get a form tag for inline forms
     * @param mixed $model - The associate model
     * @param array $options - Html options
     * @return form opening tag
     */
    public function startFormInline($model = null,$options = []){
        return $this->startForm($model,$options,false);
    }
    /**
     * Get a form tag element
     * @param mixed $model - The assosiate model
     * @param array $options - Array with Html options
     * @param mixed $isHorizontal - null to ignore, true for horizontal form, false for inline
     * @return form opening tag
     */
    public function startForm($model = null, $options = [],$isHorizontal = null){
        $css = '';
        if($isHorizontal === true){
            $css = BootstrapCss::FORM_HORIZONTAL;
        }
        else if($isHorizontal === false){
            $css = BootstrapCss::FORM_INLINE;
        }
        
        $options['class'] = GeneralFunctions::combineValues($options, 'class', $css);
        $options['role'] = 'form';
        
        return $this->Form->create($model,$options);
    }
    /**
     * Get a table styled with bootstrap classes
     * @param array $header - The header options
     * @example $header = [
     *      'names'     =>  ['Date','Title','Active'],
     *      'trOptions' =>  ['class' => 'status'],
     *      'thOptions' =>  ['class' => 'product_table'],
     * ];
     * @param array $body - The body options
     * @example =  [
     *      'data'  =>  [
     *          ['Jul 7th, 2007', 'Best Brownies', 'Yes'],
     *          ['Jun 21st, 2007', 'Smart Cookies', 'Yes'],
     *          ['Aug 1st, 2006', 'Anti-Java Cake', 'No'],
     *      ],//data
     *      'oddTrOptions'  =>  ['class' => 'odd'],
     *      'oddTrOptions'  =>  ['class' => 'even'],
     *      'useCount'      =>  true,
     *      'continueOddEven' => false
     * ];
     * @param bool $isStriped - true to apply striped css
     * @param bool $isBordered - true to apply bordered css
     * @param bool $isHover - true to apply hover css
     * @param bool $isCondensed - true to apply condensed css
     * @param bool $isResponsive - true to wrap the table in a table-responsive div
     * @param array $tableOptions - Html options for the table
     * @return type
     */
    public function getTable($header,$body,$isStriped = false,$isBordered = false,$isHover = false,$isCondensed = false,$isResponsive = false,$tableOptions = []){
        $tableParts = [];
        //construct the header
        $headerNames = $header['names'];
        $headerTrOptions = isset($header['trOptions'])?$header['trOptions']:null;
        $headerThOptions = isset($header['thOptions'])?$header['thOptions']:null;   
        
        $tableParts[] = $this->getTableHeaders($headerNames,$headerTrOptions,$headerThOptions);        
        //construct the body
        $bodyData = $body['data'];
        $bodyOddTrOptions = isset($body['oddTrOptions'])?$body['oddTrOptions']:null;
        $bodyEvenTrOptions = isset($body['evenTrOptions'])?$body['evenTrOptions']:null;
        $bodyUseCount = isset($body['useCount'])?$body['useCount']:false;
        $bodyContinueOddEven = isset($body['continueOddEven'])?$body['continueOddEven']:true; 
        
        $tableParts[] = $this->getTableCells($bodyData,$bodyOddTrOptions,$bodyEvenTrOptions,$bodyUseCount,$bodyContinueOddEven);
        //create the css
        $tableCss = 'table';
        if ($isStriped){
            $tableCss = GeneralFunctions::appendValue($tableCss, BootstrapClasses::TABLE_STRIPED);
        }
        if ($isBordered){
            $tableCss = GeneralFunctions::appendValue($tableCss, BootstrapClasses::TABLE_BORDERED);
        }
        if ($isHover){
            $tableCss = GeneralFunctions::appendValue($tableCss, BootstrapClasses::TABLE_HOVER);
        }
        if ($isCondensed){
            $tableCss = GeneralFunctions::appendValue($tableCss, BootstrapClasses::TABLE_CONDENSED);
        }
        //get the table html
        $table = implode(' ',$tableParts);
        //get the table tag
        $tableOptions['class'] = GeneralFunctions::combineValues($tableOptions, 'class', $tableCss);
        $tableHtml = $this->Html->tag('table',$table,$tableOptions);
        if ($isResponsive){
            $tableHtml = $this->Html->div(BootstrapClasses::TABLE_RESPONSIVE,$tableHtml);
        }
        
        return $tableHtml;
        
    }
    
    /**
     * Wrapper for Html->tableCells
     * @link http://book.cakephp.org/3.0/en/core-libraries/helpers/html.html#Cake\View\Helper\HtmlHelper::tableCells
     */
    public function getTableCells(array $data, array $oddTrOptions = null, array $evenTrOptions = null, $useCount = false, $continueOddEven = true){
        return $this->Html->tableCells($data,$oddTrOptions,$evenTrOptions,$useCount,$continueOddEven);
    }
    /**
     * Wrapper for Html->tableHeaders
     * @link http://book.cakephp.org/3.0/en/core-libraries/helpers/html.html#Cake\View\Helper\HtmlHelper::tableHeaders     
     */
    public function getTableHeaders(array $names, array $trOptions = null, array $thOptions = null){
        return $this->Html->tableHeaders($names,$trOptions,$thOptions);
    }
    /**
     * Wrap a code in a column div for large devices
     * @param string $content - Html code
     * @param int $size - The column's size
     * @param int $offset - The column's offset
     * @param array $options - Html options
     * @return <div class="col-lg-$size col-lg-offset-$offset">$content</div>
     */
    public function getLargeColumn($content,$size,$offset = null,$options = []){
        $sizeClasses = [null,null,null,$size];
        $offsetClasses = [null,null,null,$offset];
        
        return $this->getColumn($content, $sizeClasses,$offsetClasses,$options);
    }
    /**
     * Wrap a code in a column div for medium devices
     * @param string $content - Html code
     * @param int $size - The column's size
     * @param int $offset - The column's offset
     * @param array $options - Html options
     * @return <div class="col-md-$size col-md-offset-$offset">$content</div>
     */
    public function getMediumColumn($content,$size,$offset = null,$options = []){
        $sizeClasses = [null,null,$size,null];
        $offsetClasses = [null,null,$offset,null];
        
        return $this->getColumn($content, $sizeClasses,$offsetClasses,$options);
    }
    /**
     * Wrap a code in a column div for small devices
     * @param string $content - Html code
     * @param int $size - The column's size
     * @param int $offset - The column's offset
     * @param array $options - Html options
     * @return <div class="col-sm-$size col-sm-offset-$offset">$content</div>
     */
    public function getSmallColumn($content,$size,$offset = null,$options = []){
        $sizeClasses = [null,$size,null,null];
        $offsetClasses = [null,$offset,null,null];
        
        return $this->getColumn($content, $sizeClasses,$offsetClasses,$options);
    }
    /**
     * Wrap a code in a column div for extra small devices
     * @param string $content - Html code
     * @param int $size - The column's size
     * @param int $offset - The column's offset
     * @param array $options - Html options
     * @return <div class="col-xs-$size col-xs-offset-$offset">$content</div>
     */
    public function getExtraSmallColumn($content,$size,$offset = null,$options = []){
        $sizeClasses = [$size,null,null,null];
        $offsetClasses = [$offset,null,null,null];
        
        return $this->getColumn($content, $sizeClasses,$offsetClasses,$options);
    }
    /**
     * Wrap a html code inside a column div
     * @param string $content - Html code
     * @param array $size - The sizes depends on the screen
     * @param array $offset - The offsets depends on the screen
     * @param array $options - Html options
     * @return <div class="col-x-x ">$content</div>
     */
    public function getColumn($content,$size,$offset = [],$options = []){
        $class = $this->getColumnClasses($size,$offset);
        $options['escape'] = false;
        
        return $this->Html->div($class,$content,$options);
    }
    /**
     * Get the css value for a column
     * @param array $size - The size numbers
     * @example $size   =>  [
     *      0   =>  3   //this value used for extra small devices
     *      1   =>  3   //this value used for small devices
     *      2   =>  4   //this value used for medium devices
     *      3   =>  4   //this value used for large devices
     * ]
     * @param array $offset - with offset numbers
     * @return string - The column css
     */
    public function getColumnClasses($size,$offset = []){
        $class = '';
        if (isset($size[0]) && !empty($size[0])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_XS.$size[0]);
        }
        if (isset($size[1]) && !empty($size[1])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_SM.$size[1]);
        }
        if (isset($size[2]) && !empty($size[2])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_MD.$size[2]);
        }
        if (isset($size[3]) && !empty($size[3])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_LG.$size[3]);
        }
        if (isset($offset[0]) && !empty($offset[0])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_XS_OFFSET.$offset[0]);
        }
        if (isset($offset[1]) && !empty($offset[1])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_SM_OFFSET.$offset[1]);
        }
        if (isset($offset[2]) && !empty($offset[2])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_MD_OFFSET.$offset[2]);
        }
        if (isset($offset[3]) && !empty($offset[3])){
            $class = GeneralFunctions::appendValue($class, BootstrapClasses::COL_LG_OFFSET.$offset[3]);
        }
        
        return $class;
    }
    /**
     * Wrap a html code in a row div
     * @param string $content - Html code
     * @param array $options - Html options
     * @return <div class="row">$content</div>
     */
    public function getRow($content,$options = []){
        $class = BootstrapClasses::ROW;
        $options['escape'] = false;
        
        return $this->Html->div($class,$content,$options);
    }
    /**
     * Wrap an html code in a container div
     * @param string $content - Html code
     * @param bool $isFluid - True if the container is fluid
     * @param array $options - Html options
     * @return <div class="container or container-fluid">$content</div>
     */
    public function getContainer($content,$isFluid = false,$options = []){
        $class = ($isFluid)?BootstrapClasses::CONTAINER_FLUID:BootstrapClasses::CONTAINER;
        $options['escape'] = false;
        
        return $this->Html->div($class,$content,$options);
    }
    /**
     * Get a paragraph styled as lead
     * @param string $content - The paragraph's content
     * @param array $options - Html options
     * @return <p> tag
     */
    public function getLeadParagraph($content,$options = []){
        return $this->Html->para(
                    BootstrapClasses::PARAGRAPH_LEAD,
                    $content,
                    $options
                );
    }
    /**
     * Get a h tag element
     * @param int $number - The header level 1-6
     * @param string $content - The header's text
     * @param array $options - Html options
     * @param bool $isPageHeader - True to append the page-header class
     * @return <h> tag
     */
    public function getHeader($number,$content,$options = [],$isPageHeader = false){
        if ($isPageHeader){
            $options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::PAGE_HEADER);
        }
        
        return $this->Html->tag('h'.$number,$content,$options);
    }

}
