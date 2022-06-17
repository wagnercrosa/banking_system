<?php
$title = "Banking System";

require __DIR__ . "/source/autoload.php";
require __DIR__ . "/public/template.php";

$client = new \Source\App\Client('Wagner', 'Corrêa');
$account = new \Source\Bank\Account(
  '1865',
  '14529-1',
  $client,
  '5900'
);

$account->extract();

var_dump($account);


