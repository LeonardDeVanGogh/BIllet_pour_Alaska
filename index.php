<?php
session_start();
define("_Can_access_", true);

function chargerClasse($className)
{
    if(file_exists('controler/' . $className . '.php')){
        require 'controler/' . $className . '.php';
    }
    else
    {
        require 'model/' . $className . '.php';
    }
}

spl_autoload_register('chargerClasse');
require_once("controler/backEnd/BackEndControler.php");
require_once("controler/frontEnd/FrontEndControler.php");

$backEndControler = new BackEndControler;
$frontEndControler = new FrontEndControler;

if (isset($_GET['page']))
{
    
    # --------------- frontEndControler --------------- #
    if($_GET['page']=="home")
    {
        $frontEndControler->home();
    }
    if($_GET['page']=="billet")
    {
        $frontEndControler->billet();
    }
    if($_GET['page']=="add_comment")
    {
        $frontEndControler->addComment();
    }
    if($_GET['page']=="report_comment")
    {
        $frontEndControler->report_comment();
    }
    if($_GET['page']=="inscription")
    {
        $frontEndControler->inscription();
    }
    if($_GET['page']=="user_inscription")
    {
        $frontEndControler->userInscription();
    }
    if($_GET['page']=="login")
    {
        $frontEndControler->login();
    }
    if($_GET['page']=="user_connection")
    {
        $frontEndControler->userConnection();
    }
    if($_GET['page']=="user_disconnection")
    {
        $frontEndControler->userDisconnection();
    }
    if($_GET['page']=="session")
    {
        $frontEndControler->session();
    }    
    if($_GET['page']=="user_infos_update")
    {
        $frontEndControler->userInfosUpdate();
    }
    if($_GET['page']=="user_delete")
    {
        $frontEndControler->userDelete();
    }
    if($_GET['page']=="contact")
    {
        $frontEndControler->contact();
    }

    # --------------- backEndControler --------------- #
    if($_GET['page']=="manage_billet")
    {
        $backEndControler->manageBillet();
    }
    if($_GET['page']=="creation_article")
    {
        $backEndControler->creationArticle();
    }
    if($_GET['page']=="delete_article")
    {
        $backEndControler->deleteArticle();
    }
    if($_GET['page']=="delete_comment")
    {
        $backEndControler->deleteComment();
    }
    if($_GET['page']=="hide_comment")
    {
        $backEndControler->hideComment();
    }    
    if($_GET['page']=="user_administration")
    {
        $backEndControler->userAdministration();
    }
    if($_GET['page']=="user_management")
    {
        $backEndControler->userManagement();
    } 
    if($_GET['page']=="comment_moderation")
    {
        $backEndControler->commentModeration();
    }
    if($_GET['page']=="validate_comment")
    {
        $backEndControler->validateComment();
    }
    if($_GET['page']=="rank_administration")
    {
        $backEndControler->rankAdministration();
    }
    if($_GET['page']=="user_rank_administration")
    {
        $backEndControler->userRankAdministration();
    }
            
}else{
    $frontEndControler->home();
}

?>
