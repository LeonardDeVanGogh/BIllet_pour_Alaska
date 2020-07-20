<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
  require_once('controler/frontend/protect_access.php');
  if (isset($permission)){
session_destroy();

header("Location: index.php?page=home");   
  }else {
    header("Location: index.php");
  }