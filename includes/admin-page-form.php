<?php

function myforms_page_settings(){

	add_option('myform-email-checkbox');
	add_option('myform-comment-checkbox');

	$myform_email=get_option('myform-email-checkbox');
	$myform_comment=get_option('myform-comment-checkbox');


	if (array_key_exists('myform-inside-form',$_POST)) {

		if ( isset( $_POST['email'] ) ) {
			update_option( 'myform-email-checkbox', $_POST['email'] );
			$myform_email=$_POST['email'];
		}else{
			update_option('myform-email-checkbox','No');
			$myform_email="No";
		}

		if ( isset( $_POST['comment'] ) ) {
			update_option( 'myform-comment-checkbox', $_POST['comment'] );
			$myform_comment=$_POST['comment'];
		}else{
			update_option('myform-comment-checkbox','No');
			$myform_comment="No";
		}
	}

	?>
    <div style="height: 20px;"> </div>
	<div class="container jumbotron" >
        <h1 style="padding-bottom: 40px;">MyForm Admin</h1>
		<form method="post" action="<?php echo admin_url('admin.php?page=my-forms'); ?>">
            <div class="alert alert-primary">
		    	<input type="checkbox"  name="email" value="Yes" <?php if ($myform_email==="Yes"){echo "checked";}?>> Email Me the new feed backs<br>
            </div>
            <div class="alert alert-primary">
                <input type="checkbox"  name="comment" value="Yes" <?php if ($myform_comment==="Yes"){echo "checked";}?>> Comment it on a page<br>
            </div>
			<input type="submit" class="btn btn-success" name="myform-inside-form" value="Submit">
		</form>
	</div>
	<?php
}