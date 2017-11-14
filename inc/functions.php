<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('html_errors', 1);

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
      global $mpd_distr_id;
				if(isset($_POST['preferred_district1'])){
					if($_POST['preferred_district1'] == $value['distr_name']){
						echo 'selected';
						}
					}elseif($mpd_distr_id == $value['distr_id']){
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
      global $mpd2_distr_id;
				if(isset($_POST['preferred_district2'])){
					if($_POST['preferred_district2'] == $value['distr_name']){
						echo 'selected';
						}
					}elseif($mpd2_distr_id == $value['distr_id']){
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
      global $mpl_loc_id;
				if(isset($_POST['preferred_location1'])){
					if($_POST['preferred_location1'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif($mpl_loc_id == $value['loc_id']){
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
        global $mpl2_loc_id;
				if(isset($_POST['preferred_location2'])){
					if($_POST['preferred_location2'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif($mpl2_loc_id == $value['loc_id']){
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
      global $mpl3_loc_id;
				if(isset($_POST['preferred_location3'])){
					if($_POST['preferred_location3'] == $value['loc_name']){
						echo 'selected';
						}
				}elseif($mpl3_loc_id == $value['loc_id']){
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

       global $mps_school_id;
				if(isset($_POST['preferred_schools1'])){
					if($_POST['preferred_schools1'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps_school_id == $value['school_id']){
            echo 'selected';
          }


			echo '>'.strtoupper($value['school_name']).' '.strtoupper($value['school_level']).'</option>';
		}

	echo '</select>';

	}

  //this function prepares a drop-down of all schools and checks whether an option has been selected during a session for data persistence
	function all_schools1(array $schools){

		foreach ($schools as $key=>$value){
			echo '<option value='.'"'.strtoupper($value['school_name']).'"';

       global $mps2_school_id;
				if(isset($_POST['preferred_schools2'])){
					if($_POST['preferred_schools2'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps2_school_id == $value['school_id']){
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

       global $mps3_school_id;
				if(isset($_POST['preferred_schools3'])){
					if($_POST['preferred_schools3'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps3_school_id == $value['school_id']){
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

       global $mps4_school_id;
				if(isset($_POST['preferred_schools4'])){
					if($_POST['preferred_schools4'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps4_school_id == $value['school_id']){
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

       global $mps5_school_id;
				if(isset($_POST['preferred_schools5'])){
					if($_POST['preferred_schools5'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps5_school_id == $value['school_id']){
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

       global $mps6_school_id;
				if(isset($_POST['preferred_schools6'])){
					if($_POST['preferred_schools6'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps6_school_id == $value['school_id']){
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

       global $mps7_school_id;
				if(isset($_POST['preferred_schools7'])){
					if($_POST['preferred_schools7'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps7_school_id == $value['school_id']){
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

       global $mps8_school_id;
				if(isset($_POST['preferred_schools8'])){
					if($_POST['preferred_schools8'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps8_school_id == $value['school_id']){
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

       global $mps9_school_id;
				if(isset($_POST['preferred_schools9'])){
					if($_POST['preferred_schools9'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps9_school_id == $value['school_id']){
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

       global $mps10_school_id;
				if(isset($_POST['preferred_schools10'])){
					if($_POST['preferred_schools10'] == $value['school_name']){
						echo 'selected';
					}
				}elseif($mps10_school_id == $value['school_id']){
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

if ($_SERVER['REQUEST_METHOD'] == "POST"){
		//header(Location:'payreg.php');
		//on confirmation of registration payment
    
    
//this function inserts a new client if the EC # is not already in the system. Otherwise it updates details on an existing EC #.
function create_client($ecNumber, 
						$userFirstName, 
						$userLastName, 
						$gender, 
						$mobileNumber, 
						$userEmail, 
						$userPassword, 
						$levelTaught, 
						$dateCreated, 
						$status = 'OPEN', 
						$dateMatched = NULL){
		include ('connection.php');
		
		$sql_client = 'INSERT INTO `clients` (`client_ec_no`, 
											`client_first_name`, 
											`client_last_name`, 
											`client_sex`, 
											`client_mobile_no`, 
											`client_email`, 
											`client_password`, 
											`client_level_taught`, 
											`client_date_created`, 
											`client_status`, 
											`client_date_matched`)
									VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE `client_first_name` = VALUES(`client_first_name`), 
                                           `client_last_name` = VALUES(`client_last_name`), 
                                           `client_sex` = VALUES(`client_sex`), 
                                           `client_mobile_no` = VALUES(`client_mobile_no`), 
                                           `client_email` = VALUES(`client_email`), 
                                           `client_password` = VALUES(`client_password`), 
                                           `client_level_taught` = VALUES(`client_level_taught`)';
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
					$results_client->execute();
				} catch (Exception $e) {
					echo "Error!: " . $e->getMessage() . "<br />";
					return false;
				}
				return true;
		}

	
    function client_pref_prov($prefProv_id, $ecNumber){
		include ('connection.php');
       
       $sql_province = 'INSERT INTO match_pref_provinces
										(mpp_province_id,
										mpp_client_ec_no)
								VALUES (?,?)
                ON DUPLICATE KEY UPDATE mpp_province_id = '.$prefProv_id;
                
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
			
        $sql_town = 'INSERT INTO match_pref_towns
                      (mpt_town_id,
                       mpt_client_ec_no)
                    VALUES (?, ?)
                    ON DUPLICATE KEY UPDATE mpt_town_id = '.$prefTown_id;
      
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
    
        $sql_districts1 = 'INSERT INTO match_pref_districts
						(mpd_distr_id,
						mpd_client_ec_no)
				VALUES (?,?)
        ON DUPLICATE KEY UPDATE mpd_distr_id = '.$prefDistr1_id;
    
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
  
  function client_pref_distr2($prefDistr2_id, $ecNumber){

		include ('connection.php');
    
        $sql_districts2 = 'INSERT INTO match_pref_districts2
						(mpd2_distr_id,
						mpd2_client_ec_no)
				VALUES (?,?)
        ON DUPLICATE KEY UPDATE mpd2_distr_id ='.$prefDistr2_id;
    
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
    //this function creates a record in the 'match_pref_schools' database if the EC number is not already in the system otherwise it updates the record with that EC #
		function client_pref_sch1($prefSchool1_id, $ecNumber, $levelTaught, $optional){

					include ('connection.php');

          //the below code deletes previously saved provinces option upon switching to selecting by preferred schools
          $sql_del = 'DELETE FROM match_pref_provinces
                  WHERE mpp_client_ec_no = ?';

          try {
            $results_del_sch1 = $db->prepare($sql_del);
            $results_del_sch1->bindValue(1, $ecNumber, PDO::PARAM_STR);
            $results_del_sch1->execute();
          } catch (Exception $e) {
            echo "Error!: " . $e->getMessage() . "<br />";
            return false;
          }
          
          //insertion or updating of records is handled by the below code
          $sql_school1 = 'INSERT INTO `match_pref_schools`
                       (`mps_school_id`,
                        `mps_client_ec_no`,
                        `mps_client_level_taught`,
                        `mps_sub1_id`,
                        `mps_sub2_id`)
									VALUES (?, ?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE `mps_school_id` = VALUES(`mps_school_id`),
                                          `mps_client_level_taught` = VALUES(`mps_client_level_taught`), 
                                           `mps_sub1_id` = VALUES(`mps_sub1_id`), 
                                           `mps_sub2_id` = VALUES(`mps_sub2_id`)';

									//try {
										$results_school1 = $db->prepare($sql_school1);
										$results_school1->bindValue(1, $prefSchool1_id, PDO::PARAM_INT);
										$results_school1->bindValue(2, $ecNumber, PDO::PARAM_STR);
                    $results_school1->bindValue(3, $levelTaught, PDO::PARAM_STR);
                    $results_school1->bindValue(4, $optional['mps_sub1_id'], PDO::PARAM_INT);
                    $results_school1->bindValue(5, $optional['mps_sub2_id'], PDO::PARAM_INT);
										$results_school1->execute();
									/*} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}*/
									return true;
          
    }
    
    //this function creates a record in the 'match_pref_schools2' database if the EC number is not already in the system otherwise it updates the record with that EC #
    function client_pref_sch2($prefSchool2_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school2 = 'INSERT INTO `match_pref_schools2`
                           (`mps2_school_id`,
                            `mps2_client_ec_no`,
                            `mps2_client_level_taught`,
                            `mps2_sub1_id`,
                            `mps2_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps2_school_id` = VALUES(`mps2_school_id`),
                                              `mps2_client_level_taught` = VALUES(`mps2_client_level_taught`), 
                                               `mps2_sub1_id` = VALUES(`mps2_sub1_id`), 
                                               `mps2_sub2_id` = VALUES(`mps2_sub2_id`)';

                      try {
                        $results_school2 = $db->prepare($sql_school2);
                        $results_school2->bindValue(1, $prefSchool2_id, PDO::PARAM_INT);
                        $results_school2->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school2->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school2->bindValue(4, $optional['mps2_sub1_id'], PDO::PARAM_INT);
                        $results_school2->bindValue(5, $optional['mps2_sub2_id'], PDO::PARAM_INT);
                        $results_school2->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
      
      //this function creates a record in the 'match_pref_schools3' database if the EC number is not already in the system otherwise it updates the record with that EC #
			function client_pref_sch3($prefSchool3_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school3 = 'INSERT INTO `match_pref_schools3`
                           (`mps3_school_id`,
                            `mps3_client_ec_no`,
                            `mps3_client_level_taught`,
                            `mps3_sub1_id`,
                            `mps3_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps3_school_id` = VALUES(`mps3_school_id`),
                                              `mps3_client_level_taught` = VALUES(`mps3_client_level_taught`), 
                                               `mps3_sub1_id` = VALUES(`mps3_sub1_id`), 
                                               `mps3_sub2_id` = VALUES(`mps3_sub2_id`)';

                      try {
                        $results_school3 = $db->prepare($sql_school3);
                        $results_school3->bindValue(1, $prefSchool3_id, PDO::PARAM_INT);
                        $results_school3->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school3->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school3->bindValue(4, $optional['mps3_sub1_id'], PDO::PARAM_INT);
                        $results_school3->bindValue(5, $optional['mps3_sub2_id'], PDO::PARAM_INT);
                        $results_school3->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
    
      //this function creates a record in the 'match_pref_schools4' database if the EC number is not already in the system otherwise it updates the record with that EC #
			function client_pref_sch4($prefSchool4_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school4 = 'INSERT INTO `match_pref_schools4`
                           (`mps4_school_id`,
                            `mps4_client_ec_no`,
                            `mps4_client_level_taught`,
                            `mps4_sub1_id`,
                            `mps4_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps4_school_id` = VALUES(`mps4_school_id`),
                                              `mps4_client_level_taught` = VALUES(`mps4_client_level_taught`), 
                                               `mps4_sub1_id` = VALUES(`mps4_sub1_id`), 
                                               `mps4_sub2_id` = VALUES(`mps4_sub2_id`)';

                      try {
                        $results_school4 = $db->prepare($sql_school4);
                        $results_school4->bindValue(1, $prefSchool4_id, PDO::PARAM_INT);
                        $results_school4->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school4->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school4->bindValue(4, $optional['mps4_sub1_id'], PDO::PARAM_INT);
                        $results_school4->bindValue(5, $optional['mps4_sub2_id'], PDO::PARAM_INT);
                        $results_school4->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
      
      //this function creates a record in the 'match_pref_schools5' database if the EC number is not already in the system otherwise it updates the record with that EC #
			function client_pref_sch5($prefSchool5_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school5 = 'INSERT INTO `match_pref_schools5`
                           (`mps5_school_id`,
                            `mps5_client_ec_no`,
                            `mps5_client_level_taught`,
                            `mps5_sub1_id`,
                            `mps5_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps5_school_id` = VALUES(`mps5_school_id`),
                                              `mps5_client_level_taught` = VALUES(`mps5_client_level_taught`), 
                                               `mps5_sub1_id` = VALUES(`mps5_sub1_id`), 
                                               `mps5_sub2_id` = VALUES(`mps5_sub2_id`)';

                      try {
                        $results_school5 = $db->prepare($sql_school5);
                        $results_school5->bindValue(1, $prefSchool5_id, PDO::PARAM_INT);
                        $results_school5->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school5->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school5->bindValue(4, $optional['mps5_sub1_id'], PDO::PARAM_INT);
                        $results_school5->bindValue(5, $optional['mps5_sub2_id'], PDO::PARAM_INT);
                        $results_school5->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
      

			//this function creates a record in the 'match_pref_schools6' database if the EC number is not already in the system otherwise it updates the record with that EC #
      function client_pref_sch6($prefSchool6_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school6 = 'INSERT INTO `match_pref_schools6`
                           (`mps6_school_id`,
                            `mps6_client_ec_no`,
                            `mps6_client_level_taught`,
                            `mps6_sub1_id`,
                            `mps6_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps6_school_id` = VALUES(`mps6_school_id`),
                                              `mps6_client_level_taught` = VALUES(`mps6_client_level_taught`), 
                                               `mps6_sub1_id` = VALUES(`mps6_sub1_id`), 
                                               `mps6_sub2_id` = VALUES(`mps6_sub2_id`)';

                      try {
                        $results_school6 = $db->prepare($sql_school6);
                        $results_school6->bindValue(1, $prefSchool6_id, PDO::PARAM_INT);
                        $results_school6->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school6->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school6->bindValue(4, $optional['mps6_sub1_id'], PDO::PARAM_INT);
                        $results_school6->bindValue(5, $optional['mps6_sub2_id'], PDO::PARAM_INT);
                        $results_school6->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
      

    //this function creates a record in the 'match_pref_schools7' database if the EC number is not already in the system otherwise it updates the record with that EC #
		function client_pref_sch7($prefSchool7_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school7 = 'INSERT INTO `match_pref_schools7`
                           (`mps7_school_id`,
                            `mps7_client_ec_no`,
                            `mps7_client_level_taught`,
                            `mps7_sub1_id`,
                            `mps7_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps7_school_id` = VALUES(`mps7_school_id`),
                                              `mps7_client_level_taught` = VALUES(`mps7_client_level_taught`), 
                                               `mps7_sub1_id` = VALUES(`mps7_sub1_id`), 
                                               `mps7_sub2_id` = VALUES(`mps7_sub2_id`)';

                      try {
                        $results_school7 = $db->prepare($sql_school7);
                        $results_school7->bindValue(1, $prefSchool7_id, PDO::PARAM_INT);
                        $results_school7->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school7->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school7->bindValue(4, $optional['mps7_sub1_id'], PDO::PARAM_INT);
                        $results_school7->bindValue(5, $optional['mps7_sub2_id'], PDO::PARAM_INT);
                        $results_school7->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
    
      //this function creates a record in the 'match_pref_schools8' database if the EC number is not already in the system otherwise it updates the record with that EC #
			function client_pref_sch8($prefSchool8_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school8 = 'INSERT INTO `match_pref_schools8`
                           (`mps8_school_id`,
                            `mps8_client_ec_no`,
                            `mps8_client_level_taught`,
                            `mps8_sub1_id`,
                            `mps8_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps8_school_id` = VALUES(`mps8_school_id`),
                                              `mps8_client_level_taught` = VALUES(`mps8_client_level_taught`), 
                                               `mps8_sub1_id` = VALUES(`mps8_sub1_id`), 
                                               `mps8_sub2_id` = VALUES(`mps8_sub2_id`)';

                      try {
                        $results_school8 = $db->prepare($sql_school8);
                        $results_school8->bindValue(1, $prefSchool8_id, PDO::PARAM_INT);
                        $results_school8->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school8->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school8->bindValue(4, $optional['mps8_sub1_id'], PDO::PARAM_INT);
                        $results_school8->bindValue(5, $optional['mps8_sub2_id'], PDO::PARAM_INT);
                        $results_school8->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
      
    //this function creates a record in the 'match_pref_schools9' database if the EC number is not already in the system otherwise it updates the record with that EC #
		function client_pref_sch9($prefSchool9_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school9 = 'INSERT INTO `match_pref_schools9`
                           (`mps9_school_id`,
                            `mps9_client_ec_no`,
                            `mps9_client_level_taught`,
                            `mps9_sub1_id`,
                            `mps9_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps9_school_id` = VALUES(`mps9_school_id`),
                                              `mps9_client_level_taught` = VALUES(`mps9_client_level_taught`), 
                                               `mps9_sub1_id` = VALUES(`mps9_sub1_id`), 
                                               `mps9_sub2_id` = VALUES(`mps9_sub2_id`)';

                      try {
                        $results_school9 = $db->prepare($sql_school9);
                        $results_school9->bindValue(1, $prefSchool9_id, PDO::PARAM_INT);
                        $results_school9->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school9->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school9->bindValue(4, $optional['mps9_sub1_id'], PDO::PARAM_INT);
                        $results_school9->bindValue(5, $optional['mps9_sub2_id'], PDO::PARAM_INT);
                        $results_school9->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
		
    //this function creates a record in the 'match_pref_schools10' database if the EC number is not already in the system otherwise it updates the record with that EC #
		function client_pref_sch10($prefSchool10_id, $ecNumber, $levelTaught, $optional){

              include ('connection.php');

              $sql_school10 = 'INSERT INTO `match_pref_schools10`
                           (`mps10_school_id`,
                            `mps10_client_ec_no`,
                            `mps10_client_level_taught`,
                            `mps10_sub1_id`,
                            `mps10_sub2_id`)
                      VALUES (?, ?, ?, ?, ?)
                      ON DUPLICATE KEY UPDATE `mps10_school_id` = VALUES(`mps10_school_id`),
                                              `mps10_client_level_taught` = VALUES(`mps10_client_level_taught`), 
                                               `mps10_sub1_id` = VALUES(`mps10_sub1_id`), 
                                               `mps10_sub2_id` = VALUES(`mps10_sub2_id`)';

                      try {
                        $results_school10 = $db->prepare($sql_school10);
                        $results_school10->bindValue(1, $prefSchool10_id, PDO::PARAM_INT);
                        $results_school10->bindValue(2, $ecNumber, PDO::PARAM_STR);
                        $results_school10->bindValue(3, $levelTaught, PDO::PARAM_STR);
                        $results_school10->bindValue(4, $optional['mps10_sub1_id'], PDO::PARAM_INT);
                        $results_school10->bindValue(5, $optional['mps10_sub2_id'], PDO::PARAM_INT);
                        $results_school10->execute();
                      } catch (Exception $e) {
                        echo "Error!: " . $e->getMessage() . "<br />";
                        return false;
                      }
                      return true;

                }
		

		function client_pref_loc1($prefLocation1_id, $ecNumber){

				include ('connection.php');

				$sql_location1 = 'INSERT INTO match_pref_locations
											(mpl_loc_id,
											mpl_client_ec_no)
										VALUES (?, ?)
                    ON DUPLICATE KEY UPDATE mpl_loc_id ='.$prefLocation1_id;

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
    

		function client_pref_loc2($prefLocation2_id, $ecNumber){

				include ('connection.php');

				$sql_location2 = 'INSERT INTO match_pref_locations2
											(mpl2_loc_id,
											mpl2_client_ec_no)
										VALUES (?, ?)
                    ON DUPLICATE KEY UPDATE mpl2_loc_id ='.$prefLocation2_id;

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
    

		function client_pref_loc3($prefLocation3_id, $ecNumber){

				include ('connection.php');

				$sql_location3 = 'INSERT INTO match_pref_locations3
											(mpl3_loc_id,
											mpl3_client_ec_no)
										VALUES (?, ?)
                    ON DUPLICATE KEY UPDATE mpl3_loc_id ='.$prefLocation3_id;

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
    
    
    function client_curr_sch($ecNumber, $currSch_id, $currDistr_id, $currProv_id, $levelTaught, $optional){
					
					include ('connection.php');
					$sql_current_sch = 'INSERT INTO match_current_schools 
											(mcs_client_ec_no, 
											mcs_school_id, 
											mcs_distr_id,
											mcs_province_id,
											mcs_client_level_taught,
                      mcs_sub1_id,
                      mcs_sub2_id)
									VALUES (?, ?, ?, ?, ?, ?, ?)
                  ON DUPLICATE KEY UPDATE `mcs_school_id` = VALUES(`mcs_school_id`),
                                          `mcs_distr_id` = VALUES(`mcs_distr_id`),
                                          `mcs_province_id` = VALUES(`mcs_province_id`),
                                          `mcs_client_level_taught` = VALUES(`mcs_client_level_taught`),
                                          `mcs_sub1_id` = VALUES(`mcs_sub1_id`),
                                          `mcs_sub2_id` = VALUES(`mcs_sub2_id`)';
									
									try {
										$results_current_sch = $db->prepare($sql_current_sch);
										$results_current_sch->bindValue(1, $ecNumber, PDO::PARAM_STR);
										$results_current_sch->bindValue(2, $currSch_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(3, $currDistr_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(4, $currProv_id, PDO::PARAM_INT);
										$results_current_sch->bindValue(5, $levelTaught, PDO::PARAM_STR);
                    $results_current_sch->bindValue(6, $optional['mcs_sub1_id'], PDO::PARAM_INT);
                    $results_current_sch->bindValue(7, $optional['mcs_sub2_id'], PDO::PARAM_INT);
										$results_current_sch->execute();
									} catch (Exception $e) {
										echo "Error!: " . $e->getMessage() . "<br />";
										return false;
									}
									return true;
			
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
                    mpd_id,
                    mpd_distr_id,
                    mpd2_id,
                    mpd2_distr_id,
                    mpt_id,
                    mpt_town_id,
                    mpl_id,
                    mpl_loc_id,
                    mpl2_id,
                    mpl2_loc_id,
                    mpl3_id,
                    mpl3_loc_id,
                    mps_id,
                    mps_school_id,
                    mps2_id,
                    mps2_school_id,
                    mps3_id,
                    mps3_school_id,
                    mps4_id,
                    mps4_school_id,
                    mps5_id,
                    mps5_school_id,
                    mps6_id,
                    mps6_school_id,
                    mps7_id,
                    mps7_school_id,
                    mps8_id,
                    mps8_school_id,
                    mps9_id,
                    mps9_school_id,
                    mps10_id,
                    mps10_school_id
            FROM clients
            LEFT JOIN match_pref_provinces ON clients.client_ec_no = match_pref_provinces.mpp_client_ec_no
            LEFT JOIN match_pref_districts ON clients.client_ec_no = match_pref_districts.mpd_client_ec_no
            LEFT JOIN match_pref_districts2 ON clients.client_ec_no = match_pref_districts2.mpd2_client_ec_no
            LEFT JOIN match_pref_towns ON clients.client_ec_no = match_pref_towns.mpt_client_ec_no
            LEFT JOIN match_pref_locations ON clients.client_ec_no = match_pref_locations.mpl_client_ec_no
            LEFT JOIN match_pref_locations2 ON clients.client_ec_no = match_pref_locations2.mpl2_client_ec_no
            LEFT JOIN match_pref_locations3 ON clients.client_ec_no = match_pref_locations3.mpl3_client_ec_no
            LEFT JOIN match_pref_schools ON clients.client_ec_no = match_pref_schools.mps_client_ec_no
            LEFT JOIN match_pref_schools2 ON clients.client_ec_no = match_pref_schools2.mps2_client_ec_no
            LEFT JOIN match_pref_schools3 ON clients.client_ec_no = match_pref_schools3.mps3_client_ec_no
            LEFT JOIN match_pref_schools4 ON clients.client_ec_no = match_pref_schools4.mps4_client_ec_no
            LEFT JOIN match_pref_schools5 ON clients.client_ec_no = match_pref_schools5.mps5_client_ec_no
            LEFT JOIN match_pref_schools6 ON clients.client_ec_no = match_pref_schools6.mps6_client_ec_no
            LEFT JOIN match_pref_schools7 ON clients.client_ec_no = match_pref_schools7.mps7_client_ec_no
            LEFT JOIN match_pref_schools8 ON clients.client_ec_no = match_pref_schools8.mps8_client_ec_no
            LEFT JOIN match_pref_schools9 ON clients.client_ec_no = match_pref_schools9.mps9_client_ec_no
            LEFT JOIN match_pref_schools10 ON clients.client_ec_no = match_pref_schools10.mps10_client_ec_no
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

    //global $mpd;
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
    
    //global $sub_ec_no;
    //$sub_ec_no = $item['mcs_client_ec_no'];
    
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

//the below two functions pulls data for the preferred districts reports
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
  
  function get_pref_districts2_list(){

		include ('connection.php');

		try{
			return $db->query('SELECT mpd2.mpd2_id,
										mpd2.mpd2_client_ec_no,
										districts.distr_name
										FROM match_pref_districts2 AS mpd2
										INNER JOIN districts ON mpd2.mpd2_distr_id = districts.distr_id');
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}

	//the below function pulls data for the preferred provinces reports
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

  //the below three functions pulls data for the preferred locations reports
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
  
  function get_pref_locations2_list(){

		include ('connection.php');

		try{
			return $db->query('SELECT mpl2.mpl2_id,
										mpl2.mpl2_client_ec_no,
										locations.loc_name
										FROM match_pref_locations2 AS mpl2
										INNER JOIN locations ON mpl2.mpl2_loc_id = locations.loc_id');
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_locations3_list(){

		include ('connection.php');

		try{
			return $db->query('SELECT mpl3.mpl3_id,
										mpl3.mpl3_client_ec_no,
										locations.loc_name
										FROM match_pref_locations3 AS mpl3
										INNER JOIN locations ON mpl3.mpl3_loc_id = locations.loc_id');
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}

	//the below function pulls data for the preferred towns report
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

	// the below ten functions pulls data for the preferred schools reports
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
  
  function get_pref_schools2_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps2.mps2_id,
										mps2.mps2_client_ec_no,
										schools.school_name
										FROM match_pref_schools2 AS mps2
										INNER JOIN schools ON mps2.mps2_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools3_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps3.mps3_id,
										mps3.mps3_client_ec_no,
										schools.school_name
										FROM match_pref_schools3 AS mps3
										INNER JOIN schools ON mps3.mps3_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools4_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps4.mps4_id,
										mps4.mps4_client_ec_no,
										schools.school_name
										FROM match_pref_schools4 AS mps4
										INNER JOIN schools ON mps4.mps4_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools5_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps5.mps5_id,
										mps5.mps5_client_ec_no,
										schools.school_name
										FROM match_pref_schools5 AS mps5
										INNER JOIN schools ON mps5.mps5_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools6_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps6.mps6_id,
										mps6.mps6_client_ec_no,
										schools.school_name
										FROM match_pref_schools6 AS mps6
										INNER JOIN schools ON mps6.mps6_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools7_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps7.mps7_id,
										mps7.mps7_client_ec_no,
										schools.school_name
										FROM match_pref_schools7 AS mps7
										INNER JOIN schools ON mps7.mps7_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools8_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps8.mps8_id,
										mps8.mps8_client_ec_no,
										schools.school_name
										FROM match_pref_schools8 AS mps8
										INNER JOIN schools ON mps8.mps8_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools9_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps9.mps9_id,
										mps9.mps9_client_ec_no,
										schools.school_name
										FROM match_pref_schools9 AS mps9
										INNER JOIN schools ON mps9.mps9_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
  
  function get_pref_schools10_list(){


		include ('connection.php');

		try{
			return $db->query("SELECT mps10.mps10_id,
										mps10.mps10_client_ec_no,
										schools.school_name
										FROM match_pref_schools10 AS mps10
										INNER JOIN schools ON mps10.mps10_school_id = schools.school_id");
		}catch (Exception $e){

			echo 'Error!: '.$e->getMessage(). '<br>';
			return array();
		}
	}
//the below functions prepares matches starting with first preferred schools options followed by preferred locations, preferred towns, preferred districts and finally preferred provinces

try{$results_curr_school = $db->query('SELECT mcs_school_id, mcs_client_ec_no
                                        FROM match_current_schools
                                        ORDER BY mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched current school';
			exit;

	}
	$matched_curr_schools = $results_curr_school->fetchAll(PDO::FETCH_ASSOC); 
 /*
  try{
    $results_pref_school1 = $db->query("SELECT mps.mps_client_ec_no,mcs.mcs_client_ec_no, co_prefs.tab, co_prefs.Pref_ID
                                      FROM match_current_schools AS mcs
                                      INNER JOIN match_pref_schools AS mps
                                          ON mps.mps_school_id = mcs.mcs_school_id
                                          AND mps.mps_client_level_taught = mcs.mcs_client_level_taught
                                          AND ((mps.mps_sub1_id = mcs.mcs_sub1_id) 
                                          OR (mps.mps_sub1_id = mcs.mcs_sub2_id)
                                          OR (mps.mps_sub2_id = mcs.mcs_sub1_id)
                                          OR (mps.mps_sub2_id = mcs.mcs_sub2_id))
                                          AND mps.mps_status = 'A' 
                                          AND mcs.mcs_status = 'A'
                                      INNER JOIN
                                            ( SELECT 'match_pref_schools' AS tab, mps_client_ec_no AS EC_NO, mps_school_id AS Pref_ID
                                              FROM match_pref_schools
                                              UNION ALL
                                              SELECT 'match_pref_schools2', mps2_client_ec_no AS EC_NO, mps2_school_id AS Pref_ID
                                              FROM match_pref_schools2
                                              UNION ALL
                                              SELECT 'match_pref_schools3', mps3_client_ec_no AS EC_NO, mps3_school_id AS Pref_ID
                                              FROM match_pref_schools3
                                              UNION ALL
                                              SELECT 'match_pref_schools4', mps4_client_ec_no AS EC_NO, mps4_school_id AS Pref_ID
                                              FROM match_pref_schools4
                                              UNION ALL
                                              SELECT 'match_pref_schools5', mps5_client_ec_no AS EC_NO, mps5_school_id AS Pref_ID
                                              FROM match_pref_schools5
                                              UNION ALL
                                              SELECT 'match_pref_schools6', mps6_client_ec_no AS EC_NO, mps6_school_id AS Pref_ID
                                              FROM match_pref_schools6
                                              UNION ALL
                                              SELECT 'match_pref_schools7', mps7_client_ec_no AS EC_NO, mps7_school_id AS Pref_ID
                                              FROM match_pref_schools7
                                              UNION ALL
                                              SELECT 'match_pref_schools8', mps8_client_ec_no AS EC_NO, mps8_school_id AS Pref_ID
                                              FROM match_pref_schools8
                                              UNION ALL
                                              SELECT 'match_pref_schools9', mps9_client_ec_no AS EC_NO, mps9_school_id AS Pref_ID
                                              FROM match_pref_schools9
                                              UNION ALL
                                              SELECT 'match_pref_schools10', mps10_client_ec_no AS EC_NO, mps10_school_id AS Pref_ID
                                              FROM match_pref_schools10
                                              ) AS co_prefs
                                              ON mcs.mcs_client_ec_no = co_prefs.EC_NO
                                      INNER JOIN clients
                                          ON mcs.mcs_client_ec_no = clients.client_ec_no
                                          AND clients.client_status = 'A'
                                      WHERE mcs.mcs_id IN (
                                          SELECT MIN(mcs.mcs_id) 
                                          FROM match_current_schools AS mcs
                                          GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id");
	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school1';
			exit;

	}
  
	$matched_schools1 = $results_pref_school1->fetchAll(PDO::FETCH_ASSOC);
   */ 
   
   try{
    $results_pref_school1 = $db->query("SELECT mps.mps_client_ec_no,mcs.mcs_client_ec_no
                                      FROM match_current_schools AS mcs
                                      INNER JOIN match_pref_schools AS mps
                                          ON mps.mps_school_id = mcs.mcs_school_id
                                          AND mps.mps_client_level_taught = mcs.mcs_client_level_taught
                                          AND ((mps.mps_sub1_id = mcs.mcs_sub1_id) 
                                          OR (mps.mps_sub1_id = mcs.mcs_sub2_id)
                                          OR (mps.mps_sub2_id = mcs.mcs_sub1_id)
                                          OR (mps.mps_sub2_id = mcs.mcs_sub2_id))
                                          AND mps.mps_status = 'A' 
                                          AND mcs.mcs_status = 'A'
                                      INNER JOIN clients
                                          ON mcs.mcs_client_ec_no = clients.client_ec_no
                                          AND clients.client_status = 'A'
                                      WHERE mcs.mcs_id IN (
                                          SELECT MIN(mcs.mcs_id) 
                                          FROM match_current_schools AS mcs
                                          GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id");
	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school1';
			exit;

	}
  
	$matched_schools1 = $results_pref_school1->fetchAll(PDO::FETCH_ASSOC);
 try{$results_pref_school2 = $db->query('SELECT mps2.mps2_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools2 AS mps2 
                                            ON mps2.mps2_school_id = mcs.mcs_school_id
                                            AND mps2.mps2_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps2.mps2_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps2.mps2_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps2.mps2_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps2.mps2_sub2_id = mcs.mcs_sub2_id))
                                            AND mps2.mps2_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school2';
			exit;

	}
	$matched_schools2 = $results_pref_school2->fetchAll(PDO::FETCH_ASSOC); 

 try{$results_pref_school3 = $db->query('SELECT mps3.mps3_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools3 AS mps3 
                                            ON mps3.mps3_school_id = mcs.mcs_school_id
                                            AND mps3.mps3_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps3.mps3_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps3.mps3_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps3.mps3_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps3.mps3_sub2_id = mcs.mcs_sub2_id))
                                            AND mps3.mps3_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school3';
			exit;

	}
	$matched_schools3 = $results_pref_school3->fetchAll(PDO::FETCH_ASSOC);  
  
  
  try{$results_pref_school4 = $db->query('SELECT mps4.mps4_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools4 AS mps4 
                                            ON mps4.mps4_school_id = mcs.mcs_school_id
                                            AND mps4.mps4_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps4.mps4_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps4.mps4_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps4.mps4_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps4.mps4_sub2_id = mcs.mcs_sub2_id))
                                            AND mps4.mps4_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school4';
			exit;

	}
	$matched_schools4 = $results_pref_school4->fetchAll(PDO::FETCH_ASSOC);  
 
 
 try{$results_pref_school5 = $db->query('SELECT mps5.mps5_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools5 AS mps5 
                                            ON mps5.mps5_school_id = mcs.mcs_school_id
                                            AND mps5.mps5_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps5.mps5_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps5.mps5_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps5.mps5_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps5.mps5_sub2_id = mcs.mcs_sub2_id))
                                            AND mps5.mps5_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school5';
			exit;

	}
	$matched_schools5 = $results_pref_school5->fetchAll(PDO::FETCH_ASSOC); 
 
 
 try{$results_pref_school6 = $db->query('SELECT mps6.mps6_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools6 AS mps6 
                                            ON mps6.mps6_school_id = mcs.mcs_school_id
                                            AND mps6.mps6_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps6.mps6_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps6.mps6_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps6.mps6_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps6.mps6_sub2_id = mcs.mcs_sub2_id))
                                            AND mps6.mps6_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school6';
			exit;

	}
	$matched_schools6 = $results_pref_school6->fetchAll(PDO::FETCH_ASSOC); 
 
 
 try{$results_pref_school7 = $db->query('SELECT mps7.mps7_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools7 AS mps7 
                                            ON mps7.mps7_school_id = mcs.mcs_school_id
                                            AND mps7.mps7_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps7.mps7_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps7.mps7_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps7.mps7_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps7.mps7_sub2_id = mcs.mcs_sub2_id))
                                            AND mps7.mps7_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school7';
			exit;

	}
	$matched_schools7 = $results_pref_school7->fetchAll(PDO::FETCH_ASSOC); 
 
 
 try{$results_pref_school8 = $db->query('SELECT mps8.mps8_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools8 AS mps8 
                                            ON mps8.mps8_school_id = mcs.mcs_school_id
                                            AND mps8.mps8_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps8.mps8_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps8.mps8_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps8.mps8_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps8.mps8_sub2_id = mcs.mcs_sub2_id))
                                            AND mps8.mps8_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school8';
			exit;

	}
	$matched_schools8 = $results_pref_school8->fetchAll(PDO::FETCH_ASSOC); 
 
 
 try{$results_pref_school9 = $db->query('SELECT mps9.mps9_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools9 AS mps9 
                                            ON mps9.mps9_school_id = mcs.mcs_school_id
                                            AND mps9.mps9_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps9.mps9_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps9.mps9_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps9.mps9_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps9.mps9_sub2_id = mcs.mcs_sub2_id))
                                            AND mps9.mps9_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school9';
			exit;

	}
	$matched_schools9 = $results_pref_school9->fetchAll(PDO::FETCH_ASSOC);  
  
  try{$results_pref_school10 = $db->query('SELECT mps10.mps10_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_schools10 AS mps10 
                                            ON mps10.mps10_school_id = mcs.mcs_school_id
                                            AND mps10.mps10_client_level_taught = mcs.mcs_client_level_taught
                                            AND ((mps10.mps10_sub1_id = mcs.mcs_sub1_id) 
                                            OR (mps10.mps10_sub1_id = mcs.mcs_sub2_id)
                                            OR (mps10.mps10_sub2_id = mcs.mcs_sub1_id)
                                            OR (mps10.mps10_sub2_id = mcs.mcs_sub2_id))
                                            AND mps10.mps10_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_school_id)
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched preferred school10';
			exit;

	}
	$matched_schools10 = $results_pref_school10->fetchAll(PDO::FETCH_ASSOC); 
  
  try{$results_pref_locations1 = $db->query('SELECT mpl.mpl_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_locations AS mpl 
                                            ON mpl.mpl_loc_id = mcs.mcs_loc_id
                                            AND mpl.mpl_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_loc_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched locations1';
			exit;

	}
	$matched_locations1 = $results_pref_locations1->fetchAll(PDO::FETCH_ASSOC); 
  
  try{$results_pref_locations2 = $db->query('SELECT mpl2.mpl2_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_locations2 AS mpl2 
                                            ON mpl2.mpl2_loc_id = mcs.mcs_loc_id
                                            AND mpl2.mpl2_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_loc_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched locations2';
			exit;

	}
	$matched_locations2 = $results_pref_locations2->fetchAll(PDO::FETCH_ASSOC); 
  
  try{$results_pref_locations3 = $db->query('SELECT mpl3.mpl3_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_locations3 AS mpl3 
                                            ON mpl3.mpl3_loc_id = mcs.mcs_loc_id
                                            AND mpl3.mpl3_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_loc_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched locations3';
			exit;

	}
	$matched_locations3 = $results_pref_locations3->fetchAll(PDO::FETCH_ASSOC); 
  
  try{$results_pref_districts1 = $db->query('SELECT mpd.mpd_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_districts AS mpd 
                                            ON mpd.mpd_distr_id = mcs.mcs_distr_id
                                            AND mpd.mpd_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_distr_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched districts1';
			exit;

	}
	$matched_districts1 = $results_pref_districts1->fetchAll(PDO::FETCH_ASSOC);
  
  try{$results_pref_districts2 = $db->query('SELECT mpd2.mpd2_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_districts2 AS mpd2 
                                            ON mpd2.mpd2_distr_id = mcs.mcs_distr_id
                                            AND mpd2.mpd2_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_distr_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched districts2';
			exit;

	}
	$matched_districts2 = $results_pref_districts2->fetchAll(PDO::FETCH_ASSOC);
  
  try{$results_pref_towns = $db->query('SELECT mpt.mpt_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_towns AS mpt 
                                            ON mpt.mpt_town_id = mcs.mcs_town_id
                                            AND mpt.mpt_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_town_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched towns';
			exit;

	}
	$matched_towns = $results_pref_towns->fetchAll(PDO::FETCH_ASSOC);
  
  try{$results_pref_provinces = $db->query('SELECT mpp.mpp_client_ec_no, mcs.mcs_client_ec_no, clients.client_ec_no 
                                          FROM match_current_schools AS mcs  
                                          INNER JOIN match_pref_provinces AS mpp 
                                            ON mpp.mpp_province_id = mcs.mcs_province_id
                                            AND mpp.mpp_status = "A" 
                                            AND mcs.mcs_status = "A"
                                          INNER JOIN clients
                                            ON mcs.mcs_client_ec_no = clients.client_ec_no
                                            AND clients.client_status = "A"
                                          WHERE mcs.mcs_id IN (SELECT MIN(mcs.mcs_id) 
                                            FROM match_current_schools AS mcs 
                                            GROUP BY mcs.mcs_province_id)
                                            
                                          ORDER BY mcs.mcs_id');

	}catch (Exception $e){
			echo 'Failed to retrieve matched provinces';
			exit;

	}
	$matched_provinces = $results_pref_provinces->fetchAll(PDO::FETCH_ASSOC);
  
  
  echo "<pre>";
//print_r($matched_schools1).'<br>';
echo "</pre>";

?>
