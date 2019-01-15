<?php
function myform_contact_form(){

	wp_enqueue_style('myform-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');

	/*Content*/
	$content='';
	$content.='<form action="http://localhost/udemy/thank-you/" method="post">';
	$content.='<br />';
	$content.='<input type="text" class="form-control" name="full_name" placeholder="Your Full Name">';
	$content.='<br />';
	$content.='<input type="text" class="form-control" name="email_address" placeholder="Your Email Address">';
	$content.='<br />';
	$content.='<input type="text" class="form-control" name="phone_number" placeholder="Phone Number">';
	$content.='<br />';
	$content.='<textarea  class="form-control" name="comments" placeholder="Give us your feedback"></textarea>';
	$content.='<br />';

	$content.='<input type="submit" class="btn btn-primary" name="myform_submit_contact_form" value="SUBMIT YOUR INFORMATION">';
	$content.='</form>';

	return $content;

}