<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  $comment = new Comment($donnees); ?>

  <!-- Comment Content -->     
  <div class="row col-lg-12 justify-content-center">
    <div class="col-lg-6 comment" id="<?= $comment->id() ?>">
      <div class="row justify-content-center">
        <div class="mx-auto">
          <?= $comment->comment() ?>
        </div>
      </div>                            
      <div class="row justify-content-end">
      <?php 
        if($comment->moderated()==0){
          if (isset($permission) && $permission->comment_moderation()==1){ ?>
            <div class="col-lg-1 col-xs-1">
              <a role="button" class="controls fas fa-check" aria-haspopup="true" aria-expanded="false" title="Le commentaire est signalé pour rien ? il reste publié" href="index.php?page=validate_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>"></a>
            </div>
          <?php }
        }
        if (isset($permission) && $permission->comment_delete()==1){ ?>
          <div class="col-lg-1 col-xs-1">
            <a role="button" class="controls fas fa-times-circle" aria-haspopup="true" aria-expanded="false" title="Supprimer ce commentaire" href="index.php?page=delete_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>"></a>
          </div>
        <?php 
        }
        if($comment->moderated()==0){ ?>
          <div class="col-lg-2 col-xs-2">               
            <a role="button" class="controls far fa-flag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="signaler">(<?= $comment->report() ?>)</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=insulte/injure">insulte/injure</a>
                <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=propos_offensant/racisme">propos offensant/racisme</a>
                <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=commentaire_à_caractère_politique">commentaire à caractère politique</a>
                <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=autre">autre</a>
              </div>

          </div>
        <?php } ?>                      
      </div>
    </div>
  </div>


                   
