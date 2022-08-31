<?php
$url = explode("/", $_SERVER['REQUEST_URI']);
$path = get_template_directory() . "/ajax/$url[2]/$url[3]/$url[4].php";
$response = [
  "status" => "success",
  "notification" => "Ajax request was ok!",
  "file" => $path,
];

header('Content-type: application/json');
echo json_encode($response);
exit();