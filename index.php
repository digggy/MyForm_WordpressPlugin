<?php
/**
 * Plugin Name: MyForm
 * Description: Allows you to crate and attach feedback form in wordpress pages.
 * Version: 1.0.0
 * Author: Digdarshan
 * Author URI: http://www.google.com/
 *
**/

//Admin Control Pannel Form
include( 'includes/admin-page-form.php' );
//Site Form for data input
include( 'includes/myform-siteform.php' );
//Send the feedback via email
include( 'includes/myform-sendviaemail.php' );
//Add to comments
include( 'includes/myform-addtocomments.php' );
//Add to database
include( 'includes/myform-addtodatabase.php' );



add_action('wp_head','myform_form_capture');

add_shortcode('myform-contanct-form','myform_contact_form');
add_action('admin_menu','myform_addmennu');
add_action( 'admin_enqueue_scripts', 'myform_enqueue_styles' );

function myform_enqueue_styles() {
	wp_enqueue_style('myform-bootstrap','https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css');
}

//Adding Menu to the wordpress Admin
function myform_addmennu(){
	add_menu_page("MyForms",'MyForms','administrator','my-forms','myforms_page_settings','
    dashicons-editor-paste-word',200);
};

//Form capture
function myform_form_capture(){
    global $post,$wpdb,$myform_email;

    if (array_key_exists('myform_submit_contact_form',$_POST))
    {
        $send_to='digdarshan.kunwar@gmail.com';
        $subject='Contact Form Submission ';
        $body='';
        $body.=$_POST['full_name'].'<br />';
        $body.=$_POST['email_address'].'<br />';
        $body.=$_POST['phone_number'].'<br />';
        $body.=$_POST['comments'].'<br />';

        //Send via mail
        if  (get_option('myform-email-checkbox')=="Yes"){
            send_via_mail($send_to,$subject,$body);
        };


        //Insert the information into comment
        if  (get_option('myform-comment-checkbox')=="Yes") {
            myform_addto_comments($post,$body);
        }

        //== Add the submission to the data base == //
        //myform_add_commentstodb($wpdb,$body);

    }

}





