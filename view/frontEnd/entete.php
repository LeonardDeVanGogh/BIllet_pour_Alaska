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
          
          <?php
            if (isset($permission) && $permission->article_add_update()==1){
              echo '<li class="nav-item">
                      <a class="nav-link" href="index.php?page=manage_billet">Manage Billet</a>
                    </li>';
            }
            if (isset($permission) && $permission->rank_update()==1){
              echo '<li class="nav-item">
            <a class="nav-link" href="index.php?page=rankAdministration">manage users</a>
          </li>';
            }
          ?>
          
          
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=test">test</a>
          </li>

          <?php
            if (isset($_SESSION['userRank'])){
              echo '<li class="nav-item">
                      <a class="nav-link" href="index.php?page=session">' . $_SESSION['userName'] . '</a>
                    </li>';
            }else{
              echo '<li class="nav-item">
                      <a class="nav-link" href="index.php?page=login">login</a>
                    </li>';
            }
          ?>
        </ul>
      </div>
    </div>
  </nav>