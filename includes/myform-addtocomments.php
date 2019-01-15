<?php
function myform_addto_comments($post,$body){

	$time = current_time('mysql');
	$data = array(
		'comment_post_ID' => $post->ID,
		'comment_content' => $body,
		'comment_author_IP' => $_SERVER['REMOTE_ADDR'],
		'comment_date' => $time,
		'comment_approved' => 1,
	);

	wp_insert_comment($data);
};
