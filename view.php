<?php

require('../../config.php');
require_once('../../lib/moodlelib.php');

require_login();



//get our config
$def_config = get_config('block_superiframe');

$usercontext = context_user::instance($USER->id);
$PAGE->set_course($COURSE);
$PAGE->set_url('/blocks/superiframe/view.php');
$PAGE->set_heading($SITE->fullname);
$PAGE->set_pagelayout($def_config->pagelayout);
$PAGE->set_title(get_string('pluginname', 'block_superiframe'));
$PAGE->navbar->add(get_string('pluginname', 'block_superiframe'));


// start output to browser
echo $OUTPUT->header();
echo $OUTPUT->heading(get_string('pluginname', 'block_superiframe'),5);

/* User's fullname
This is the function that Moodle prepares for us and this will handle display of user's name correctly.
This is function is what Moodle provides for us from moodlelib.php (required above)
*/
echo '<br>' . fullname($USER) . '<br>';
/* Output user's picture
We are using global $OUTPUT variable which is instance of core renderer, that has a nice function called user_picture, which given
the $USER object, will return the HTML that uses picture. and we are outputing that here straight away.
It is possible to put size here big or small.
*/
echo '<br>' . $OUTPUT->user_picture($USER) . '<br>';


$src = $def_config->url;


$height = $def_config->height;
$width = $def_config->width;


// Some content goes here
echo "<iframe src='$src' height='$height' width='$width' style='border:0'></iframe>";

//send footer out to browser
echo $OUTPUT->footer();
return;
	