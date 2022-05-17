<?php
//
//  Default Reponse
//

$response = [
  "status" => "none", // used also for notification color
  "reset_form" => false, // clear-reset form input values
  // "notification" => "Notification: Ajax form submit was ok!", // if no modal, notification will be used
  // "modal" => "<h3>Modal Response</h3><p>Ajax form submit was successful</p>", // modal has priority
  //"redirect" => "/", // if used with modal, will redirect after modal confirm... 
  "errors" => [], // array of errors (strings), will trigger notification for each
  "error_fields" => [], // array of names for invalid fields
  "post" => $_FILES,
];

//
//  Process Form
//

if (!empty($_POST['form_id'])) {

  if( !wp_verify_nonce($_POST['nonce'], "ajax-nonce") ) exit();

  $form_id = sanitize_text_field($_POST['form_id']);
  $form_fields = get_field('form_fields', $form_id);
  $files_count = count($_FILES);

  
  $req_array = [];
  $email_array = [];
  $labels_array = [];
  $files_array = [];

  foreach($form_fields as $f) {
    $labels_array[$f['name']] = $f['label'];
    if($f['required'] && $f['acf_fc_layout'] != 'file') $req_array[] = $f['name'];
    if($f['acf_fc_layout'] == 'email') $email_array[] = $f['name'];
    if($f['acf_fc_layout'] == 'file') $files_array[] = $f;
  }

  // Is there any required files ?
  $is_files = count($files_array) > 0 ? true : false;
  if($is_files) {
    $req_files = [];
    foreach($files_array as $f) {
      $key = $f['name'];
      $value = $f['label'];
      if($f['required']) $req_files[$key] = $value;
    }
    $req_files_count = count($req_files);
    $is_files = count($req_files) > 0 ? true : false;
  }


  //-------------------------------------------------------- 
  //  Validate
  //-------------------------------------------------------- 

  $v = the_project_valitron($_POST);
  $v->rule('required', $req_array); 
  $v->rule('email', $email_array);
  $v->labels($labels_array);

  $files_errors = ($is_files && ($files_count < $req_files_count)) ? true : false;

  if(!$v->validate() || $files_errors) {

    // get errors from valitron and store them in errors array
    $errors = [];
    $errors_fields = [];
    foreach($v->errors() as $key => $value) {
      $errors[] = $value[0]; 
      $errors_fields[] = $key;
    }

    // trigger files errors
    if($files_errors) {
      foreach($req_files as $e) {
        $errors[] = "{$e} is required";
      }
    }
    
    $response["status"] = "error";
    $response["errors"] = $errors;
    $response["reset_form"] = false;
    $response["error_fields"] = $errors_fields;

    header('Content-type: application/json');
    echo json_encode($response);
    exit();

  }

  //-------------------------------------------------------- 
  //  Validation pass, continue...
  //-------------------------------------------------------- 

  // We will store files and fields values here
  $post_files = [];
  $post_fields = [];

  // create post or no?
  $create_post = get_field('create_post', $form_id);
  $post_type_name = get_field('post_type_name', $form_id);
  if(empty($post_type_name) && !post_type_exists($post_type_name)) $create_post = false;

  //  Upload Files - $post_files
  // ===========================================================
  if($is_files) {
    // These files need to be included as dependencies when on the front end.
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    // Let WordPress handle the upload.
    foreach($files_array as $file) {
      $name = $file['name'];
      $post_files[$name] = media_handle_upload($name, 0);
    }
  }

  //  Fields - $post_fields
  // ===========================================================

  // get non-empty fields and store them to post_fields
  foreach($form_fields as $f) {
    if($f['acf_fc_layout'] != 'file') {
      $name = $f['name'];
      $value = $_POST[$name];
      if(!empty($value)) {
        $post_fields[$name] = sanitize_text_field($value);
      }
    }
  }

  // Create a Post
  // ===========================================================

  if($create_post) {

    $post_title = get_field('new_post_title', $form_id);
    $post_title = $project->str_replace($post_title, $_POST);
    $post_title = !empty($post_title) ? $post_title : $post_type_name;

    $meta_input = [];

    if(count($post_fields) > 0) {
      foreach($post_fields as $key => $value) $meta_input[$key] = $value;
    }

    if(count($post_files) > 0) {
      foreach($post_files as $key => $value) $meta_input[$key] = $value;
    }

    // Create lead
    $new_post = [
      'post_type' => $post_type_name,
      'post_title' => $post_title,
      'post_status' => 'publish',
      'meta_input' => $meta_input,
    ];

    wp_insert_post($new_post);

  }

  //  Email
  // ===========================================================

  if($send_email) {

    // Admin email
    $admin_email = get_field('admin_email', $form_id);
    $admin_email = !empty($admin_email) ? $admin_email : get_option('admin_email');

    // Subject
    $subject = get_field('subject', $form_id);
    $subject = $project->str_replace($subject, $_POST);
    $subject = !empty($subject) ? $subject : "Website form submition";

    // reply to
    $reply_to = $_POST['email'];
    foreach($form_fields as $f) {
      if($f['acf_fc_layout'] == 'email') {
        $name = $f['name'];
        if(!empty($_POST[$name])) $reply_to = sanitize_text_field($_POST[$name]);
        break;
      }
    }

    // Email headers
    $headers = [];
    $headers[] = 'Content-Type: text/html; charset=UTF-8';
    $headers[] = "From: Website <{$admin_email}>";
    $headers[] = "Reply-to: $reply_to";

    // Email to who?
    $send_to =  $admin_email;

    // Message
    $message = "";
    foreach($_POST as $key => $value) {
      $message .= "<strong>{$key}</strong>: {$value}<br />";
    }

    // attachments
    $attachments = [];
    if(count($post_files) > 0) {
      foreach($post_files as $file_id) {
        $attachments[] = wp_get_attachment_url($file_id);
      }
    }

    // Send Mail
    try {

      wp_mail($sent_to, $subject, $message, $headers, $attachments);

    } catch (Exception $e) {

      $response["email_error"] = $e->getMessage();

    }


  }


  //  Response
  // ===========================================================
  $title = get_field('success_title', $form_id);
  $title = $project->str_replace($title, $_POST);
  $text = get_field('success_message', $form_id);
  $text = $project->str_replace($text, $_POST);
  $response_text = !empty($title) ? "<h3>$title</h3>" : '';
  $response_text .= !empty($text) ? "<p>$text</p>" : '';
  $response["modal"] =  $response_text;
  $response["status"] = 'success';
  $response["reset_form"] = true;

}


header('Content-type: application/json');
echo json_encode($response);

exit();