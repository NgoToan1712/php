<?php
session_start();
if (!isset($_COOKIE['login'])) {
    header("location: login.php");
}