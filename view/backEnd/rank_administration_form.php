<?php

  defined("_Can_access_") or die("Inclusion directe non autorisée");
  include('controler/frontend/protect_access.php');
if(!isset($permission)){
  header("location:index.php?page=home");
  die();
}else{
  if($permission->rank_update()!=1){
    header("location:index.php?page=home");
    die();
  }
}
?>
 
<div class="row">
  <h3 class="col-lg-3"> <?= $rank ?></h3>
</div>

<form name="userAdministration" method="post" action="index.php?page=user_rank_administration">
  <div class="control-group">
    <div class="form-group controls">
      <?php 
        $userRankAdministration = new RankManager($dbh);        
        $nbActions = $userRankAdministration->rankAdministration($rank);
        while($donnees = $nbActions->fetch()) {
          $permission = new Rank($donnees);

          foreach($donnees as $key => $value){
            $method = $key;

            if(method_exists($permission,$method) && $method!=="rank" && $method!=="id"){
              $permission->$method($value); ?>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="<?= $key ?>" value="<?= $permission->$method($value) ?>"<?php if ($permission->$method($value)==1){ ?> checked <?php } ?> >
                <label class="form-check-label" for="inlineCheckbox1"><?= $key ?></label>
              </div>
      <?php 
            }
          }
        } 
      ?>
        <input type="hidden" name="rank" value="<?= $rank ?>">

      <div class="form-group">
        <button type="submit" class="btn btn-primary">
          <i class="fas fa-edit"></i>
          <span> Modifier</span>
        </button>
      </div>
    </div>
  </div>
</form>