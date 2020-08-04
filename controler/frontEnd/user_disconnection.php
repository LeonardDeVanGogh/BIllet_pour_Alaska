<?php
defined("_Can_access_") or die("Inclusion directe non autorisée");
  require_once('controler/frontEnd/protect_access.php');
if(!isset($permission)){
  header("location:index.php?page=home");
  die();
}
session_destroy();

header("Location: index.php?page=home");