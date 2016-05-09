<?php

class block_superiframe_renderer extends plugin_renderer_base {

   //Here we return all the content that the goes in the block
   function fetch_block_content(){
	   global $CFG, $USER;
	   
	   $content = '';
	   $content .= '<br />' . get_string('welcomeuser','block_superiframe',$USER) . '<br />';
	   
	   $link = new moodle_url('/blocks/superiframe/view.php',array());
	   $content .= html_writer::link($link,get_string('gotosuperiframe','block_superiframe'));
	   
	   return $content;
  
   }
    //Here we aggregate all the pieces of content of the view page and displays them
    function display_view_page($url, $width, $height){
    
    }
}