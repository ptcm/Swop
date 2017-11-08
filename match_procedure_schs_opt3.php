
<?php
include 'class_lib.php';

      echo 'Please relax while the engine sorts it for you!'.'<br>';
      echo 'Preparing matched preferred schools 3rd option'.'<br>';
            
      //$schools_opt3 reserves all schools in table match_pref_schools3 matched with current schools
      $schools_opt3 = new prep_match_data($matched_schools3,$dup_keys);
      $dup_keys = 'mcs_client_ec_no';
      echo 'The number of unique matches found is '.$schools_opt3->get_match($matched_schools3,$dup_keys).'.'.'<br>';
      
      echo 'Reserving matched preferred schools 3rd option'.'<br>';
      
      $schools_opt3->update_table('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo '<h4>Reserving current schools matched with preferred schools 3rd option'.'<br>';
      
      $schools_opt3->update_table('match_current_schools', 'mcs_status', 'mcs_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Reserving clients matched with preferred schools 3rd option'.'<br>';
      
      $schools_opt3->update_clients();
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Deactivating other options in other tables for matches found'.'<br>';
      
      $schools_opt3->deactivate_other_options();
      echo "Deactivation completed sucessfully!".'<br>';
      
      ?>