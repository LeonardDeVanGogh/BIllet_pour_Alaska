<?php
  defined("_Can_access_") or die("Inclusion directe non autorisée");
  $comment = new Comment($donnees); ?>

      <!-- Comment Content -->     
          <div class="row col-lg-12 justify-content-center">
            <article class="col-lg-6 comment" id="' . $comment->id() . '">
              <div class="row justify-content-center">
                <div class="mx-auto">
                  <?= $comment->comment() ?>
                </div>
              </div>                            
              <div class="row justify-content-end">
              <?php if($comment->moderated()==0){
                if (isset($permission) && $permission->comment_moderation()==1){ ?>
                  <div class="col-lg-1">
                    <a role="button" class="controls fas fa-check" aria-haspopup="true" aria-expanded="false" title="valider" href="index.php?page=validate_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>"></a>
                  </div>
                <?php }
                if (isset($permission) && $permission->comment_hidden()==1){ ?>
                  <div class="col-lg-1">
                    <a role="button" class="controls fas fa-ban" aria-haspopup="true" aria-expanded="false" title="modérer" href="index.php?page=hide_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>"></a>
                  </div>
                <?php } ?>
                <div class="col-lg-2">               
                        <a role="button" class="controls far fa-flag" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="signaler">(<?= $comment->report() ?>)</a>
                          <div class="dropdown-menu" aria-labelledby="menuDeroulant">
                            <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>report_reason=insulte/injure">insulte/injure</a>
                            <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=propos offensant/racisme">propos offensant/racisme</a>
                            <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=commentaire à caractère politique">commentaire à caractère politique</a>
                            <a class="dropdown-item" href="index.php?page=report_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>&report_reason=autre">autre</a>
                          </div>
                        <a>
                      </div>
                
              <?php }
              if (isset($permission) && $permission->comment_delete()==1){ ?>
                <div class="col-lg-1">
                  <a role="button" class="controls fas fa-times-circle" aria-haspopup="true" aria-expanded="false" title="supprimer" href="index.php?page=delete_comment&comment_id=<?= $comment->id() ?>&id_article=<?= $comment->id_article() ?>"></a>
                </div>
              <?php } ?>                
  
              </div>
            </article>
          </div>

                   
