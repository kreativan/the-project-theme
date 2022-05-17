<?php
$id = get_sub_field('select_form');

get_template_part('includes/acf-form', null, [
  'id' => $id
]);