<?php
/**
 * Created by PhpStorm.
 * User: jaime
 * Date: 27/08/14
 * Time: 13:46
 */
session_start();
if ($_SERVER['REQUEST_URI'] != '/pt/participe') {
$_SESSION['croy05524711105mq'] = "Site Croydon";
}



/*if ($_SERVER['REQUEST_URI'] == '/pt/participe') {
    if ((isset($_SESSION['croy05524711105mq'])) AND (!empty($_SESSION['croy05524711105mq']))) {
        session_destroy();

    }
}*/