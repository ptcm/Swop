<?php
	include_once 'connection.php';
	
	try{$results_towns = $db->query("SELECT town_id, town_name, town_province_id FROM towns");
					
	}catch (Exception $e){
			echo 'Failed to retrieve towns';
			exit;
					
	}
	$towns = $results_towns->fetchAll(PDO::FETCH_ASSOC);
	
	
	try{$results_provinces = $db->query("SELECT province_name, province_id FROM provinces");
					
	}catch (Exception $e){
			echo 'Failed to retrieve provinces';
			exit;
					
	}
	$provinces = $results_provinces->fetchAll(PDO::FETCH_ASSOC);
	
	
	try{$results_districts = $db->query("SELECT distr_id, distr_name FROM districts ORDER BY distr_name");
					
	}catch (Exception $e){
			echo 'Failed to retrieve districts';
			exit;
					
	}
	$districts = $results_districts->fetchAll(PDO::FETCH_ASSOC);
	
	
	try{$results_locations = $db->query("SELECT loc_id, loc_name FROM locations ORDER BY loc_name");
					
	}catch (Exception $e){
			echo 'Failed to retrieve locations';
			exit;
					
	}
	$locations = $results_locations->fetchAll(PDO::FETCH_ASSOC);
	
	
	try{$results_schools = $db->query("SELECT school_id, school_name, school_level FROM schools ORDER BY school_name");
					
	}catch (Exception $e){
			echo 'Failed to retrieve schools';
			exit;
					
	}
	$schools = $results_schools->fetchAll(PDO::FETCH_ASSOC);
  /*
  try{$results_mps = $db->query('SELECT mps_id, 
                                  mps_school_id, 
                                  mps_client_ec_no
                                FROM match_pref_schools
                                ORDER BY mps_id');
					
	}catch (Exception $e){
			echo 'Failed to retrieve mps';
			exit;
					
	}
	$mps = $results_mps->fetchAll(PDO::FETCH_ASSOC); */
  
   try{$results_mcs = $db->query("SELECT mcs_school_id, mcs_province_id, mcs_distr_id, mcs_client_ec_no, mcs_sub1_id, mcs_sub2_id FROM match_current_schools ORDER BY mcs_client_ec_no");
					
	}catch (Exception $e){
			echo 'Failed to retrieve mcs';
			exit;
					
	}
	$mcs = $results_mcs->fetchAll(PDO::FETCH_ASSOC);
  
