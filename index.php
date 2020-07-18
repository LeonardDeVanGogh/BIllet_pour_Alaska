<?php

    session_start();

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
        if($_GET['page']=="home")
            {
                $frontEndControler->home();
            }
        if($_GET['page']=="billet")
            {
                $frontEndControler->billet();
            }
        if($_GET['page']=="login")
            {
                $frontEndControler->login();
            }
        if($_GET['page']=="inscription")
            {
                $frontEndControler->inscription();
            }    
        if($_GET['page']=="publications")
            {
                $frontEndControler->publications();
            }
        if($_GET['page']=="administration")
            {
                $backEndControler->administration();
            }
        if($_GET['page']=="report_comment")
            {
                $backEndControler->report_comment();
            }
        if($_GET['page']=="addComment")
            {
                $backEndControler->addComment();
            }
        if($_GET['page']=="delete_comment")
            {
                $backEndControler->deleteComment();
            }
        if($_GET['page']=="hide_comment")
            {
                $backEndControler->hideComment();
            }
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
        if($_GET['page']=="inscription")
            {
                $frontEndControler->Inscription();
            }
        if($_GET['page']=="userConnection")
            {
                $backEndControler->userConnection();
            }
        if($_GET['page']=="user_inscription")
            {
                $backEndControler->userInscription();
            }
        if($_GET['page']=="session")
            {
                $frontEndControler->session();
            }
        if($_GET['page']=="userDisconnection")
            {
                $backEndControler->userDisconnection();
            } 
        if($_GET['page']=="rankAdministration")
            {
                $backEndControler->rankAdministration();
            }
        if($_GET['page']=="userRankAdministration")
            {
                $backEndControler->userRankAdministration();
            }   
        if($_GET['page']=="userAdministration")
            {
                $backEndControler->userAdministration();
            }
        if($_GET['page']=="user_management")
            {
                $backEndControler->userManagement();
            } 
        if($_GET['page']=="user_delete")
            {
                $backEndControler->userDelete();
            }
        if($_GET['page']=="contact")
            {
                $frontEndControler->contact();
            }       
    }
    else
    {
        $frontEndControler->home();
    }


?>
