<?php

if (empty($error_message) && isset($_POST["preferred_schools8"]) && !empty($prefSchools7)){
				$prefSchools8 = $_POST["preferred_schools8"];
				
				foreach($schools as $key=>$value){
					if(in_array($prefSchools8,$value)){
						  $prefSchool8_id = $value['school_id'];
					}
				}
			}elseif (empty($error_message) && isset($_POST["preferred_schools8"]) && empty($prefSchools7)){
				$error_message = 'You can not choose Schools eighth option without choosing a seventh option';
			}
      
  
  if (isset($_GET['id'])){
    $match_ec_no = $_GET['id'];
    foreach($mpp as $key=>$value){
      if(in_array($match_ec_no,$value)){
          $pref_province_id = $value['[mpp_province_id]'];
          foreach($provinces as $key=>$value){
            if(in_array($pref_province_id,$value)){
              $pref_province_name = $value['province_name'];
          }
        }
      }
    }
  }
  
  
?>