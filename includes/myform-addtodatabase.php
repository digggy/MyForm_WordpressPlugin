<?php
//== Add the submission to the data base == //
function myform_add_commentstodb($wpdb,$body)
{
	$insertData=$wpdb->get_results("INSERT INTO ".$wpdb->prefix."form_submissions (data) VALUES ('".$body."')" );
};
