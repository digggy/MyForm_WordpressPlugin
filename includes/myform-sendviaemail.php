<?php

function set_html_content_type(){
	return 'text/html';
};

function send_via_mail($send_to,$subject,$body){
	add_filter('wp_mail_content_type','set_html_content_type');
	wp_mail($send_to,$subject,$body);
	remove_filter('wp_mail_content_type','set_html_content_type');
};
