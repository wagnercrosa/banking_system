<?php
$title = "Banking System";

require __DIR__ . "/source/autoload.php";
require __DIR__ . "/public/template.php";

$account = new \Source\Bank\AccountSaving(
  "1865",
  "14529-1",
  new \Source\App\Client("Wagner", "Corrêa"),
  "0"
);

var_dump($account);

$account->deposit(500);
$account->withdrawal(499);
$account->withdrawal(4);
$account->withdrawal(1000);
$account->extract();





