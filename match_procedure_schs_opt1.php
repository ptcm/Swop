
<?php
include 'class_lib.php';

      echo 'Please relax while the engine sorts it for you!'.'<br>';
      echo 'Preparing matched preferred schools 1st option'.'<br>';
            
      //$schools_opt1 reserves all schools in table match_pref_schools matched with current schools
      $schools_opt1 = new prep_match_data($matched_schools1,$dup_keys);
      $dup_keys = 'mcs_client_ec_no';
      echo 'The number of unique matches found is '.$schools_opt1->get_match($matched_schools1,$dup_keys).'.'.'<br>';
      
      
      
  /*        
  echo "<pre>";
print_r($schools_opt1->matched).'<br>';
echo "</pre>";
      exit; */
      echo 'Reserving matched preferred schools 1st option'.'<br>';
      
      $schools_opt1->update_table('match_pref_schools', 'mps_status', 'mps_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo '<h4>Reserving current schools matched with preferred schools 1st option'.'<br>';
      
      $schools_opt1->update_table('match_current_schools', 'mcs_status', 'mcs_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Reserving clients matched with preferred schools 1st option'.'<br>';
      
      $schools_opt1->update_clients();
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Deactivating other options in other tables for matches found'.'<br>';
      
      //$schools_opt1->deactivate_other_options();
      //echo "Deactivation completed sucessfully!".'<br>';
  
      ?>