<?php
$url = explode("/", $_SERVER['REQUEST_URI']);
$path = "/ajax/$url[2].php";

$response = [
  "status" => "success",
  "notification" => "Ajax request was ok!",
  "file" => $path,
];

header('Content-type: application/json');
echo json_encode($response);
exit();