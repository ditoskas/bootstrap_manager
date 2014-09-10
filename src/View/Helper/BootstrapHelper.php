<?php
namespace BootstrapManager\View\Helper;

use Cake\View\Helper;
use Cake\View\View;
use BootstrapManager\Lib\BootstrapClasses;
use BootstrapManager\Lib\GeneralFunctions;
/**
 * Bootstrap helper
 */
class BootstrapHelper extends BootstrapCssHelper {
    public $helpers = [
        'Html',
        'Form'
    ];
    
    /**
     * Get a bootstrap well
     * @param string $content - The content of the well
     * @param array $options - Html options
     * @param string $size - lg for large or sm for small
     * @return <div class="well well-$size">$content</div>
     */
    public function getWell($content,$options=[],$size = null){
    	$class = BootstrapClasses::WELL;
    	if ($size == 'lg'){
    		$class = BootstrapClasses::WELL_LARGE;
    
    	}
    	else if ($size == 'sm'){
    		$class = BootstrapClasses::WELL_SMALL;
    	}
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $class);
    
    	return $this->Html->tag('div',$content,$options);
    }
    /**
     * Get a bootstrap group list
     * @param array $items - Array with items configuration for example check getGroupListItem
     * @param array $options - Html options
     */
    public function getListGroup($items,$options = []){
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::LIST_GROUP);
    	$html = [];
    	if (!empty($items)){
    		foreach($items as $item){
    			$html[] = $this->getListGroupItem($item);
    		}
    	}
    	return $this->Html->tag('div',implode(' ',$html),$options);
    }
    /**
     * Get a menu list
     * @param array $items
     * @example item [
     *      'anchor'    =>  [
     *          'title'     =>  URL title
     *          'url'       =>  URL array
     *      ],//url
     *      'badge'   =>  [
     *          'text'  =>  The badge text
     *          'options' =>  badge html options
     *          'position' =>  badge position
     *      ],
     *      'style'     =>  One of the bootstrap styles e.g. success
     *      'isActive'  =>  true if the li item is the active,
     *      'isDisable' -> true to disable the item
     *      'options'   =>  array with html options,
     * ]
     */
    public function getListGroupItem($item){
    	$badge = '';
    	if(isset($item['badge'])){
    		$badgeText = $item['badge']['text'];
    		$badgeOptions = isset($item['badge']['options'])?$item['badge']['options']:[];
    		$badgePosition = isset($item['badge']['text'])?$item['badge']['text']:null;
    		$badge = $this->getBadge($badgeText,$badgeOptions,$badgePosition);
    	}
    	$class = BootstrapClasses::LIST_ITEM;
    	if (isset($item['style'])){
    		$class = GeneralFunctions::appendValue($class, GeneralFunctions::getListItemClass($item['style']));
    	}
    	if (isset($item['isDisable']) && $item['isDisable'] == true){
    		$class = GeneralFunctions::appendValue($class, 'disabled');
    	}
    	if (isset($item['isActive']) && $item['isActive'] == true){
    		$class = GeneralFunctions::appendValue($class, 'active');
    	}
    	$options = isset($item['options'])?$item['options']:[];
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $class);
    
    	$anchorText = GeneralFunctions::appendValue($badge, $item['anchor']['title']);
    	$url = isset($item['anchor']['url'])?$item['anchor']['url']:'#';
    	$options['escapeTitle'] = false;
    	return $this->Html->link($anchorText,$url,$options);
    }
    /**
     * Get a bootstrap alert
     * @param string $text - The content of alert
     * @param type $style - one of the bootstrap styles e.g. success
     * @param array $options - Html options
     * @param bool $isDismissible - True to add close button
     * @return <div class="alert alert-$style">$text</div>
     */
    public function getAlert($text,$style = 'success',$options = [],$isDismissible = false){
    	$class = GeneralFunctions::getAlertClass($style);
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $class);
    	$options['role'] = 'alert';
    	$content = '';
    	if($isDismissible){
    		$extraContent = '  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>';
    		$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::ALERT_DISMISSIBLE);
    		$content = GeneralFunctions::appendValue($extraContent, $text);
    	}
    	else {
    		$content = $text;
    	}
    	return $this->Html->tag('div',$content,$options);
    }
    /**
     * Get a jumbotron element
     * @param string $content - The content
     * @param array $options - Html options
     * @return <div class="jumbotron">$content</div>
     */
    public function getJumbotron($content,$options = []){
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::JUMBOTRON);
    	return $this->Html->tag('div',$content,$options);
    }
    /**
     * Get a bootstrap badge
     * @param string $text - Displayed text
     * @param array $options - Html options
     * @param type $position - left to apply pull-left or right to apply pull-right
     * @return <span class="badge $position">$text</span>
     */
    public function getBadge($text,$options = [],$position=null){
    	$class = BootstrapClasses::BADGE;
    	if ($position == 'left'){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::PULL_LEFT);
    	}
    	else if($position == 'right'){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::PULL_RIGHT);
    	}
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $class);
    	return $this->Html->tag('span',$text,$options);
    }
    public function getDangerLabel($text,$options=[]){
    	return $this->getLabel($text,'danger',$options);
    }
    public function getWarningLabel($text,$options=[]){
    	return $this->getLabel($text,'warning',$options);
    }
    public function getInfoLabel($text,$options=[]){
    	return $this->getLabel($text,'info',$options);
    }
    public function getSuccessLabel($text,$options=[]){
    	return $this->getLabel($text,'success',$options);
    }
    public function getPrimaryLabel($text,$options=[]){
    	return $this->getLabel($text,'primary',$options);
    }
    public function getDefaultLabel($text,$options=[]){
    	return $this->getLabel($text,'default',$options);
    }
    /**
     * Get a bootstrap label
     * @param string $text - The displayed text
     * @param string $style - One of bootstrap styles e.g. primary
     * @param array $options - Html options
     * @return <span class="label label-$style">$text</span>
     */
    public function getLabel($text,$style = 'default',$options = []){
    	$class = GeneralFunctions::getLabelClass($style);
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $class);
    
    	return $this->Html->tag('span',$text,$options);
    }
    /**
     * Get an input group with an icon next to the textbox
     * @param mixed $model - CakePHP model
     * @param string $icon - Icon to put after the textbox
     * @param array $options - Html options
     * @return input group
     */
    public function getAppendInputGroup($model,$icon,$options = [],$wrapInFormGroup = false){
    	return $this->getInputGroup($model,null,$icon,$options,$wrapInFormGroup);
    }
    /**
     * Get an input group with an icon before the textbox
     * @param mixed $model - CakePHP model
     * @param string $icon - Icon to put before the textbox
     * @param array $options - Html options
     * @return input group
     */
    public function getPrependInputGroup($model,$icon,$options = [],$wrapInFormGroup = false){
    	return $this->getInputGroup($model,$icon,null,$options,$wrapInFormGroup);
    }
    /**
     * Get an input group
     * @param mixed $model - CakePHP model
     * @param string $iconLeft - Icon to put before the textbox
     * @param string $iconRight - Icon to put next to textbox
     * @param array $options - Html options
     * @param bool $wrapInFormGroup - true to wrap the element in form-group div
     * @return input tag
     */
    public function getInputGroup($model,$iconLeft = null,$iconRight = null,$options = [],$wrapInFormGroup = false){
    	$extraOptions = [
    	'label' =>  false,
    	'class' => GeneralFunctions::combineValues($options, 'class', BootstrapClasses::FORM_CONTROL)
    	];
    	if (isset($options['class'])){
    		unset($options['class']); //we combined the array above
    	}
    	$template = '';
    	if ($wrapInFormGroup){
    		$template = '<div class="'.BootstrapClasses::FORM_GROUP.' {{type}}{{required}}">';
    		$template .= '<div class="'.BootstrapClasses::INPUT_GROUP.'">';
    	}
    	else {
    		$template = '<div class="'.BootstrapClasses::INPUT_GROUP.' {{type}}{{required}}">';
    	}
    
    	if (!empty($iconLeft)){
    		$template .= $this->getSpanGroupAddon($iconLeft);
    	}
    	$template .= '{{content}}';
    	if (!empty($iconRight)){
    		$template .= $this->getSpanGroupAddon($iconRight);
    	}
    	$template .= '</div>';
    	if ($wrapInFormGroup){
    		$template .= '</div>';
    	}
    	$this->Form->templates([
    			'inputContainer' => $template
    			]);
    
    	return $this->Form->input($model,  array_merge($extraOptions,$options));
    
    }
    /**
     * Get a span group addon
     * @param string $icon - The icon that will be used
     * @param array $options - Html options
     * @return span tag
     */
    public function getSpanGroupAddon($icon, $options = []){
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::INPUT_GROUP_ADDON);
    	$spanIcon = $this->getSpanIcon($icon);
    	return $this->getSpan($spanIcon,$options);
    }
    /**
     * Get a span tag
     * @param string $text - text inside the span
     * @param array $options - Html options
     * @return tag element
     */
    public function getSpan($text = '',$options = []){
    	return $this->Html->tag('span',$text,$options);
    }
    
    /**
     * Get a button from an array parameters
     * @param array $button - Button parameters
     * @example $button = [
     *      'title'     =>  'Search',
     *      'icon'      =>  'search',
     *      'style'     =>  'primary',
     *      'options'   =>  ['class' => 'btn-search'],
     *      'isBlock'   =>  false,
     *      'size'      =>  'lg'
     *      'path'      =>  '/examples/demo' used only if its an anchor button
     * ];
     * @param $items    =>  Array with items configuration see getMenuListItems parameter
     * @return a button element
     */
    public function getButtonDropdown($button,$items){
    	$button['items'] = $items;
    	$param = [$button];
    	return $this->getButtonGroup($param);
    }
    /**
     * Get a bootstrap navbar
     * @param array $lists - Array of each menu item,
     * @example $item = [
     *      'items'   => array of items described below on function getMenuListItems
     *      'isRight' => true to align the list to the right
     * ]
     * @param array $options
     * @example $options = [
     *      'position'  =>  One of 'top','fixed-top','fixed-bottom'
     *      'style'     =>  Ome of 'default','inverse' else applys a class navbar-{class}
     *      'isFluid'   =>  true or false '
     *      'menuId'    =>  menu id
     *      'brand      =>  [
     *                          'title' => String or [
     *                              image' =>  [
     *                                   'path'      =>  Image Path
     *                                   'options'   =>  Image Options
     *                               ]//image
     *                          ]
     *                          'url'     =>  Array with url parameters or string with the path
     *                          'options' => Array with html options for the image
     *                      ]//brand
     *      'hasMobile' =>  true or false to include or not the mobile menu
     * ]
     */
    public function getNavBar($lists,$options = []){
    	$navbarClass = BootstrapClasses::NAVBAR;
    	if (isset($options['style'])) {
    		$navbarClass = GeneralFunctions::appendValue($navbarClass, 'navbar-'.$options['style']);
    	}// if isset style
    	else {
    		$navbarClass = GeneralFunctions::appendValue($navbarClass, BootstrapClasses::NAVBAR_DEFAULT);
    	}
    
    	if (isset($options['position'])) {
    		switch ($options['position']){
    			case 'fixed-top':
    				$navbarClass = GeneralFunctions::appendValue($navbarClass, BootstrapClasses::NAVBAR_FIXED_TOP);
    				break;
    			case 'fixed-bottom':
    				$navbarClass = GeneralFunctions::appendValue($navbarClass, BootstrapClasses::NAVBAR_FIXED_BOTTOM);
    				break;
    		}//switch
    	}//if isset position
    
    	$html = [];
    	$html[] = '<nav class="'.$navbarClass.'" role="navigation">';
    	if (isset($options['isFluid']) && $options['isFluid'] === true){
    		$html[] = '<div class="'.BootstrapClasses::CONTAINER_FLUID.'">';
    	}
    	else {
    		$html[] = '<div class="'.BootstrapClasses::CONTAINER.'">';
    	}
    	$html[] = '<div class="'.BootstrapClasses::NAVBAR_HEADER.'">';
    
    	$menuId = isset($options['menuId'])?$options['menuId']:'menu-'.rand();
    
    	if (isset($options['hasMobile']) && $options['hasMobile'] === true){
    		$html[] = $this->getMobileCollapseButton($menuId);
    	}
    	if (isset($options['brand']) && isset($options['brand']['title'])){
    		$brandTitle   = $options['brand']['title'];
    		$brandUrl     = isset($options['brand']['url'])?$options['brand']['url']:'#';
    		$brandOptions = isset($options['brand']['options'])?$options['brand']['options']:[];
    
    		$html[] = $this->getBrand($brandTitle,$brandUrl,$brandOptions);
    	}
    	$html[] = '</div>'; //class navbar-header
    
    	$html[] = '<div class="'.BootstrapClasses::COLLAPSE.' '.BootstrapClasses::NAVBAR_COLLAPSE.'" id="'.$menuId.'">';
    	foreach ($lists as $list){
    		$isRight = isset($list['isRight'])?$list['isRight']:false;
    		$html[] = $this->getNavbarList($list['items'],$isRight);
    	}
    	$html[] = '</div>'; //class navbar-collapse
    
    	$html[] = '</div>';//class container
    	$html[] = '</nav>';
    
    	return implode(' ',$html);
    }
    public function getMobileCollapseButton($menuId){
    	$html = [];
    	$html[] = '<button type="button" class="'.BootstrapClasses::NAVBAR_TOGGLE.'" data-toggle="collapse" data-target="#'.$menuId.'">';
    	$html[] = $this->Html->tag('span','',['class' => 'sr-only']);
    	$html[] = $this->Html->tag('span','',['class' => 'icon-bar']);
    	$html[] = $this->Html->tag('span','',['class' => 'icon-bar']);
    	$html[] = $this->Html->tag('span','',['class' => 'icon-bar']);
    	$html[] = '</button>';
    
    	return implode(' ',$html);
    }
    public function getBrand($title,$url = '#',$options = []){
    	$options['class'] = BootstrapClasses::NAVBAR_BRAND;
    	if (is_array($title) && isset($title['path'])){
    
    		$imgOptions = isset($title['options'])?$title['options']:[];
    		$imgPath = $title['path'];
    		$options['escapeTitle'] = false;
    		return $this->Html->link(
    				$this->Html->image($imgPath, $imgOptions),
    				$url,
    				$options
    		);
    	}
    
    	return $this->Html->link($title,$url,$options);
    }
    
    /**
     * Get a ul list styled as nav-bar
     * @param array $items - List items, see getMenuListItems for structure
     * @param bool $isRight - true to apply right class
     * @return <ul class="nav navbar-nav">
     */
    public function getNavbarList($items,$isRight = false){
    	$class = GeneralFunctions::appendValue(BootstrapClasses::NAV, BootstrapClasses::NAVBAR_NAV);
    	if ($isRight){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::NAVBAR_RIGHT);
    	}
    	return $this->getMenu($class,$items);
    }
    /**
     * Get a ul list styled as pills
     * @param array $items - List items, see getMenuListItems for structure
     * @param $isJustified - true to apply justified css
     * @return <ul class="nav nav-pills">
     */
    public function getPills($items,$isJustified = false){
    	$class = BootstrapClasses::NAV_PILLS;
    	if ($isJustified){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::NAV_JUSTIFIED);
    	}
    	return $this->getMenu($class,$items);
    }
    /**
     * Get a ul list styled as stacked
     * @param array $items - List items, see getMenuListItems for structure
     * @param $isJustified - true to apply justified css
     * @return <ul class="nav nav-pills nav-stacked">
     */
    public function getStacked($items,$isJustified = false){
    	$class = BootstrapClasses::NAV_STACKED;
    	if ($isJustified){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::NAV_JUSTIFIED);
    	}
    	return $this->getMenu($class,$items);
    }
    /**
     * Get a ul list styled as tabs
     * @param array $items - List items, see getMenuListItems for structure
     * @param $isJustified - true to apply justified css
     * @return <ul class="nav nav-tabs">
     */
    public function getTabs($items,$isJustified = false){
    	$class = BootstrapClasses::NAV_TABS;
    	if ($isJustified){
    		$class = GeneralFunctions::appendValue($class, BootstrapClasses::NAV_JUSTIFIED);
    	}
    	return $this->getMenu($class,$items);
    }
    /**
     * Get a dropdown menu
     * @param array $items - List items, see getMenuListItems for structure
     * @return <ul class="dropdown-menu">
     */
    public function getDropDownMenu($items){
    	return $this->getMenu(BootstrapClasses::DROPDOWN_MENU,$items);
    }
    /**
     * Get a list with elements
     * @param string $class - The class of the ul element
     * @param array $items - Array with items configuration see getMenuListItems parameter
     * @return a <ul> list
     */
    public function getMenu($class,$items){
    	$options = ['class' => $class];
    	$content = $this->getMenuListItems($items);
    	return $this->Html->tag('ul',$content,$options);
    }
    /**
     * Get a menu list
     * @param array $items
     * @example item [
     *      'isDivider' =>  true to get a divider li
     *      OR
     *      'anchor'    =>  [
     *          'title'     =>  URL title
     *          'url'       =>  URL array
     *          'options'   =>  URL html options
     *      ]//url
     *      OR
     *      'text'      =>  Text of li element
     *      OR
     *      'header'      =>  Text of li element
     *      OR
     *      'Children'   =>  [
     *          'text'  =>  The item's text
     *          'items' =>  Array of items similar with this one for submenu
     *      ],
     *      'isActive'  =>  true if the li item is the active
     *      'options'   =>  array with html options
     * ]
     */
    public function getMenuListItems($items){
    	$html = [];
    	if (!empty($items)){
    		foreach ($items as $item){
    			if (isset($item['isDivider']) && $item['isDivider'] === true){
    				$html[] = $this->getDividerListItem();
    			}
    			else {
    				$isActive = isset($item['isActive'])?$item['isActive']:false;
    				if (isset($item['anchor'])){
    					$html[] = $this->getAnchorListItemFromArray($item,$isActive);
    				}
    				else if (isset($item['text'])){
    					$html[] = $this->getTextListItem($item['text'],$isActive);
    				}//if isset text
    				else if (isset($item['header'])){
    					$html[] = $this->getHeaderListItem($item['header']);
    				}//if isset text
    				else if (isset($item['Children']) && !empty($item['Children'])){
    					$options = isset($item['options'])?$item['options']:[];
    					$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::DROPDOWN_TOGGLE);
    					$options['data-toggle'] = BootstrapClasses::DROPDOWN;
    					$text = $item['Children']['text'].'<span class="'.BootstrapClasses::CARET.'"></span>';
    					$options['escape'] = false;
    					$html[] = '<li class="'.BootstrapClasses::DROPDOWN.'">';
    					$html[] = $this->Html->link($text,'#',$options);
    					$html[] = '<ul class="'.BootstrapClasses::DROPDOWN_MENU.'" role="menu">';
    					$html[] = $this->getMenuListItems($item['Children']['items']);
    					$html[] = '</ul>';
    					$html[] = '</li>';
    				}//else isset children
    			}// else !isDivider
    		}//foreach
    	}//if !empty
    
    	return implode(' ',$html);
    }
    
    public function getAnchorListItemFromArray($item,$isActive = false){
    	$title = $item['anchor']['title'];
    	$url = isset($item['anchor']['url'])?$item['anchor']['url']:null;
    	$urlOptions = isset($item['anchor']['options'])?$item['anchor']['options']:[];
    	$liOptions = isset($item['options'])?$item['options']:[];
    
    	return $this->getAnchorListItem($title, $url, $urlOptions, $isActive, $liOptions);
    }
    /**
     * Get an anchor list item
     * @param string $title - the anchor text
     * @param string $url - the anchor url
     * @param array $options - Anchor html options
     * @param bool $isActive - true to apply active class
     * @param array $liOptions - array of li html options
     * @return <li><a href="$url">$title</a></li>
     */
    public function getAnchorListItem($title,$url = null,$options = [],$isActive = false,$liOptions = []){
    	$options['escape'] = false;
    	$link = $this->Html->link($title,$url,$options);
    	if ($isActive){
    		$liOptions['class'] = 'active';
    	}
    	$liOptions['escape'] = false;
    	return $this->Html->tag('li',$link,$liOptions);
    }
    /**
     * Get a header list item
     * @param string $text - The displayed text
     * @param array $options - Html options
     * @return <li class="dropdown-header">$text</li>
     */
    public function getHeaderListItem($text,$options = []){
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', 'dropdown-header');
    	return $this->getTextListItem($text,false,$options);
    }
    /**
     * Get a text li element
     * @param string $text - The label of li
     * @param bool $isActive - true to apply active class
     * @param array $options - Html option
     * @return <li>$text</li>
     */
    public function getTextListItem($text,$isActive = false,$options = []){
    	if ($isActive){
    		$options['class'] = GeneralFunctions::combineValues($options, 'class', 'active');
    	}
    
    	return $this->Html->tag('li',$text,$options);
    }
    /**
     * Get a divide li element
     * @return <li class="divider"</li>
     */
    public function getDividerListItem(){
    	return $this->Html->tag('li','',['class' => 'divider']);
    }
    /**
     * Get a bootstrap toolbar
     * @param array $buttonGroups - List of group buttons
     * @example $buttonGroups = [
     *      0   =>  [
     *          'buttons' => [
     *              0   =>  ['title' => '1'],
     *              1   =>  ['title' => '2'],
     *          ]
     *      ]
     * ];
     * @param array $options - Html options
     * @return a bootstrap toolbar element
     */
    public function getToolbar($buttonGroups,$options = []){
    	$html = [];
    	foreach($buttonGroups as $group){
    		$buttons = $group['buttons'];
    		$grpOptions = isset($group['options'])?$group['options']:[];
    		$size = isset($group['size'])?$group['size']:null;
    		$isVertical = isset($group['isVertical'])?$group['isVertical']:false;
    		$html[] = $this->getButtonGroup($buttons, $grpOptions, $size, $isVertical);
    	}
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::BTN_TOOLBAR);
    	$options['role'] = "toolbar";
    
    	return $this->Html->tag('div',implode(' ',$html),$options);
    }
    /**
     * Gen a button group component
     * @param array $buttons - A list with the buttons configuration
     * @example Each item of $buttons array must have the structure described in getButtonFromArray function
     * @param array $options - Html options for btn-group
     * @param string $size - The size of the button group
     * @return a bootstrap button group
     */
    public function getButtonGroup($buttons,$options = [],$size = null,$isVertical = false){
    	$html = [];
    	if (!empty($buttons)){
    		foreach($buttons as $button){
    			if (isset($button['items'])){
    				$span = '<span class="'.  BootstrapClasses::CARET.'"></span>';
    				$button['title'] = GeneralFunctions::combineValues($button, 'title', $span);
    				$button['options'] = [
    				'class' => BootstrapClasses::DROPDOWN_TOGGLE,
    				'data-toggle' => BootstrapClasses::DROPDOWN
    				];
    				$html[] = $this->getButtonFromArray($button);
    				$html[] = $this->getDropDownMenu($button['items']);
    			}
    			else {
    				$html[] = $this->getButtonFromArray($button);
    			}
    		}//foreach
    	}//if !empty buttons
    	if (!$isVertical){
    		$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::BTN_GROUP);
    	}
    	else {
    		$options['class'] = GeneralFunctions::combineValues($options, 'class', BootstrapClasses::BTN_GROUP_VERTICAL);
    	}
    
    	if (!empty($size)){
    		$sizeClass = GeneralFunctions::getButtonGroupSizeClass($size);
    		$options['class'] = GeneralFunctions::combineValues($options, 'class', $sizeClass);
    	}//if !empty size
    
    	return $this->Html->tag('div',implode(' ',$html),$options);
    }
    /**
     * Get a button from an array parameters
     * @param array $button - Button parameters
     * @example $button = [
     *      'title'     =>  'Search',
     *      'icon'      =>  'search',
     *      'style'     =>  'primary',
     *      'options'   =>  ['class' => 'btn-search'],
     *      'isBlock'   =>  false,
     *      'size'      =>  'lg'
     *      'path'      =>  '/examples/demo' used only if its an anchor button
     * ];
     * @return a button element
     */
    public function getButtonFromArray($button){
    	$title = $button['title'];
    	$icon = isset($button['icon'])?$button['icon']:null;
    	$style = isset($button['style'])?$button['style']:'default';
    	$btnOptions = isset($button['options'])?$button['options']:[];
    	$isBlock = isset($button['isBlock'])?$button['options']:false;
    	$btnSize = isset($button['size'])?$button['size']:null;
    	$path = isset($button['path'])?$button['path']:null;
    	$btn = null;
    
    	if ($icon != null){
    		if ($path == null){
    			$btn = $this->getIconButton($icon,$title,$style,$btnOptions,$isBlock,$btnSize);
    		}
    		else {
    			$btn = $this->getIconAnchorButton($icon,$path,$style,$title,$btnOptions,$isBlock,$btnSize);
    		}
    
    	}
    	else {
    		if ($path == null){
    			$btn = $this->getButton($style,$title,$btnOptions,$isBlock,$btnSize);
    		}
    		else {
    			$btn = $this->getAnchorButton($style,$title,$path,$btnOptions,$isBlock,$btnSize);
    		}
    
    	}//if $icon == null
    
    	return $btn;
    }
    /**
     * Get an anchor styled as bootstrap button
     * @param string $icon - The name of the icon
     * @param mixed $path - Either the string location, or a routing array.
     * @param string $style - The bootstrap button style
     * @param string $title - The anchor's value
     * @param array $options - Html options
     * @param bool $isBlock - true to use block class
     * @param string $size - One of 'lg','sm','xs' to set the size of the button
     * @return input tag type="button"
     */
    public function getIconAnchorButton($icon,$path,$style = 'default',$title = '', $options = [],$isBlock = false,$size = null){
    	$css = $this->getSpanIcon($icon);
    
    	return $this->getAnchorButton($style,$css.' '.$title,$path,$options,$isBlock,$size);
    }
    /**
     * Get a bootstrap icon button
     * @param string $icon - The name of the icon
     * @param string $title - The button's value
     * @param string $style - The bootstrap button style
     * @param array $options - Html options
     * @param bool $isBlock - true to use block class
     * @param string $size - One of 'lg','sm','xs' to set the size of the button
     * @return input tag type="button"
     */
    public function getIconButton($icon,$title = '',$style='default', $options = [],$isBlock = false,$size = null){
    	$css = $this->getSpanIcon($icon);
    
    	return $this->getButton($style,$css.' '.$title,$options,$isBlock,$size);
    }
    /**
     * Get a span icon
     * @param string $iconName - The name of the icon
     * @param array $options - Html option
     * @param string $base - Base class of the icon
     * @param string $prefix - The prefix of the icon
     * @return <span class="$base $prefix$name"></span>
     */
    public function getSpanIcon($iconName,$options = [],$base = 'glyphicon',$prefix = 'glyphicon-'){
    	$iconCss = GeneralFunctions::getIconClass($iconName,$base,$prefix);
    	$options['class'] = GeneralFunctions::combineValues($options, 'class', $iconCss);
    	return $this->Html->tag('span','',$options);
    }
    
}