/*  try{$results_mpl = $db->query("SELECT mpl_loc_id, mpl_client_ec_no FROM match_pref_locations");
					
	}catch (Exception $e){
			echo 'Failed to retrieve mpl';
			exit;
					
	}
	$mpl = $results_mpl->fetchAll(PDO::FETCH_ASSOC);
  
  try{$results_mpt = $db->query("SELECT mpt_town_id, mpt_client_ec_no FROM match_pref_towns ORDER BY mpt_client_ec_no");
					
	}catch (Exception $e){
			echo 'Failed to retrieve mpl';
			exit;
					
	}
	$mpt = $results_mpt->fetchAll(PDO::FETCH_ASSOC);
 
  try{$results_mpd = $db->query("SELECT mpd_distr_id, mpd_client_ec_no FROM match_pref_districts");
					
	}catch (Exception $e){
			echo 'Failed to retrieve mpt';
			exit;
					
	}
	$mpd = $results_mpd->fetchAll(PDO::FETCH_ASSOC);
  
*/  
  try{$results_mpp = $db->query("SELECT mpp_province_id, mpp_client_ec_no FROM match_pref_provinces ORDER BY mpp_client_ec_no");
					
      }catch (Exception $e){
          echo 'Failed to retrieve mpp';
          exit;
              
      }
      $mpp = $results_mpp->fetchAll(PDO::FETCH_ASSOC);
  
  try{$results_subjects = $db->query("SELECT sub_id, sub_name FROM subjects ORDER BY sub_name");
					
	}catch (Exception $e){
			echo 'Failed to retrieve subjects';
			exit;
					
	}
	$subjects = $results_subjects->fetchAll(PDO::FETCH_ASSOC);
  
  //this function prepares a drop-down of all provinces and checks whether an option has been selected during a session for data persistence
	function all_provinces(array $provinces){
        	
		foreach ($provinces as $key=>$value){
			echo '<option value='.'"'.$value['province_name'].'"';
                
				global $mpp_province_id;
        if(isset($_POST['preferred_province'])){
					if($_POST['preferred_province'] == $value['province_name']){
						echo 'selected';
					}
          }elseif($mpp_province_id == $value['province_id']){
            echo 'selected';
          }
				
			echo '>'.$value['province_name'].'</option>';
		}
		
	echo '</select>';
		
	}
  
  //this function prepares a drop-down of all current provinces and checks whether an option has been selected during a session for data persistence
	function all_provinces_curr(array $provinces){
        	
		foreach ($provinces as $key=>$value){
			echo '<option value="'.$value['province_name'].'"';
                
				global $mcs_client_details;
        if(isset($_POST['current_province'])){
					if($_POST['current_province'] == $value['province_name']){
						echo 'selected';
					}
          }elseif(!empty($_GET['id']) && ($mcs_client_details[0] == $value['province_name'])){
            echo 'selected';
          }
				
			echo '>'.$value['province_name'].'</option>';
		}
		
	echo '</select>';
		
	}

	
	
	//this function prepares a drop-down of all towns and checks whether an option has been selected during a session for data persistence
	function all_towns(array $towns){
	
		foreach ($towns as $key=>$value){
			echo '<option value='.'"'.$value['town_name'].'"';
      
      global $mpt_town_id;      
				if(isset($_POST['preferred_town'])){
					if($_POST['preferred_town'] == $value['town_name']){
						echo 'selected';
					}
                  
				}elseif($mpt_town_id == $value['town_id']){
            echo 'selected';
          }
			echo '>'.$value['town_name'].'</option>';
		}
		
	echo '</select>';
		
	}
	
	//this function prepares a drop-down of all districts and checks whether an option has been selected during a session for data persistence
	function all_districts(array $districts){
	
		foreach ($districts as $key=>$value){
			
			echo '<option value='.'"'.$value['distr_name'].'"';
      global $mpd;
				if(isset($_POST['preferred_district1'])){
					if($_POST['preferred_district1'] == $value['distr_name']){
						echo 'selected';
						}
					}elseif(isset($mpd[0]['mpd_distr_id']) && ($mpd[0]['mpd_distr_id'] == $value['distr_id'])){
            echo 'selected';
          }
					
			echo '>'.$value['distr_name'].'</option>';
		}
		
	echo '</select>';
	
	}
  
  //this function prepares a drop-down of all districts and checks whether an option has been selected during a session for data persistence
	function all_districts1(array $districts){
	
		foreach ($districts as $key=>$value){
			
			echo '<option value='.'"'.$value['distr_name'].'"';
      global $mpd;
				if(isset($_POST['preferred_district1'])){
					if($_POST['preferred_district1'] == $value['distr_name']){
						echo 'selected';
						}
					}elseif(isset($mpd[1]['mpd_distr_id']) && ($mpd[1]['mpd_distr_id'] == $value['distr_id'])){
            echo 'selected';
          }
					
			echo '>'.$value['distr_name'].'</option>';
		}
		
	echo '</select>';
	
	}
  
  //this function prepares a drop-down of all districts and checks whether an option has been selected during a session for data persistence
	function all_districts_curr(array $districts){
	
		foreach ($districts as $key=>$value){
			
			echo '<option value='.'"'.$value['distr_name'].'"';
      
				global $mcs_client_details;
        if(isset($_POST['current_district'])){
					if($_POST['current_district'] == $value['distr_name']){
						echo 'selected';
						}
					}elseif(!empty($_GET['id']) && ($mcs_client_details[1] == $value['distr_name'])){
            echo 'selected';
          }
					
			echo '>'.$value['distr_name'].'</option>';
		}
		
	echo '</select>';
	
	}
	
	//this function prepares a drop-down of all locations and checks whether an option has been selected during a session for data persistence
	function all_locations(array $locations){
	
		foreach ($locations as $key=>$value){
			echo '<option value='.'"'.$value['loc_name'].'"';
      global $mpl;
				if(isset($_POST['preferred_location1'])){
					if($_POST['preferred_location1'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif(isset($mpl[0]['mpl_loc_id']) && ($mpl[0]['mpl_loc_id'] == $value['loc_id'])){
            echo 'selected';
          }
								
			echo '>'.$value['loc_name'].'</option>';
		}
		
	echo '</select>';
		
	}
  
  //this function prepares a drop-down of all locations and checks whether an option has been selected during a session for data persistence
	function all_locations1(array $locations){
	
		foreach ($locations as $key=>$value){
			echo '<option value='.'"'.$value['loc_name'].'"';
        global $mpl;
				if(isset($_POST['preferred_location2'])){
					if($_POST['preferred_location2'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif(isset($mpl[1]['mpl_loc_id']) && ($mpl[1]['mpl_loc_id'] == $value['loc_id'])){
            echo 'selected';
          }
								
			echo '>'.$value['loc_name'].'</option>';
		}
		
	echo '</select>';
		
	}
  
  //this function prepares a drop-down of all locations and checks whether an option has been selected during a session for data persistence
	function all_locations2(array $locations){
	
		foreach ($locations as $key=>$value){
			echo '<option value='.'"'.$value['loc_name'].'"';
      global $mpl;
				if(isset($_POST['preferred_location3'])){
					if($_POST['preferred_location3'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif(isset($mpl[2]['mpl_loc_id']) && ($mpl[2]['mpl_loc_id'] == $value['loc_id'])){
            echo 'selected';
          }
								
			echo '>'.$value['loc_name'].'</option>';
		}
		
	echo '</select>';
		
	}
	
	
  //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools_curr(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        					
				global $mcs_client_details;
        if(isset($_POST['current_school'])){
					if($_POST['current_school'] == $value['school_name']){
						echo 'selected';
					} 
				}elseif(!empty($_GET['id']) && ($mcs_client_details[2] == $value['school_name'])){
            echo 'selected';
          }
			
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}

  //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools1'])){
					if($_POST['preferred_schools1'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[0]['mps_school_id']) && ($mps[0]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
					
				if(isset($_POST['current_school'])){
					if($_POST['current_school'] == $value['school_name']){
						echo 'selected';
					} 
				}
			
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
  //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools1(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools2'])){
					if($_POST['preferred_schools2'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[1]['mps_school_id']) && ($mps[1]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
   //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools2(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools3'])){
					if($_POST['preferred_schools3'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[2]['mps_school_id']) && ($mps[2]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
   //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools3(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools4'])){
					if($_POST['preferred_schools4'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[3]['mps_school_id']) && ($mps[3]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
    //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools4(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools5'])){
					if($_POST['preferred_schools5'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[4]['mps_school_id']) && ($mps[4]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
     //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools5(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools6'])){
					if($_POST['preferred_schools6'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[5]['mps_school_id']) && ($mps[5]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
      //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools6(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools7'])){
					if($_POST['preferred_schools7'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[6]['mps_school_id']) && ($mps[6]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
	
       //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools7(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools8'])){
					if($_POST['preferred_schools8'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[7]['mps_school_id']) && ($mps[7]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
        //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools8(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools9'])){
					if($_POST['preferred_schools9'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[8]['mps_school_id']) && ($mps[8]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
  
          //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools9(array $schools){
	
		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';
        
       global $mps;
				if(isset($_POST['preferred_schools10'])){
					if($_POST['preferred_schools10'] == $value['school_name']){
						echo 'selected';
					}
				}elseif(isset($mps[9]['mps_school_id']) && ($mps[9]['mps_school_id'] == $value['school_id'])){
            echo 'selected';
          }
	
			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}
		
	echo '</select>';
	
	}
	
	function all_subjects(array $subjects){
	
	echo "<table>";
		foreach ($subjects as $key=>$value){
			echo '<tr><td>'.'<input type=checkbox" id="subject" name="subject" value='.'"'.$value[sub_name].'"'.'><label for="subject" name="subject" class="light">'.$value['sub_name'].'</label></td></tr>';
		}
		
	echo "<table>";
		
	}
		
if ($_SERVER["REQUEST_METHOD"] == "POST"){
		//header(Location:'payreg.php');
		//on confirmation of registration payment
    
function create_client($ecNumber, 
						$userFirstName, 
						$userLastName, 
						$gender, 
						$mobileNumber, 
						$userEmail, 
						$userPassword, 
						$levelTaught, 
						$dateCreated, 
						$status = "OPEN", 
						$dateMatched = NULL,
            $client_id = NULL){
		include ('connection.php');
			
		if($client_id){
      $sql_client = 'UPDATE clients 
                     SET client_first_name = ?, 
                        client_last_name = ?, 
                        client_sex = ?, 
                        client_mobile_no = ?, 
                        client_email = ?, 
                        client_password = ?, 
                        client_level_taught = ?
                    WHERE client_id = ?';
    }else{
		$sql_client = 'INSERT INTO clients (client_ec_no, 
											client_first_name, 
											client_last_name, 
											client_sex, 
											client_mobile_no, 
											client_email, 
											client_password, 
											client_level_taught, 
											client_date_created, 
											client_status, 
											client_date_matched)
									VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
									
    try {
					$results_client = $db->prepare($sql_client);
					$results_client->bindValue(1, $ecNumber, PDO::PARAM_STR);
					$results_client->bindValue(2, $userFirstName, PDO::PARAM_STR);
					$results_client->bindValue(3, $userLastName, PDO::PARAM_STR);
					$results_client->bindValue(4, $gender, PDO::PARAM_STR);
					$results_client->bindValue(5, $mobileNumber);
					$results_client->bindValue(6, $userEmail, PDO::PARAM_STR);
					$results_client->bindValue(7, $userPassword);
					$results_client->bindValue(8, $levelTaught, PDO::PARAM_STR);
					$results_client->bindValue(9, $dateCreated);
					$results_client->bindValue(10, $status, PDO::PARAM_STR);
					$results_client->bindValue(11, $dateMatched);
          if($client_id){
            $results_client->bindValue(12, $client_id, PDO::PARAM_INT);
          }
					$results_client->execute();
				} catch (Exception $e) {
					echo "Error!: " . $e->getMessage() . "<br />";
					return false;
				}
				return true;
    }
  }
  
	
	/*function client_pref_prov($prefProv_id, $ecNumber){
		include ('connection.php');

       global $mpp_id;
       if($mpp_id){
         $sql_province = 'UPDATE match_pref_provinces
                    SET mpp_province_id = ?
                    WHERE mpp_client_ec_no = ?';
                    
       }else{
       $sql_province = 'INSERT INTO match_pref_provinces 
										(mpp_province_id, 
										mpp_client_ec_no)
								VALUES (?,?)';
      } 			
							try {
								$results_province = $db->prepare($sql_province);
								$results_province->bindValue(1, $prefProv_id, PDO::PARAM_INT);
								$results_province->bindValue(2, $ecNumber, PDO::PARAM_STR);
								$results_province->execute();
							} catch (Exception $e) {
								echo "Error!: " . $e->getMessage() . "<br />";
								return false;
							}
							return true;
					
  }
  */

    function client_pref_prov($prefProv_id, $ecNumber){
		include ('connection.php');
       
       $sql_province = 'INSERT INTO match_pref_provinces 
										(mpp_province_id, 
										mpp_client_ec_no)
								VALUES (?,?)
                ON DUPLICATE KEY UPDATE mpp_province_id = "$prefProv_id"';
       			
							try {
								$results_province = $db->prepare($sql_province);
								$results_province->bindValue(1, $prefProv_id, PDO::PARAM_INT);
								$results_province->bindValue(2, $ecNumber, PDO::PARAM_STR);
								$results_province->execute();
							} catch (Exception $e) {
								echo "Error!: " . $e->getMessage() . "<br />";
								return false;
							}
							return true;
	}		
  
		function client_pref_town($prefTown_id, $ecNumber){
			include ('connection.php');
									
			if($mpt_id){
        $sql_town = 'UPDATE match_pref_towns
                    SET mpt_town_id = ?
                    WHERE mpt_client_ec_no = ?';
                    
       }else{
        $sql_town = 'INSERT INTO match_pref_towns 
									(mpt_town_id, 
									mpt_client_ec_no,)
							VALUES (?, ?)';
      }				
							try {
								$results_town = $db->prepare($sql_town);
								$results_town->bindValue(1, $prefTown_id, PDO::PARAM_INT);
								$results_town->bindValue(2, $ecNumber, PDO::PARAM_STR);
								$results_town->execute();
							} catch (Exception $e) {
								echo "Error!: " . $e->getMessage() . "<br />";
								return false;
							}
							return true;
			 
    }
   								
	function client_pref_distr1($prefDistr1_id, $ecNumber){
				
		include ('connection.php');
		if(isset($mpd[0]['mpd_distr_id'])){
      $sql_districts1 = 'UPDATE match_pref_districts
                    SET mpd_distr_id = ?
                    WHERE mpd_client_ec_no = ?';
       }else{
    $sql_districts1 = 'INSERT INTO match_pref_districts 
						(mpd_distr_id, 
						mpd_client_ec_no)
				VALUES (?, ?)';
				
				try {
					$results_districts1 = $db->prepare($sql_districts1);
					$results_districts1->bindValue(1, $prefDistr1_id, PDO::PARAM_INT);
					$results_districts1->bindValue(2, $ecNumber, PDO::PARAM_STR);
					$results_districts1->execute();
				} catch (Exception $e) {
					echo "Error!: " . $e->getMessage() . "<br />";
					return false;
				}
				return true;
    }
  }
  			
		function client_pref_distr2($prefDistr2_id, $ecNumber){
				
				include ('connection.php');
				
        if(isset($mpd[1]['mpd_distr_id'])){
          $sql_districts2 = 'UPDATE match_pref_districts
                    SET mpd_distr_id = ?
                    WHERE mpd_client_ec_no = ?';
       }else{
        $sql_districts2 = 'INSERT INTO match_pref_districts 
											(mpd_distr_id, 
											mpd_client_ec_no)
									VALUES (?, ?)';
									
									try {
										$results_districts2 = $db->prepare($sql_districts2);
										$results_districts2->bindValue(1, $prefDistr2_id, PDO::PARAM_INT);
										$results_districts2->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_districts2->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;
              }
    }
           			
		function client_pref_sch1($prefSchool1_id, $ecNumber){
					
					include ('connection.php');
          
          if(isset($mps[0]['mps_school_id'])){
            $sql_school1 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
					$sql_school1 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school1 = $db->prepare($sql_school1);
										$results_school1->bindValue(1, $prefSchool1_id, PDO::PARAM_INT);
										$results_school1->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school1->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;
			
            }
    }
		
		function client_pref_sch2($prefSchool2_id, $ecNumber){
							
						include ('connection.php');
            
            if($mps[1]['mps_school_id']){
              $sql_school2 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
						$sql_school2 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school2 = $db->prepare($sql_school2);
										$results_school2->bindValue(1, $prefSchool2_id, PDO::PARAM_INT);
										$results_school2->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school2->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
					
              }
    }
			
			function client_pref_sch3($prefSchool3_id, $ecNumber){
									
				include ('connection.php');
				
        if($mps[2]['mps_school_id']){
          $sql_school3 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
        $sql_school3 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school3 = $db->prepare($sql_school3);
										$results_school3->bindValue(1, $prefSchool3_id, PDO::PARAM_INT);
										$results_school3->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school3->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
					
			}
    }
			
			function client_pref_sch4($prefSchool4_id, $ecNumber){
						
				include ('connection.php');
        
        if($mps[3]['mps_school_id']){
          $sql_school4 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
				$sql_school4 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school4 = $db->prepare($sql_school4);
										$results_school4->bindValue(1, $prefSchool4_id, PDO::PARAM_INT);
										$results_school4->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school4->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
              }
      }
			
			function client_pref_sch5($prefSchool5_id, $ecNumber){
											
						include ('connection.php');
            
            if($mps[4]['mps_school_id']){
              $sql_school5 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
            }else{
						$sql_school5 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school5 = $db->prepare($sql_school5);
										$results_school5->bindValue(1, $prefSchool5_id, PDO::PARAM_INT);
										$results_school5->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school5->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
        }
      }
			
			function client_pref_sch6($prefSchool6_id, $ecNumber){
												
					include ('connection.php');
          
          if($mps[5]['mps_school_id']){
            $sql_school6 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
          }else{
					$sql_school6 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school6 = $db->prepare($sql_school6);
										$results_school6->bindValue(1, $prefSchool6_id, PDO::PARAM_INT);
										$results_school6->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school6->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
				}
      }
				
		function client_pref_sch7($prefSchool7_id, $ecNumber){
												
				include ('connection.php');
        
        if($mps[6]['mps_school_id']){
          $sql_school7 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
				$sql_school7 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school7 = $db->prepare($sql_school7);
										$results_school7->bindValue(1, $prefSchool7_id, PDO::PARAM_INT);
										$results_school7->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school7->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
        }
    }
		
			function client_pref_sch8($prefSchool8_id, $ecNumber){
													
					include ('connection.php');
          
          if($mps[7]['mps_school_id']){
            $sql_school8 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
					$sql_school8 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no)
									VALUES (?, ?)';	
									
									try {
										$results_school8 = $db->prepare($sql_school8);
										$results_school8->bindValue(1, $prefSchool8_id, PDO::PARAM_INT);
										$results_school8->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school8->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
          }
      }	
				
		function client_pref_sch9($prefSchool9_id, $ecNumber){
												
				include ('connection.php');
        
        if($mps[8]['mps_school_id']){
          $sql_school9 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
				$sql_school9 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no,)
									VALUES (?, ?)';	
									
									try {
										$results_school9 = $db->prepare($sql_school9);
										$results_school9->bindValue(1, $prefSchool9_id, PDO::PARAM_INT);
										$results_school9->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school9->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
        }
		}
		
		function client_pref_sch10($prefSchool10_id, $ecNumber){
													
					include ('connection.php');
          
          if($mps[9]['mps_school_id']){
            $sql_school10 = 'UPDATE match_pref_schools
                    SET mps_school_id = ?
                    WHERE mps_client_ec_no = ?';
       }else{
					$sql_school10 = 'INSERT INTO match_pref_schools 
											(mps_school_id, 
											mps_client_ec_no,)
									VALUES (?, ?)';	
									
									try {
										$results_school10 = $db->prepare($sql_school10);
										$results_school10->bindValue(1, $prefSchool10_id, PDO::PARAM_INT);
										$results_school10->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_school10->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
        }
		}
    
		function client_pref_loc1($prefLocation1_id, $ecNumber){
												
				include ('connection.php');
        
        if($mpl[0]['mpl_loc_id']){
          $sql_location1 = 'UPDATE match_pref_locations
                    SET mpl_loc_id = ?
                    WHERE mpl_client_ec_no = ?';
       }else{
				$sql_location1 = 'INSERT INTO match_pref_locations
											(mpl_loc_id, 
											mpl_client_ec_no)
										VALUES (?, ?)';

										try {
										$results_location1 = $db->prepare($sql_location1);
										$results_location1->bindValue(1, $prefLocation1_id, PDO::PARAM_INT);
										$results_location1->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_location1->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
        }
    }
		
		function client_pref_loc2($prefLocation2_id, $ecNumber){
											
				include ('connection.php');
        
        if($mpl[1]['mpl_loc_id']){
          $sql_location2 = 'UPDATE match_pref_locations
                    SET mpl_loc_id = ?
                    WHERE mpl_client_ec_no = ?';
       }else{
				$sql_location2 = 'INSERT INTO match_pref_locations
											(mpl_loc_id, 
											mpl_client_ec_no)
										VALUES (?, ?)';

										try {
										$results_location2 = $db->prepare($sql_location2);
										$results_location2->bindValue(1, $prefLocation2_id, PDO::PARAM_INT);
										$results_location2->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_location2->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;		
			
          }
    }
		
		function client_pref_loc3($prefLocation3_id, $ecNumber){
												
				include ('connection.php');
        
        if($mpl[2]['mpl_loc_id']){
          $sql_location3 = 'UPDATE match_pref_locations
                    SET mpl_loc_id = ?
                    WHERE mpl_client_ec_no = ?';
       }else{
				$sql_location3 = 'INSERT INTO match_pref_locations
											(mpl_loc_id, 
											mpl_client_ec_no)
										VALUES (?, ?)';

										try {
										$results_location3 = $db->prepare($sql_location3);
										$results_location3->bindValue(1, $prefLocation3_id, PDO::PARAM_INT);
										$results_location3->bindValue(2, $ecNumber, PDO::PARAM_STR);
										$results_location3->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;	
			
      }
    }

function client_curr_sch($ecNumber, $currSch_id, $currDistr_id, $currProv_id, $levelTaught, $sub1_id, $sub2_id){
					
					include ('connection.php');
          
          if($mcs_id){
            $sql_current_sch = 'UPDATE match_current_schools
                    SET mcs_client_ec_no = ?,
                      mcs_school_id = ?,
                      mcs_distr_id = ?,
											mcs_province_id = ?,
											mcs_client_level_taught = ?,
                      mcs_sub1_id = ?,
                      mcs_sub2_id = ?
                    WHERE mcs_client_ec_no = ?';
       }else{
					$sql_current_sch = 'INSERT INTO match_current_schools 
											(mcs_client_ec_no, 
											mcs_school_id, 
											mcs_distr_id,
											mcs_province_id,
											mcs_client_level_taught,
                      mcs_sub1_id,
                      mcs_sub2_id)
									VALUES (?, ?, ?, ?, ?, ?, ?)';	
									
									try {
										$results_current_sch = $db->prepare($sql_current_sch);
										$results_current_sch->bindValue(1, $ecNumber, PDO::PARAM_STR);
										$results_current_sch->bindValue(2, $currSch_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(3, $currDistr_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(4, $currProv_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(5, $levelTaught, PDO::PARAM_STR);
                    $results_current_sch->bindValue(6, $sub1_id, PDO::PARAM_INT);
                    $results_current_sch->bindValue(7, $sub2_id, PDO::PARAM_INT);
										$results_current_sch->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;
			
		}
  }
}

	function get_clients_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT * FROM clients');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
 
function get_client ($client_ec_no){
    include 'connection.php';
    
    $sql = 'SELECT client_id,
                    client_ec_no,
                    client_first_name, 
                    client_last_name, 
                    client_sex,
                    client_mobile_no,
                    client_email, 
                    client_password, 
                    client_level_taught,
                    mpp_id,
                    mpp_province_id,
                    mpt_id,
                    mpt_town_id
            FROM clients
            LEFT JOIN match_pref_provinces ON clients.client_ec_no = match_pref_provinces.mpp_client_ec_no
            LEFT JOIN match_pref_towns ON clients.client_ec_no = match_pref_towns.mpt_client_ec_no
            WHERE client_ec_no = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetch();
}

/* 
try{$results_mps = $db->query('SELECT mps_id, 
                                  mps_school_id,
                                  mps_client_ec_no
                                FROM match_pref_schools
                                ORDER BY mps_id');
					
	}catch (Exception $e){
			echo 'Failed to retrieve mps';
			exit;
					
	}
	$mps1 = $results_mps->fetchAll(PDO::FETCH_ASSOC);
*/
  
 function get_pref_schools($client_ec_no){
    include 'connection.php';
    
    global $mps;
    $sql = 'SELECT mps_id,
                    mps_school_id
            FROM match_pref_schools
            WHERE mps_client_ec_no = ?
            ORDER BY mps_id';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
    
}

function get_pref_locations($client_ec_no){
    include 'connection.php';
    
    global $mpl;
    $sql = 'SELECT mpl_id,
                    mpl_loc_id
            FROM match_pref_locations
            WHERE mpl_client_ec_no = ?
            ORDER BY mpl_id';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
    
}

function get_pref_districts($client_ec_no){
    include 'connection.php';
    
    global $mpd;
    $sql = 'SELECT mpd_id,
                    mpd_distr_id
            FROM match_pref_districts
            WHERE mpd_client_ec_no = ?
            ORDER BY mpd_id';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return $results->fetchAll(PDO::FETCH_ASSOC);
    
}

function delete_client ($client_ec_no){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM clients 
            WHERE client_ec_no = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function delete_current_school ($mcs_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_current_schools 
            WHERE mcs_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mcs_id, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}


 
function delete_pref_school ($mps_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_pref_schools 
            WHERE mps_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mps_id, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function delete_pref_province ($mpp_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_pref_provinces 
            WHERE mpp_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mpp_id, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function delete_pref_district ($mpd_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_pref_districts 
            WHERE mpd_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mpd_id, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function delete_pref_town ($mpt_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_pref_towns
            WHERE mpt_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mpt_client_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

function delete_pref_location ($mpl_id){
    include 'connection.php';
    
    $sql = 'DELETE 
            FROM match_pref_locations
            WHERE mpl_id = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $mpl_id, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    return true;
}

 function get_reg_distr($mpd_match_ec_no){
    include 'connection.php';
    
    $sql = 'SELECT mpd_id,mpd_distr_id FROM match_pref_districts 
            WHERE mpd_client_ec_no = ?';
       
    try {
        $results_mpd = $db->prepare($sql);
        $results_mpd->bindValue(1, $mpd_match_ec_no, PDO::PARAM_STR);
        $results_mpd->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    $results_mpd->fetchAll(PDO::FETCH_ASSOC);
    //$get_reg_distr = $results->fetchAll();
}

/*function get_reg_loc($match_ec_no){
    include 'connection.php';
    
    $sql = 'SELECT mpl_distr_id, mpl_sub1_id, mpl_sub2_id FROM match_pref_locations 
            WHERE mpl_client_ec_no = ?';
       
    try {
        $results = $db->prepare($sql);
        $results->bindValue(1, $match_ec_no, PDO::PARAM_STR);
        $results->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    $results->fetch();
 } */
// $match_ec_no = 'TIN0125';
 function get_reg_schs($mps_match_ec_no){
    include 'connection.php';
    
    $sql = 'SELECT mps.mps_client_ec_no, schs.school_name
             FROM match_pref_schools AS mps
             INNER JOIN schools AS schs ON mps.mps_school_id = schs.school_id
             WHERE mps.mps_client_ec_no = ?';
       
    try {
        $results_schs = $db->prepare($sql);
        $results_schs->bindValue(1, $mps_match_ec_no, PDO::PARAM_STR);
        $results_schs->execute();
    } catch (Exception $e) {
        echo "Error!: " . $e->getMessage() . "<br />";
        return false;
    }
    for($i=0; $row = $results_schs->fetch(); $i++){
         echo $i." - ".$row['schs.school_name']."<br/>";
       }
 }
                                 
	
	function get_current_schools_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT match_current_schools.mcs_id, 
										match_current_schools.mcs_client_ec_no, 
										schools.school_name, 
										districts.distr_name, 
										provinces.province_name,
										match_current_schools.mcs_client_level_taught,
                    (SELECT subjects.sub_name FROM subjects, match_current_schools AS mcs WHERE mcs.mcs_sub1_id = subjects.sub_id LIMIT 1) AS subject1,
										(SELECT subjects.sub_name FROM subjects, match_current_schools AS mcs WHERE mcs.mcs_sub2_id = subjects.sub_id LIMIT 1) AS subject2 
										FROM match_current_schools
										INNER JOIN schools ON match_current_schools.mcs_school_id = schools.school_id
										INNER JOIN districts ON match_current_schools.mcs_distr_id = districts.distr_id 
										INNER JOIN provinces ON match_current_schools.mcs_province_id = provinces.province_id');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
	
	function get_pref_districts_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT mpd.mpd_id, 
										mpd.mpd_client_ec_no, 
										districts.distr_name
										FROM match_pref_districts AS mpd
										INNER JOIN districts ON mpd.mpd_distr_id = districts.distr_id');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
	
	function get_pref_provinces_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT mpp.mpp_id, 
										mpp.mpp_client_ec_no, 
										provinces.province_name 
										FROM match_pref_provinces AS mpp
										INNER JOIN provinces ON mpp.mpp_province_id = provinces.province_id');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
	
	function get_pref_locations_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT mpl.mpl_id, 
										mpl.mpl_client_ec_no, 
										locations.loc_name
										FROM match_pref_locations AS mpl
										INNER JOIN locations ON mpl.mpl_loc_id = locations.loc_id');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
	
	function get_pref_towns_list(){
		
		include ('connection.php');
		
		try{
			return $db->query('SELECT mpt.mpt_id, 
										mpt.mpt_client_ec_no, 
										towns.town_name
										FROM match_pref_towns AS mpt
										INNER JOIN towns ON mpt.mpt_town_id = towns.town_id');
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
	
	function get_pref_schools_list(){
		
				
		include ('connection.php');
		
		try{
			return $db->query("SELECT mps.mps_id, 
										mps.mps_client_ec_no, 
										schools.school_name
										FROM match_pref_schools AS mps
										INNER JOIN schools ON mps.mps_school_id = schools.school_id");
		}catch (Exception $e){
			
			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
 
		
?>
