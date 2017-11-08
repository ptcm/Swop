<?php
include 'connection.php';
include 'functions.php';
 

class prep_match_data{
 //this class handles the matching process together with updating matched records 
  
  var $db_table;  //database table to be updated
  var $t_status;  //table 'status' column
  var $ec_no;
  var $t_ec_no;
  var $dup_keys;
  var $matched = [];
  var $t_name;
  var $t_status_col;
  var $t_ec_col;
  var $col_values = [];
  var $arr_key = [];
  
 /* 
//the below function ensures that every current school is only matched to a single match  
 public function get_match(array $raw_match, $dup_keys){
   
    foreach ($raw_match as $key => $value) {
      if (isset($matched[$value[$dup_keys]]))
          continue;
      $matched[$value[$dup_keys]] = $value;
      
      $this->matched[] = $value;
      
  }
  foreach ($this->matched as $key => $value) {
    if (!is_int($key)) {
        unset($this->matched[$key]);
    }
  }
  
  return count($this->matched);
 }
 */
 
 //the below function ensures that every current school is only matched to a single match  
 public function get_match(array $raw_match, $dup_keys){
   
    foreach ($raw_match as $key => $value) {
      if (isset($value[$dup_keys]))
          continue;
      
      $this->matched[] = $value;
  }
  
  foreach ($this->matched as $key => $value) {
    if (!is_int($key)) {
        unset($this->matched[$key]);
    }
  }
  
  return count($this->matched);
 }
 
 //the below function will be used to set the reserved ('R') flag on all matches awaiting finalization by payment.
    public function update_table($table_name, $table_status_col, $table_ec_col){
		include ('connection.php');
     
    foreach($this->matched as $key=>$value){
        foreach($value as $col_key=>$ec_no){
          if($col_key == 'mcs_client_ec_no'){
            continue;
          }
          
          $sql = 'UPDATE '.$table_name.'
                    SET '.$table_status_col.' = "R"
                    WHERE '.$table_ec_col.' = ?';

          try {
            $results = $db->prepare($sql);
            $results->bindValue(1, $ec_no, PDO::PARAM_STR);
            $results->execute();
          } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return false;
          }
        }
      }
    return true;
    
    
  }
  
  //the below function will be used to set the reserved ('R') flag on clients awaiting finalization by payment.
    public function update_clients(){
		include ('connection.php');
    
    foreach($this->matched as $key=>$value){
        foreach($value as $col_key=>$ec_no){
          
          $sql = 'UPDATE clients
                    SET client_status = "R"
                    WHERE client_ec_no = ?';

          try {
            $results = $db->prepare($sql);
            $results->bindValue(1, $ec_no, PDO::PARAM_STR);
            $results->execute();
          } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return false;
          }
        }
      }
            return true;
  }
  /*
  //the below function deactivates a matched preferred schools option from other schools options tables
    public function deactivate_other_options(){
      include ('connection.php');
            
      $matched_sliced = [];
      foreach($this->matched as $key=>$value){
         unset($value['mcs_client_ec_no']);
         unset($value['client_ec_no']);
       
        $this->arr_key = array_keys($value);
        $matched_sliced[] = $value;
      }
      
      
      foreach($matched_sliced as $key=>$value){
          if(array_key_exists($this->arr_key[0], $value)){
          $this->col_values = array_column($this->matched, $this->arr_key[0]);
        }
      }
      $this->update_tables();
    } 
      
      //the below function is used to deactivate all other schools options once a match has been found
       public function update_tables(){
         include ('connection.php');
         
         $name = isset($this->arr_key[0]);
         
           switch($name){
             case 'mps_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps2_client_ec_no':
             $table = array(array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps3_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps4_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps5_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps6_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps7_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps8_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps9_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'),
                            array('match_pref_schools10', 'mps10_status', 'mps10_client_ec_no'));
             break;
             case 'mps10_client_ec_no':
             $table = array(array('match_pref_schools2', 'mps2_status', 'mps2_client_ec_no'),
                            array('match_pref_schools3', 'mps3_status', 'mps3_client_ec_no'),
                            array('match_pref_schools4', 'mps4_status', 'mps4_client_ec_no'),
                            array('match_pref_schools5', 'mps5_status', 'mps5_client_ec_no'),
                            array('match_pref_schools6', 'mps6_status', 'mps6_client_ec_no'),
                            array('match_pref_schools7', 'mps7_status', 'mps7_client_ec_no'),
                            array('match_pref_schools8', 'mps8_status', 'mps8_client_ec_no'),
                            array('match_pref_schools9', 'mps9_status', 'mps9_client_ec_no'),
                            array('match_pref_schools', 'mps_status', 'mps_client_ec_no'));
             break;
           }
         
         foreach($this->col_values as $key=>$value){
           foreach($table as $key=>$value_key){
           $sql = 'UPDATE '.$value_key[0].'
                      SET '.$value_key[1].' = "D"
                      WHERE '.$value_key[2].' = ?';

            try {
              $results = $db->prepare($sql);
              $results->bindValue(1, $value, PDO::PARAM_STR);
              $results->execute();
            } catch (Exception $e) {
              echo "Error!: " . $e->getMessage() . "<br />";
              return false;
            }
          }
        }
      }
      */
}

?>