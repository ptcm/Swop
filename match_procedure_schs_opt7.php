
<?php
include 'class_lib.php';

      echo 'Please relax while the engine sorts it for you!'.'<br>';
      echo 'Preparing matched preferred schools 7th option'.'<br>';
            
      //$schools_opt7 reserves all schools in table match_pref_schools7 matched with current schools
      $schools_opt7 = new prep_match_data($matched_schools7,$dup_keys);
      $dup_keys = 'mcs_client_ec_no';
      echo 'The number of unique matches found is '.$schools_opt7->get_match($matched_schools7,$dup_keys).'.'.'<br>';
      
      echo 'Reserving matched preferred schools 7th option'.'<br>';
      
      $schools_opt7->update_table('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo '<h4>Reserving current schools matched with preferred schools 7th option'.'<br>';
      
      $schools_opt7->update_table('match_current_schools', 'mcs_status', 'mcs_client_ec_no');
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Reserving clients matched with preferred schools 7th option'.'<br>';
      
      $schools_opt7->update_clients();
      echo "Updating records completed sucessfully!".'<br>';
      
      echo 'Deactivating other options in other tables for matches found'.'<br>';
      
      $schools_opt7->deactivate_other_options();
      echo "Deactivation completed sucessfully!".'<br>';
      
      ?>