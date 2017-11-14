<?php
include 'connection.php';
include 'functions.php';
 

class prep_match_data{
 //this class handles the matching process together with updating matched records 
  
  var $db_table;  //database table to be updated
  var $t_status;  //table 'status' column
  var $dup_keys;  //exclusively holds the ec# column when name for the current preferred option category checking that one 'current category' is matched to one 'preferred category'
  var $matched = [];  //holds an array of matched categories cleared of all duplicates
  var $arr_key = [];  //holds an array of combinations between matched current categories and the option number used to determine which tables to update
  
 
//the below function ensures that every current category is only matched to a single match  
//the variable $raw_match is the unrefined array of matched combinations from an SQL query in functions.php
 public function get_match(array $raw_match, $dup_keys){
   
    foreach ($raw_match as $key => $value) {
      if (isset($matched[$value[$dup_keys]]))
          continue;
      $matched[$value[$dup_keys]] = $value;
      
      $this->matched[] = $value;
      
  }
  foreach ($this->matched as $key => $value) {
    //the associative array formed from the above will have both numeric and string keys
    //the below code removes all string keys    
    if (!is_int($key)) {
        unset($this->matched[$key]);
    }
  }
  return count($this->matched);
 }
 
      //the below function is used to deactivate all other categories options once a match has been found
       public function update_tables(){
         include ('connection.php');
         
         $matched_sliced = []; //this will hold an array of matched categories excluding the client ec#
      foreach($this->matched as $key=>$value){
         unset($value['client_ec_no']);
        //the below creates an array with keys used to determine the tables to update
        $this->arr_key = array_keys($value);
        $matched_sliced[] = $value;
      }
      
      echo '<pre>';
      //print_r($this->arr_key);
      echo '</pre>';
      //the below loops through the matched options
      foreach($matched_sliced as $key=>$value){
        foreach($value as $key_inner=>$ec_value){
        
       //the $name variable holds the table client ec # column used to determine the table to update 
          $name = $this->arr_key[0];
         
       //the below switch statement determines the array of preferred categories options tables containing matched value options to be deactivated 
       switch($name){
             case 'mps_client_ec_no':
             //$d_tables holds tables to be marked with "D" meaning 'Deactivated'
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             //$r_tables holds tables to be marked with "R" meaning 'Reserved'
             $r_tables = array(array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps2_client_ec_no':
             $d_tables = array(array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps3_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps4_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps5_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps6_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps7_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps8_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps9_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
                            
               $r_tables = array(array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mps10_client_ec_no':
             $d_tables = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'));
                            
             $r_tables = array(array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpl_client_ec_no':
             $d_tables = array(array('match_pref_locations2', 'mpl2_status', 'mpl2_client_ec_no'),
                            array('match_pref_locations3', 'mpl3_status', 'mpl3_client_ec_no'));
                            
             $r_tables = array(array('match_pref_locations', 'mpl_status', 'mpl_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpl2_client_ec_no':
             $d_tables = array(array('match_pref_locations', 'mpl_status', 'mpl_client_ec_no'),
                            array('match_pref_locations3', 'mpl3_status', 'mpl3_client_ec_no'));
                            
             $r_tables = array(array('match_pref_locations2', 'mpl2_status', 'mpl2_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpl3_client_ec_no':
             $d_tables = array(array('match_pref_locations', 'mpl_status', 'mpl_client_ec_no'),
                            array('match_pref_locations2', 'mpl2_status', 'mpl2_client_ec_no'));
                            
             $r_tables = array(array('match_pref_locations3', 'mpl3_status', 'mpl3_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpd_client_ec_no':
             $d_tables = array(array('match_pref_districts2', 'mpd2_status', 'mpd2_client_ec_no'));
                            
             $r_tables = array(array('match_pref_districts', 'mpd_status', 'mpd_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpd2_client_ec_no':
             $d_tables = array(array('match_pref_districts', 'mpd_status', 'mpd_client_ec_no'));
                            
             $r_tables = array(array('match_pref_districts2', 'mpd2_status', 'mpd2_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpt_client_ec_no':
             $r_tables = array(array('match_pref_towns', 'mpt_status', 'mpt_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
             case 'mpp_client_ec_no':
             $r_tables = array(array('match_pref_provinces', 'mpp_status', 'mpp_client_ec_no'),
                            array('match_current_schools', 'mcs_status', 'mcs_client_ec_no'),
                            );
             break;
        }
          //the below loops and updates table options with values to be deactivated for each match value
          foreach($d_tables as $key=>$d_value_key){
            $sql = 'UPDATE '.$d_value_key[0].'
                          SET '.$d_value_key[1].' = "D"
                          WHERE '.$d_value_key[2].' = ?';

              try {
                $results = $db->prepare($sql);
                $results->bindValue(1, $ec_value, PDO::PARAM_STR);
                $results->execute();
              } catch (Exception $e) {
                echo "Error!: " . $e->getMessage() . "<br />";
                return false;
              }
            }
        //the below loops and updates table options with values to be reserved for each match value
         foreach($r_tables as $key=>$r_value_key){
           foreach($r_value_key as $col_key=>$col_value){
             if($col_value = $this->arr_key[0]){
                $sql = 'UPDATE '.$r_value_key[0].'
                              SET '.$r_value_key[1].' = "R"
                              WHERE '.$r_value_key[2].' = ?';
          }elseif($col_value = $this->arr_key[1]){
            $sql = 'UPDATE '.$r_value_key[0].'
                              SET '.$r_value_key[1].' = "R"
                              WHERE '.$r_value_key[2].' = ?';
            
          } 
            try {
              $results = $db->prepare($sql);
              $results->bindValue(1, $ec_value, PDO::PARAM_STR);
              $results->execute();
            } catch (Exception $e) {
              echo "Error!: " . $e->getMessage() . "<br />";
              return false;
            }
          }
        }
        
        //the below updates the clients table for each matched value options and reserves the option
          $sql = 'UPDATE clients
                    SET client_status = "R"
                    WHERE client_ec_no = ?';

          try {
            $results = $db->prepare($sql);
            $results->bindValue(1, $ec_value, PDO::PARAM_STR);
            $results->execute();
          } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return false;
          }
        }
      }
      
      
      
      echo '<pre>';
      //print_r($matched_sliced);
      echo '</pre>';
      
      echo '<pre>';
      //var_dump($name);
      echo '</pre>';
      
      echo '<pre>';
      //print_r($d_tables);
      echo '</pre>';
      
      echo '<pre>';
      //print_r($r_tables);
      echo '</pre>';
     }
    }

?>