<?php


use src\Purchase;

require_once __DIR__ . '/../vendor/autoload.php';

$purchase = new Purchase;


echo $purchase->totalPurchaseWithDiscount(6);