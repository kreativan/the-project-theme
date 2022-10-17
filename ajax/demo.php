<?php
$url = explode("/", $_SERVER['REQUEST_URI']);
$path = "/ajax/$url[2].php";

$response = [
  "status" => "success",
  "notification" => "Ajax request was ok!",
  "file" => __FILE__,
  "REQUEST" => $_REQUEST,
];

header('Content-type: application/json');
echo json_encode($response);
exit();