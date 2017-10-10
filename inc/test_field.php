<?php

include 'functions.php';
        
      
      $matched = [];
      
     foreach($matched_curr_schools as $curr_key=>$curr_value){
       if(in_array($matched_schools1[1]['mps_school_id'], $curr_value)){
         $matched[] = $matched_schools1[1]['mps_client_ec_no'];
         unset($matched_curr_schools[$curr_key]);
       }
      }   
        
  
   echo '<pre>';
  print_r($matched);
  echo '</pre>';
  
?>