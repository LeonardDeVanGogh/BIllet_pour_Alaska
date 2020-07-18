
<?php echo '
  <div class="row">
    <div class="col-lg-3">' . $rank . '</div>
  </div>'  
?>

<form name="userAdministration" method="post" action="index.php?page=userRankAdministration">
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
                $permission->$method($value);
                echo '<div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="' . $key . '" value="' . $permission->$method($value) . '"'; 
                        if ($permission->$method($value)==1){echo ' checked';}
                        echo '>
                        <label class="form-check-label" for="inlineCheckbox1">' . $key . '</label>
                      </div>';
            }
        }

        }
        echo '<input type="hidden" name="rank" value="' . $rank . '">';
      ?>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    </div>
  </div>
</form>