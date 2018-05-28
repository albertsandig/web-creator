<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('bread_crumps')){	

	/*
		Description: You can use this in view.
        How to use : 
            1. Load $this->load->helper('bread_crumps');
            2. use the function bread_crumps('your_css_class')
            
            output will be path basepath/class/function_name
	*/
    
   function bread_crumps($css_class)
   {    
        if(isset($_SERVER['PATH_INFO'])){
            $breadCrumps = explode("/",$_SERVER['PATH_INFO']);
            
            $breadcrumpUI = "<ol class='".$css_class."'>";
            
            for($i = 0; $i < count($breadCrumps); $i++){
                if($breadCrumps[$i] != ''){
                    $url = get_merge_string_array($breadCrumps,0,$i,'/');
                    $isLast = ($i == (count($breadCrumps)-1)) ? 'class="active"' : '';
                    $text = str_replace('_',' ', $breadCrumps[$i]);
                    $isLastUrl = ($i == (count($breadCrumps)-1)) ? ucfirst($text) : "<a href='".base_url($url)."'>".ucfirst($text). "</a>";
                    $breadcrumpUI .= "<li ".$isLast." >".$isLastUrl."</li>";
                } /*else {
                    $breadcrumpUI .= "<li><a href='". base_url() ."'>Home</a></li>";
                }*/
            }
            
            $breadcrumpUI .= "</ol>";
            
            echo $breadcrumpUI;
        }
   }   
   
   function get_merge_string_array($array,$from,$to,$split = '')
   {
        $string = '';
        $count = count($array);
        if($count > $to && 0 <= $from) {
            for($i = $from ; $i <= $to ;$i++){
                $applySpit = (($string != '')? $split : '');
                $string = $string .$applySpit. $array[$i];
            }
             
            return $string;
        }
    }
}
