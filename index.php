<?php
require 'flight/Flight.php';
require __DIR__ . '/vendor/autoload.php';

define("VIEW_PATH", __DIR__ . "/layout/view");
define("RES_VERSION", "20180105");

Flight::set('flight.views.path', VIEW_PATH);

Flight::route('/', function () {
    Flight::render("index/index", array("name" => "index"));
});

Flight::start();
?>
