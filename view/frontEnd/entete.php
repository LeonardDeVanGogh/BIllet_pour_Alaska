 <?php
 defined("_Can_access_") or die("Inclusion directe non autorisée");
 ?> 
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand fas fa-home" href="index.php"></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=contact">Contact</a>
          </li>

          <?php
            if (isset($_SESSION['userRank']) && $_SESSION['userRank']=="administrator"){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Administration
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php if (isset($permission) && $permission->rank_update()==1){ ?>
                    <a class="dropdown-item" href="index.php?page=rank_administration">Droits D'accès</a>
                  <?php } ?>
                </div>
              </li>
            <?php }

            if (isset($_SESSION['userRank']) && ($_SESSION['userRank']=="moderator" OR $_SESSION['userRank']=="administrator")){ ?>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Modération
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <?php if (isset($permission) && $permission->user_administration()==1){ ?>
                    <a class="dropdown-item" href="index.php?page=user_administration">Gestion Utilisateurs</a>
                  <?php }
                      if (isset($permission) && $permission->comment_moderation()==1){ ?>
                    <a class="dropdown-item" href="index.php?page=comment_moderation">Commentaires</a>
                  <?php } ?>
                </div>
              </li> 
          <?php 
            }
            if (isset($_SESSION['userRank'])){ ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=session">Mon Espace</a>
              </li>
              <li class="nav-item">                     
                <a class="nav-link" title="Déconnexion" href="index.php?page=user_disconnection">
                  <span class="fas fa-2x fa-sign-out-alt"></span>
                </a>
              </li>

          <?php 
            }else{ ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?page=login">login</a>
              </li>
          <?php 
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>