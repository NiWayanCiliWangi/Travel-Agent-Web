<?php

if (empty($_GET)) {
    include 'home.php';
}

if (isset($_GET["p"])) {
    if ($_GET["p"] == "home") {
        require 'home.php';
    } 
}
