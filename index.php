<?php
$title = "Banking System";

require __DIR__ . "/source/autoload.php";
require __DIR__ . "/public/template.php";

$account = new \Source\Bank\AccountCurrent(
  "1865",
  "14529-1",
  new \Source\App\Client("Wagner", "Corrêa"),
  "1000",
  1000
);

var_dump($account);

$account->withdrawal(4000);
$account->extract();





