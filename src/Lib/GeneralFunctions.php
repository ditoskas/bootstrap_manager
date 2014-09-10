<?php
namespace BootstrapManager\Lib;
use BootstrapManager\Lib\BootstrapClasses;
class GeneralFunctions {
    public static function getListItemClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'primary': $css = BootstrapClasses::LIST_ITEM_PRIMARY; break;
            case 'success': $css = BootstrapClasses::LIST_ITEM_SUCCESS; break;            
            case 'info': $css = BootstrapClasses::LIST_ITEM_INFO; break;  
            case 'warning': $css = BootstrapClasses::LIST_ITEM_WARNING; break;  
            case 'danger': $css = BootstrapClasses::LIST_ITEM_DANGER; break;  
        }
        
        return $css;
    }
    public static function getAlertClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'primary': $css = BootstrapClasses::ALERT_PRIMARY; break;
            case 'success': $css = BootstrapClasses::ALERT_SUCCESS; break;            
            case 'info': $css = BootstrapClasses::ALERT_INFO; break;  
            case 'warning': $css = BootstrapClasses::ALERT_WARNING; break;  
            case 'danger': $css = BootstrapClasses::ALERT_DANGER; break;  
        }
        
        return $css;
    }
    
    public static function getLabelClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'default': $css = BootstrapClasses::LABEL_DEFAULT; break;
            case 'primary': $css = BootstrapClasses::LABEL_PRIMARY; break;
            case 'success': $css = BootstrapClasses::LABEL_SUCCESS; break;            
            case 'info': $css = BootstrapClasses::LABEL_INFO; break;  
            case 'warning': $css = BootstrapClasses::LABEL_WARNING; break;  
            case 'danger': $css = BootstrapClasses::LABEL_DANGER; break;  
        }
        
        return $css;
    }
    /**
     * Get the size class of button group
     * @param string $size - One of lg,sm,xs
     * @return string - The btn-group size class
     */
    public static function getButtonGroupSizeClass($size){
        $css = $size; //in case the style doesn't exist then return the same value
        switch ($size){
            case 'lg': $css = BootstrapClasses::BTN_GROUP_LARGE; break;
            case 'sm': $css = BootstrapClasses::BTN_GROUP_SMALL; break;
            case 'xs': $css = BootstrapClasses::BTN_GROUP_EXTRA_SMALL; break;            
        }
        
        return $css;
    }
    /**
     * Get an icon class
     * @param string $name - The name of the icon e.g. user
     * @param string $base - The base class if exists e.g. glyphicon, fa(for font awesome)
     * @param string $prefix - The class prefix
     * @return string - the class of the icon
     */
    public static function getIconClass($name,$base = 'glyphicon',$prefix='glyphicon-'){
        return $base.' '.$prefix.$name;
    }
    /**
     * Get a class for the text color
     * @param string $style - One of bootstrap style 
     * @return string - class of text color
     */
    public static function getColorTextClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'muted': $css = BootstrapClasses::TEXT_MUTED; break;
            case 'primary': $css = BootstrapClasses::TEXT_PRIMARY; break;
            case 'success': $css = BootstrapClasses::TEXT_SUCCESS; break;            
            case 'info': $css = BootstrapClasses::TEXT_INFO; break;  
            case 'warning': $css = BootstrapClasses::TEXT_WARNING; break;  
            case 'danger': $css = BootstrapClasses::TEXT_DANGER; break;  
        }
        
        return $css;
    }
    /**
     * Get a background color class
     * @param string $style - One of bootstrap style 
     * @return string - class of background color
     */
    public static function getBackgroundClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'primary': $css = BootstrapClasses::BACKGROUND_PRIMARY; break;
            case 'success': $css = BootstrapClasses::BACKGROUND_SUCCESS; break;            
            case 'info': $css = BootstrapClasses::BACKGROUND_INFO; break;  
            case 'warning': $css = BootstrapClasses::BACKGROUND_WARNING; break;  
            case 'danger': $css = BootstrapClasses::BACKGROUND_DANGER; break;  
        }
        
        return $css;
    }
    /**
     * Get the button classes based on the style
     * @param string $style - One of the bootstrap image styles
     * @return a string with class name
     */
    public static function getImageClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'rounded': $css = BootstrapClasses::IMAGE_ROUNDED; break;
            case 'circle': $css = BootstrapClasses::IMAGE_CIRCLE; break;
            case 'thumbnail': $css = BootstrapClasses::IMAGE_THUMBNAIL; break;            
        }
        
        return $css;
    }
    /**
     * Get the button classes based on the style
     * @param string $style - One of the bootstrap button styles
     * @return string with button class
     */
    public static function getButtonClass($style){
        $css = $style; //in case the style doesn't exist then return the same value
        switch ($style){
            case 'default': $css = BootstrapClasses::BUTTON_DEFAULT; break;
            case 'primary': $css = BootstrapClasses::BUTTON_PRIMARY; break;
            case 'info': $css = BootstrapClasses::BUTTON_INFO; break;
            case 'warning': $css = BootstrapClasses::BUTTON_WARNING; break;
            case 'danger': $css = BootstrapClasses::BUTTON_DANGER; break;                      
            case 'success': $css = BootstrapClasses::BUTTON_SUCCESS; break;  
            case 'link': $css = BootstrapClasses::BUTTON_LINK; break; 
        }
        
        return $css;
    }
    /**
     * Get the button classes based on the style
     * @param string $size - One of the bootstrap button sizes
     * @return string with button size class
     */
    public static function getButtonSizeClass($size){
        $css = $size; //in case the style doesn't exist then return the same value
        switch ($size){
            case 'lg': $css = BootstrapClasses::BUTTON_LARGE; break;
            case 'sm': $css = BootstrapClasses::BUTTON_SMALL; break;
            case 'xs': $css = BootstrapClasses::BUTTON_EXTRA_SMALL; break;            
        }
        
        return $css;
    }
    /**
     * Append a value to key array
     * @param array $tbl - The source array
     * @param mixed $key - The key where the value will be appended
     * @param string $value - The value to append
     * @return string
     */
    public static function combineValues($tbl,$key,$value){
        $result = $value;
        if (isset($tbl[$key])){
            $result = GeneralFunctions::appendValue($tbl[$key], $value);
        }
        return $result;
    }
    /**
     * Append a value to a string
     * @param type $origin - The first string
     * @param type $valueToAppend - The string to be appended
     * @return type String
     */
    public static function appendValue($origin,$valueToAppend){
        return $origin.' '.$valueToAppend;
    }
}
