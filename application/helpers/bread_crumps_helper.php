<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('bread_crumps')){	

	/*
		Description: You can use this in view.
        How to use :
	*/
   function bread_crumps($css_class)
   {    
        if(isset($_SERVER['PATH_INFO'])){
            $breadCrumps = explode("/",$_SERVER['PATH_INFO']);
            
            $breadcrumpUI = "<ol class='".$css_class."'>";
            
            for($i = 0; $i < count($breadCrumps); $i++){
                if($breadCrumps[$i] != ''){
                    $isLast = ($i == (count($breadCrumps)-1)) ? 'class="active"' : '';
                    $isLastUrl = ($i == (count($breadCrumps)-1)) ? ucfirst($breadCrumps[$i]) : "<a href='".base_url().$breadCrumps[$i]."'>".ucfirst($breadCrumps[$i]). "</a>";
                    $breadcrumpUI .= "<li ".$isLast." >".$isLastUrl."</li>";
                } else {
                    $breadcrumpUI .= "<li><a href='". base_url() ."'>Home</a></li>";
                }
            }
            
            $breadcrumpUI .= "</ol>";
            
            echo $breadcrumpUI;
        }
   }   
}
