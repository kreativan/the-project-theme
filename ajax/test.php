<?php

$response = [
  "status" => "success",
  "notification" => "Ajax request was ok!",
  "GET" => $_GET,
  "POST" => $_POST,
];

header('Content-type: application/json');
echo json_encode($response);
exit();