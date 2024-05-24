<?php


require_once '../models/post_management.php';
DeletePost($_GET['id']);
header('location: ../views/homepage.php');