<?php
include 'connection.php';
include 'functions.php';
 
 

class match_routine{
  
  var $db_table;
  var $t_status;
  var $ec_no;
  var $t_ec_no;
  var $dup_keys;
  
  
 //the below function will be used to set the reserved ('R') flag on all matches awaiting finalization by payment.
    public function update_preference($ec_no){
		include ('connection.php');
       
         $sql = 'UPDATE '.$db_table.'
                    SET '.$t_status.' = "R"
                    WHERE '.$t_ec_no.' = ?';

							try {
								$results = $db->prepare($sql);
								$results->bindValue(1, $ec_no, PDO::PARAM_STR);
								$results->execute();
							} catch (Exception $e) {
								echo "Error!: " . $e->getMessage() . "<br />";
								return false;
							}
							return true;

  }
 
 public function matchit(array $raw_match, $dup_keys){
   
   $matched = [];
  foreach ($raw_match as $key => $value) {
      if (isset($matched[$value[$dup_keys]]))
          continue;
      $matched[$value[$dup_keys]] = $value;
  }
  
  $sql_update = [];
  
  //school ID's have to be unset to avoid confusion between school ID's as EC numbers
  foreach($matched as $key => $value){
    unset($value['mcs_school_id']);
    unset($value['mps_school_id']);
    unset($value['mps2_school_id']);
    unset($value['mps3_school_id']);
    unset($value['mps4_school_id']);
    unset($value['mps5_school_id']);
    unset($value['mps6_school_id']);
    unset($value['mps7_school_id']);
    unset($value['mps8_school_id']);
    unset($value['mps9_school_id']);
    unset($value['mps10_school_id']);
    $sql_update[] = $value;
   }
   
       //the below variables will be used to prepare data used to change the status of the matched schools to 'RESERVED' in both the preferred schools database and the current schools database.
     // foreach($sql_update as $key => $value){
       // $sql_updates_mps[] = $value[$ec_no];
       // $sql_updates_mcs[] = $value[$dup_keys];
    //}
    
      //the below foreach loop will be used to change the status of the matched schools to 'RESERVED' in both the preferred schools database and the current schools database.
      //foreach($sql_updates_mps as $key => $value){
       // $ec_no = $value;
        //$sql_updates_mcs[] = $value['mcs_client_ec_no'];
    //}
 }
}

$match_pro = new match_routine;

$dup_keys = 'mcs_client_ec_no';
$match_pro->matchit($matched_schools1,$dup_keys);
 



?>
