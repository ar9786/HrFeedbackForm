<?php
require_once('../config.php');
unset($_SESSION['user_name']);
header('Location: '.site_url.'admin/');
?>