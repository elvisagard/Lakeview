    <?php
function ppx_no_content_card($custom_title = null, $custom_text = null){ ?>
     
      <div class="uk-card uk-card-secondary uk-card-body">
        <?php
            if($custom_title){
                echo '<h2 class="uk-card-title">'.$custom_title.'</h2>';
            }
            else{
                echo '<h2 class="uk-card-title">Sorry!</h2>';
            } 
            if($custom_text){
                echo '<p>'.$custom_text.'</p>';
            }
            elseif($custom_title){}
            else{
                echo '<p>There is no content to show at this time.</p>';
            } 
          ?>
        </div>
<?php 
        
    }