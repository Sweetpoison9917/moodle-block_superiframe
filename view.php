<?php

require('../../config.php');
require_once('../../lib/moodlelib.php');




//fetch the size of the iframe
$size = optional_param('size','medium',PARAM_TEXT);

//set the url of the $PAGE
//note we do this before require_login preferably
$PAGE->set_url('/blocks/superiframe/view.php',array('size'=>$size));
require_login();



//get our config
$def_config = get_config('block_superiframe');

$usercontext = context_user::instance($USER->id);
$PAGE->set_course($COURSE);

$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout($def_config->pagelayout);
$PAGE->set_title(get_string('pluginname', 'block_superiframe'));
$PAGE->navbar->add(get_string('pluginname', 'block_superiframe'));

$renderer=$PAGE->get_renderer('block_superiframe');

switch($size){
	case 'custom':
		$width = $def_config->width;
		$height = $def_config->height;
		break;
	case 'small':
		$width = 360;
		$height = 240;
		break;
	case 'medium':
		$width = 800;
		$height = 600;
		break;
	case 'big':
		$width = 1024;
		$height = 768;
		break;
	
}

$renderer->display_view_page($def_config->url, $width, $height);


return;
	