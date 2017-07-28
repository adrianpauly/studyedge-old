<?php

$reviewSession = file_get_contents('http://facebook.studyedge.com/live_review_schedule?subject_id=' . $_GET['subject'] . '&school_id=' . $_GET['school']);
$errorMessage = '<div class="error-message" style="width: 60%; margin: 0 auto; text-align:center"><p>Whoops! We are currently experiencing some technical difficulties.</p><p>For today\'s schedule please go to <a href="http://www.facebook.com/studyedge" target="_blank">www.facebook.com/studyedge</a> or <a href="http://www.twitter.com/studyedge" target="_blank">www.twitter.com/studyedge</a>. We apologize for the inconvenience and should be back up shortly.</p>';

$display = $reviewSession == '' ? $errorMessage : $reviewSession;

print_r($display);

?>
