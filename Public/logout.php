<?php
if($_SERVER['REQUEST_METHOD'] == 'GET' && $_GET['logout']) {
    session_start();
    session_destroy();
    exit;
}