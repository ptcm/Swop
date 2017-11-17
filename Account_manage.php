<?php

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
//ini_set('html_errors', 1);

session_start();

include 'inc/functions.php';

$userFirstName = $userLastName = $ecNumber = $gender = $mobileNumber = $userEmail = $userPassword = $levelTaught = $currSch_id = $currDistr_id = $currProv_id =
$client_id =
$client_ec_no =
$client_first_name =
$client_last_name =
$client_sex =
$client_mobile_no =
$client_email =
$client_password =
$client_level_taught =
$match_sub1_id =
$match_sub2_id =
$match_sub1_name =
$match_sub2_name =
$mpt_town_id =
$mpt_town_name =
$pref_town_name =
$pref_distr_name =
$prefProv_id =
$pref_province_name =
$pref_location_name =
$curr_distr_name =
$curr_province_name =
$curr_school_name =
$prefDistr1 =
$prefDistr2 =
$mpd_id =
$mpl_id =
$mps_id =
$mpp_province_id =
    "";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $mpp_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mpd_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mpt_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mpl_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mps_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mcs_match_ec_no = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $mpd_id1 = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
    $mpd_id2 = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
    $prefDistr1 = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);
    $prefDistr2 = filter_input(INPUT_POST,'id', FILTER_SANITIZE_NUMBER_INT);

    $error_message = "";
    if (isset($_POST["gender"])){
        $gender = $_POST["gender"];
    }


    $userFirstName = trim(filter_input(INPUT_POST, 'user_first_name', FILTER_SANITIZE_STRING));

    if(isset($_POST['user_first_name'])){
        $_SESSION['user_first_name'][$userFirstName] = filter_input(INPUT_POST, 'user_first_name', FILTER_SANITIZE_STRING);
    }
    $userLastName = trim(filter_input(INPUT_POST, 'user_last_name', FILTER_SANITIZE_STRING));

    if(isset($_POST['user_last_name'])){
        $_SESSION['user_last_name'][$userLastName] = filter_input(INPUT_POST, 'user_last_name', FILTER_SANITIZE_STRING);
    }
    $mobileNumber = trim(filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_NUMBER_INT));

    if(isset($_POST['mobile_number'])){
        $_SESSION['mobile_number'][$mobileNumber] = filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_NUMBER_INT);
    }
    $ecNumber = trim(filter_input(INPUT_POST, 'ec_number', FILTER_SANITIZE_STRING));

    if(isset($_POST['mobile_number'])){
        $_SESSION['mobile_number'][$mobileNumber] = filter_input(INPUT_POST, 'mobile_number', FILTER_SANITIZE_NUMBER_INT);
    }

    $userEmail = trim(filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL));

    if(isset($_POST['user_email'])){
        $_SESSION['user_email'][$userEmail] = filter_input(INPUT_POST, 'user_email', FILTER_SANITIZE_EMAIL);
    }
    $userPassword = trim($_POST['user_password']);

    if(isset($_POST['user_email'])){
        $_SESSION['user_password'][$userPassword] = $_POST['user_password'];
    }

    if (!empty($_POST["level_taught"])){
        $levelTaught = strtoupper($_POST["level_taught"]);
        $_SESSION['level_taught'][$levelTaught] = filter_input(INPUT_POST, 'level_taught', FILTER_SANITIZE_STRING);
    }



    if (isset($_POST["preferred_province"])){
        $prefProvince = $_POST["preferred_province"];
        $_SESSION['preferred_province'][$prefProvince] = filter_input(INPUT_POST, 'preferred_province', FILTER_SANITIZE_STRING);

        switch ($prefProvince){
            case 'Harare':
                $prefProv_id = 1;
                break;
            case 'Bulawayo':
                $prefProv_id = 2;
                break;
            case 'Mashonaland East':
                $prefProv_id = 3;
                break;
            case 'Mashonaland Central':
                $prefProv_id = 4;
                break;
            case 'Mashonaland West':
                $prefProv_id = 5;
                break;
            case 'Matebeleland North':
                $prefProv_id = 6;
                break;
            case 'Matebeleland South':
                $prefProv_id = 7;
                break;
            case 'Midlands':
                $prefProv_id = 8;
                break;
            case 'Masvingo':
                $prefProv_id = 9;
                break;
            case 'Manicaland':
                $prefProv_id = 10;
                break;
        }
    }




    if (isset($_POST["current_province"])){
        $currentProvince = $_POST["current_province"];
        $_SESSION['current_province'][$currentProvince] = filter_input(INPUT_POST, 'current_province', FILTER_SANITIZE_STRING);

        switch ($currentProvince){
            case 'Harare':
                $currProv_id = 1;
                break;
            case 'Bulawayo':
                $currProv_id = 2;
                break;
            case 'Mashonaland East':
                $currProv_id = 3;
                break;
            case 'Mashonaland Central':
                $currProv_id = 4;
                break;
            case 'Mashonaland West':
                $currProv_id = 5;
                break;
            case 'Matebeleland North':
                $currProv_id = 6;
                break;
            case 'Matebeleland South':
                $currProv_id = 7;
                break;
            case 'Midlands':
                $currProv_id = 8;
                break;
            case 'Masvingo':
                $currProv_id = 9;
                break;
            case 'Manicaland':
                $currProv_id = 10;
                break;
        }
    }


    if (isset($_POST["preferred_district1"])){
        $preferredDistrict1 = $_POST["preferred_district1"];
        $_SESSION['preferred_district1'][$preferredDistrict1] = filter_input(INPUT_POST, 'preferred_district1', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_district2"])){
        $preferredDistrict2 = $_POST["preferred_district2"];
        $_SESSION['preferred_district2'][$preferredDistrict2] = filter_input(INPUT_POST, 'preferred_district2', FILTER_SANITIZE_STRING);
    }

    $currentDistrict = $_POST["current_district"];
    $_SESSION['current_district'][$currentDistrict] = filter_input(INPUT_POST, 'current_district', FILTER_SANITIZE_STRING);

    foreach($districts as $key=>$value){
        if(in_array($currentDistrict,$value)){
            $currDistr_id = $value['distr_id'];
        }
    }



    $currentSchool = $_POST["current_school"];
    $_SESSION['current_school'][$currentSchool] = filter_input(INPUT_POST, 'current_school', FILTER_SANITIZE_STRING);

    foreach($schools as $key=>$value){
        if(in_array($currentSchool,$value)){
            $currSch_id = $value['school_id'];
        }
    }


    if ($userFirstName == "" || $userLastName == "" || $ecNumber == "" || $mobileNumber == ""){

        $error_message = 'Please fill in all your Basic Details!';

    }



    if (empty($error_message) && $_POST["blank"] != ""){

        $error_message = "Bad form input";
        exit;
    }


    if (isset($_POST["subject1"])){
        $subject1 = $_POST["subject1"];
        $_SESSION['subject1'][$subject1] = filter_input(INPUT_POST, 'subject1', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject2"])){
        $subject2 = $_POST["subject2"];
        $_SESSION['subject2'][$subject2] = filter_input(INPUT_POST, 'subject2', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject3"])){
        $subject3 = $_POST["subject3"];
        $_SESSION['subject3'][$subject3] = filter_input(INPUT_POST, 'subject3', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject4"])){
        $subject4 = $_POST["subject4"];
        $_SESSION['subject4'][$subject4] = filter_input(INPUT_POST, 'subject4', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject5"])){
        $subject5 = $_POST["subject5"];
        $_SESSION['subject5'][$subject5] = filter_input(INPUT_POST, 'subject5', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject6"])){
        $subject6 = $_POST["subject6"];
        $_SESSION['subject6'][$subject6] = filter_input(INPUT_POST, 'subject6', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject7"])){
        $subject7 = $_POST["subject7"];
        $_SESSION['subject7'][$subject7] = filter_input(INPUT_POST, 'subject7', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject8"])){
        $subject8 = $_POST["subject8"];
        $_SESSION['subject8'][$subject8] = filter_input(INPUT_POST, 'subject8', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject9"])){
        $subject9 = $_POST["subject9"];
        $_SESSION['subject9'][$subject9] = filter_input(INPUT_POST, 'subject9', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject10"])){
        $subject10 = $_POST["subject10"];
        $_SESSION['subject10'][$subject10] = filter_input(INPUT_POST, 'subject10', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject11"])){
        $subject11 = $_POST["subject11"];
        $_SESSION['subject11'][$subject11] = filter_input(INPUT_POST, 'subject11', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject12"])){
        $subject12 = $_POST["subject12"];
        $_SESSION['subject12'][$subject12] = filter_input(INPUT_POST, 'subject12', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject13"])){
        $subject13 = $_POST["subject13"];
        $_SESSION['subject13'][$subject13] = filter_input(INPUT_POST, 'subject13', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject14"])){
        $subject14 = $_POST["subject14"];
        $_SESSION['subject14'][$subject14] = filter_input(INPUT_POST, 'subject14', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject15"])){
        $subject15 = $_POST["subject15"];
        $_SESSION['subject15'][$subject15] = filter_input(INPUT_POST, 'subject15', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject16"])){
        $subject16 = $_POST["subject16"];
        $_SESSION['subject16'][$subject16] = filter_input(INPUT_POST, 'subject16', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject17"])){
        $subject17 = $_POST["subject17"];
        $_SESSION['subject17'][$subject17] = filter_input(INPUT_POST, 'subject17', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject18"])){
        $subject18 = $_POST["subject18"];
        $_SESSION['subject18'][$subject18] = filter_input(INPUT_POST, 'subject18', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject19"])){
        $subject19 = $_POST["subject19"];
        $_SESSION['subject19'][$subject19] = filter_input(INPUT_POST, 'subject19', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject20"])){
        $subject20 = $_POST["subject20"];
        $_SESSION['subject20'][$subject20] = filter_input(INPUT_POST, 'subject20', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject21"])){
        $subject21 = $_POST["subject21"];
        $_SESSION['subject22'][$subject22] = filter_input(INPUT_POST, 'subject22', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject22"])){
        $subject22 = $_POST["subject22"];
        $_SESSION['subject22'][$subject22] = filter_input(INPUT_POST, 'subject22', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject23"])){
        $subject23 = $_POST["subject23"];
        $_SESSION['subject23'][$subject23] = filter_input(INPUT_POST, 'subject23', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject24"])){
        $subject24 = $_POST["subject24"];
        $_SESSION['subject24'][$subject24] = filter_input(INPUT_POST, 'subject24', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject25"])){
        $subject25 = $_POST["subject25"];
        $_SESSION['subject25'][$subject25] = filter_input(INPUT_POST, 'subject25', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject26"])){
        $subject26 = $_POST["subject26"];
        $_SESSION['subject26'][$subject26] = filter_input(INPUT_POST, 'subject26', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject27"])){
        $subject27 = $_POST["subject27"];
        $_SESSION['subject27'][$subject27] = filter_input(INPUT_POST, 'subject27', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject28"])){
        $subject28 = $_POST["subject28"];
        $_SESSION['subject28'][$subject28] = filter_input(INPUT_POST, 'subject28', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject29"])){
        $subject29 = $_POST["subject29"];
        $_SESSION['subject29'][$subject29] = filter_input(INPUT_POST, 'subject29', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject30"])){
        $subject30 = $_POST["subject30"];
        $_SESSION['subject30'][$subject30] = filter_input(INPUT_POST, 'subject30', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject31"])){
        $subject31 = $_POST["subject31"];
        $_SESSION['subject31'][$subject31] = filter_input(INPUT_POST, 'subject31', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject32"])){
        $subject32 = $_POST["subject32"];
        $_SESSION['subject32'][$subject32] = filter_input(INPUT_POST, 'subject32', FILTER_SANITIZE_STRING);
    }
    if (isset($_POST["subject33"])){
        $subject33 = $_POST["subject33"];
        $_SESSION['subject33'][$subject33] = filter_input(INPUT_POST, 'subject33', FILTER_SANITIZE_STRING);
    }

    //declares variables if specific locations option is chosen to be used to check for duplicated options later in the code.
    if (isset($_POST["preferred_location1"])){
        $preferred_locations1 = $_POST["preferred_location1"];
        $_SESSION['preferred_location1'][$preferred_locations1] = filter_input(INPUT_POST, 'preferred_location1', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_location2"])){
        $preferred_locations2 = $_POST["preferred_location2"];
        $_SESSION['preferred_location2'][$preferred_locations2] = filter_input(INPUT_POST, 'preferred_location2', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_location3"])){
        $preferred_locations3 = $_POST["preferred_location3"];
        $_SESSION['preferred_location3'][$preferred_locations3] = filter_input(INPUT_POST, 'preferred_location3', FILTER_SANITIZE_STRING);
    }

    //declares variables if specific schools option is chosen to be used to check for duplicated options later in the code
    if (isset($_POST["preferred_schools1"])){
        $preferred_schools1 = $_POST["preferred_schools1"];
        $_SESSION['preferred_schools1'][$preferred_schools1] = filter_input(INPUT_POST, 'preferred_schools1', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools2"])){
        $preferred_schools2 = $_POST["preferred_schools2"];
        $_SESSION['preferred_schools2'][$preferred_schools2] = filter_input(INPUT_POST, 'preferred_schools2', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools3"])){
        $preferred_schools3 = $_POST["preferred_schools3"];
        $_SESSION['preferred_schools3'][$preferred_schools3] = filter_input(INPUT_POST, 'preferred_schools3', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools4"])){
        $preferred_schools4 = $_POST["preferred_schools4"];
        $_SESSION['preferred_schools4'][$preferred_schools4] = filter_input(INPUT_POST, 'preferred_schools4', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools5"])){
        $preferred_schools5 = $_POST["preferred_schools5"];
        $_SESSION['preferred_schools5'][$preferred_schools5] = filter_input(INPUT_POST, 'preferred_schools5', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools6"])){
        $preferred_schools6 = $_POST["preferred_schools6"];
        $_SESSION['preferred_schools6'][$preferred_schools6] = filter_input(INPUT_POST, 'preferred_schools6', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools7"])){
        $preferred_schools7 = $_POST["preferred_schools7"];
        $_SESSION['preferred_schools7'][$preferred_schools7] = filter_input(INPUT_POST, 'preferred_schools7', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools8"])){
        $preferred_schools8 = $_POST["preferred_schools8"];
        $_SESSION['preferred_schools8'][$preferred_schools8] = filter_input(INPUT_POST, 'preferred_schools8', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools9"])){
        $preferred_schools9 = $_POST["preferred_schools9"];
        $_SESSION['preferred_schools9'][$preferred_schools9] = filter_input(INPUT_POST, 'preferred_schools9', FILTER_SANITIZE_STRING);
    }

    if (isset($_POST["preferred_schools10"])){
        $preferred_schools10 = $_POST["preferred_schools10"];
        $_SESSION['preferred_schools10'][$preferred_schools10] = filter_input(INPUT_POST, 'preferred_schools10', FILTER_SANITIZE_STRING);
    }

    //creates selected preferred schools into an array to check for duplicate values
    $unique_pref_schools = [];
    if (isset($_POST["preferred_schools1"])){
        $unique_pref_schools[] = $preferred_schools1;
    }
    if (isset($_POST["preferred_schools2"])){
        $unique_pref_schools[] = $preferred_schools2;
    }
    if (isset($_POST["preferred_schools3"])){
        $unique_pref_schools[] = $preferred_schools3;
    }
    if (isset($_POST["preferred_schools4"])){
        $unique_pref_schools[] = $preferred_schools4;
    }
    if (isset($_POST["preferred_schools5"])){
        $unique_pref_schools[] = $preferred_schools5;
    }
    if (isset($_POST["preferred_schools6"])){
        $unique_pref_schools[] = $preferred_schools6;
    }
    if (isset($_POST["preferred_schools7"])){
        $unique_pref_schools[] = $preferred_schools7;
    }
    if (isset($_POST["preferred_schools8"])){
        $unique_pref_schools[] = $preferred_schools8;
    }
    if (isset($_POST["preferred_schools9"])){
        $unique_pref_schools[] = $preferred_schools9;
    }
    if (isset($_POST["preferred_schools10"])){
        $unique_pref_schools[] = $preferred_schools10;
    }

    //creates selected preferred locations into an array to check for duplicate values

    $unique_pref_locations = [];
    if (isset($_POST["preferred_location1"])){
        $unique_pref_locations[] = $preferred_locations1;
    }
    if (isset($_POST["preferred_location2"])){
        $unique_pref_locations[] = $preferred_locations2;
    }
    if (isset($_POST["preferred_location3"])){
        $unique_pref_locations[] = $preferred_locations3;
    }


    if (isset($_POST["preferred_district1"])){
        $prefDistrict1 = $_POST["preferred_district1"];

        foreach($districts as $key=>$value){
            if(in_array($prefDistrict1,$value)){
                $prefDistr1_id = $value['distr_id'];
            }
        }
    }


    if (isset($_POST["preferred_district2"]) && !empty($prefDistrict1)){
        $prefDistrict2 = $_POST["preferred_district2"];

        foreach($districts as $key=>$value){
            if(in_array($prefDistrict2,$value)){
                $prefDistr2_id = $value['distr_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_district2"]) && empty($prefDistrict1)){
        $error_message = 'You can not choose District second option without choosing a first option';
        //exit;
    }




    if (empty($error_message) && isset($_POST["preferred_town"])){
        $prefTown = $_POST["preferred_town"];

        foreach($towns as $key=>$value){
            if(in_array($prefTown,$value)){
                $prefTown_id = $value['town_id'];
            }
        }
    }



    if (empty($error_message) && isset($_POST["preferred_location1"])){
        $prefLocations1 = $_POST["preferred_location1"];

        foreach($locations as $key=>$value){
            if(in_array($prefLocations1,$value)){
                $prefLoc1_id = $value['loc_id'];
            }
        }
    }



    if (empty($error_message) && isset($_POST["preferred_location2"]) && !empty($prefLocations1)){
        $prefLocations2 = $_POST["preferred_location2"];

        foreach($locations as $key=>$value){
            if(in_array($prefLocations2,$value)){
                $prefLoc2_id = $value['loc_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_location2"]) && empty($prefLocations1)){
        $error_message = 'You can not choose Location second option without choosing a first option';
        //exit;
    }



    if (empty($error_message) && isset($_POST["preferred_location3"]) && !empty($prefLocations2)){
        $prefLocations3 = $_POST["preferred_location3"];

        foreach($locations as $key=>$value){
            if(in_array($prefLocations3,$value)){
                $prefLoc3_id = $value['loc_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_location3"]) && empty($prefLocations2)){
        $error_message = 'You can not choose Location third option without choosing a second option';
        //exit;
    }



    if (empty($error_message) && isset($_POST["preferred_schools1"])){
        $prefSchools1 = $_POST["preferred_schools1"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools1,$value)){
                $prefSchool1_id = $value['school_id'];
            }
        }
    }



    if (empty($error_message) && isset($_POST["preferred_schools2"]) && !empty($prefSchools1)){
        $prefSchools2 = $_POST["preferred_schools2"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools2,$value)){
                $prefSchool2_id = $value['school_id'];
            }
        }
    }elseif(empty($error_message) && isset($_POST["preferred_schools2"]) && empty($prefSchools1)){
        $error_message = 'You can not choose Schools second option without choosing a first option';
    }



    if (empty($error_message) && isset($_POST["preferred_schools3"]) && !empty($prefSchools2)){
        $prefSchools3 = $_POST["preferred_schools3"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools3,$value)){
                $prefSchool3_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools3"]) && empty($prefSchools2)){
        $error_message = 'You can not choose Schools third option without choosing a second option';
    }



    if (empty($error_message) && isset($_POST["preferred_schools4"]) && !empty($prefSchools3)){
        $prefSchools4 = $_POST["preferred_schools4"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools4,$value)){
                $prefSchool4_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools4"]) && empty($prefSchools3)){
        $error_message = 'You can not choose Schools fourth option without choosing a third option';
    }



    if (empty($error_message) && isset($_POST["preferred_schools5"]) && !empty($prefSchools4)){
        $prefSchools5 = $_POST["preferred_schools5"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools5,$value)){
                $prefSchool5_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools5"]) && empty($prefSchools4)){
        $error_message = 'You can not choose Schools fifth option without choosing a fourth option';
    }

    if (empty($error_message) && isset($_POST["preferred_schools6"]) && !empty($prefSchools5)){
        $prefSchools6 = $_POST["preferred_schools6"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools6,$value)){
                $prefSchool6_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools6"]) && empty($prefSchools5)){
        $error_message = 'You can not choose Schools sixth option without choosing a fifth option';
    }



    if (empty($error_message) && isset($_POST["preferred_schools7"]) && !empty($prefSchools6)){
        $prefSchools7 = $_POST["preferred_schools7"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools7,$value)){
                $prefSchool7_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools7"]) && empty($prefSchools6)){
        $error_message = 'You can not choose Schools seventh option without choosing a sixth option';
    }



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



    if (empty($error_message) && isset($_POST["preferred_schools9"]) && !empty($prefSchools8)){
        $prefSchools9 = $_POST["preferred_schools9"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools9,$value)){
                $prefSchool9_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools9"]) && empty($prefSchools8)){
        $error_message = 'You can not choose Schools ninth option without choosing an eighth option';
    }



    if (empty($error_message) && isset($_POST["preferred_schools10"]) && !empty($prefSchools9)){
        $prefSchools10 = $_POST["preferred_schools10"];

        foreach($schools as $key=>$value){
            if(in_array($prefSchools10,$value)){
                $prefSchool10_id = $value['school_id'];
            }
        }
    }elseif (empty($error_message) && isset($_POST["preferred_schools10"]) && empty($prefSchools9)){
        $error_message = 'You can not choose Schools tenth option without choosing a ninth option';
    }

    //checks to make sure that a preferred option is selected first before creating any records in databases
    if (empty($error_message) && empty($_POST["preferred_province"]) && empty($_POST["preferred_town"]) &&
        empty($_POST["preferred_district1"]) &&
        empty($_POST["preferred_location1"]) &&
        empty($_POST["preferred_schools1"])){
        $error_message = 'Invalid form input: Please select your preferances for relocation first';
    }

    //checks for duplicated preferred locations options and returns an error if any are found
    if(count($unique_pref_locations) != count(array_unique($unique_pref_locations))){
        $error_message = 'Invalid form input: Preferred Locations options must be all unique! Please recheck your preferred locations options';
    }

    //checks for duplicated preferred schools options and returns an error if any are found
    if(count($unique_pref_schools) != count(array_unique($unique_pref_schools))){
        $error_message = 'Invalid form input: Preferred Schools options must all be unique! Please recheck your preferred schools options.';
    }

    //checks if the preferred province is unique from the current province and returns error if not unique
    if (empty($error_message) && isset($_POST["preferred_province"]) && $_POST["preferred_province"] == $_POST["current_province"]){
        $error_message = 'Invalid form input: Preferred Province may not be the same as Current Province';
    }

    //checks for duplicated preferred districts options and returns an error if any are found
    if (empty($error_message) && (isset($_POST["preferred_district1"]) && isset($_POST["preferred_district2"])) &&
        (($_POST["preferred_district1"] == $_POST["preferred_district2"]))){
        $error_message = 'Invalid form input: Both Preferred District Options may not refer to the same District name';
    }

    //checks if the preferred district is unique from the current district and returns error if not unique
    if (empty($error_message) && (isset($_POST["preferred_district1"]) || isset($_POST["preferred_district2"])) &&
        (($_POST["preferred_district1"] == $_POST["current_district"] || $_POST["preferred_district2"] == $_POST["current_district"]))){
        $error_message = 'Invalid form input: Preferred District may not be the same as Current District';
    }

    //checks if the preferred school(s) is/are unique from the current school(s) and returns error if not unique
    /*if (empty($error_message) && (isset($_POST["preferred_schools1"]) || isset($_POST["preferred_schools2"]) ||
            isset($_POST["preferred_schools3"]) || isset($_POST["preferred_schools4"]) ||
            isset($_POST["preferred_schools5"]) || isset($_POST["preferred_schools6"]) ||
            isset($_POST["preferred_schools7"]) || isset($_POST["preferred_schools8"]) ||
            isset($_POST["preferred_schools9"]) || isset($_POST["preferred_schools10"])) &&
            (($_POST["preferred_schools1"] == $_POST["current_school"] ||
                $_POST["preferred_schools2"] == $_POST["current_school"] ||
                $_POST["preferred_schools3"] == $_POST["current_school"] ||
                $_POST["preferred_schools4"] == $_POST["current_school"] ||
                $_POST["preferred_schools5"] == $_POST["current_school"] ||
                $_POST["preferred_schools6"] == $_POST["current_school"] ||
                $_POST["preferred_schools7"] == $_POST["current_school"] ||
                $_POST["preferred_schools8"] == $_POST["current_school"] ||
                $_POST["preferred_schools9"] == $_POST["current_school"] ||
                $_POST["preferred_schools10"] == $_POST["current_school"]))){
        $error_message = 'Invalid form input: Preferred School may not be the same as Current School';
    } */

    $dateCreated = date('d-m-Y H:i:s');
    $status = "OPEN";
    $dateMatched = "";


    if (empty($error_message) && isset($_POST["preferred_province"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_prov($prefProv_id, $ecNumber);
    }else if(empty($error_message) && !empty($_POST["preferred_province"])){
        client_pref_prov($prefProv_id, $ecNumber, $levelTaught);
    }

    if (empty($error_message) && isset($_POST["preferred_town"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_town($prefTown_id, $ecNumber);
    }else if(empty($error_message) && !empty($_POST["preferred_town"])){
        client_pref_town($prefTown_id, $ecNumber, $levelTaught);
    }

    if (empty($error_message) && isset($_POST["preferred_district1"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_distr1($prefDistr1_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_district1"])){
        client_pref_distr1($prefDistr1_id, $ecNumber, $levelTaught);
    }

    if (empty($error_message) && isset($_POST["preferred_district2"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_distr2($prefDistr2_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_district2"]) && !empty($_POST["preferred_district1"])){
        client_pref_distr2($prefDistr2_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_district2"]) && empty($_POST["preferred_district1"])){
        $error_message = 'Invalid form input: You cannot select option 2 before option 1';
    }
    if (empty($error_message) && isset($_POST["preferred_location1"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_loc1($prefLoc1_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_location1"])){
        client_pref_loc1($prefLoc1_id, $ecNumber, $levelTaught);
    }

    if (empty($error_message) && isset($_POST["preferred_location2"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include ('inc/selected_subs.php');
        client_pref_loc2($prefLoc2_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_location2"]) && !empty($_POST["preferred_location1"])){
        client_pref_loc2($prefLoc2_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_location2"]) && empty($_POST["preferred_location1"])){
        $error_message = 'Invalid form input: You cannot select option 2 before option 1';
    }

    if (empty($error_message) && isset($_POST["preferred_location3"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include_once ('inc/selected_subs.php');
        client_pref_loc3($prefLoc3_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_location3"]) && !empty($_POST["preferred_location2"])){
        client_pref_loc3($prefLoc3_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_location3"]) && empty($_POST["preferred_location2"])){
        $error_message = 'Invalid form input: You cannot select option 3 before option 2';
    }

    if (empty($error_message) && isset($_POST["preferred_schools1"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))){
        include('inc/selected_subs.php');
        client_pref_sch1($prefSchool1_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools1"])){
        client_pref_sch1($prefSchool1_id, $ecNumber, $levelTaught);
    }

    if (empty($error_message) && isset($_POST["preferred_schools2"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools1"]))){
        include('inc/selected_subs.php');
        client_pref_sch2($prefSchool2_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools2"]) && !empty($_POST["preferred_schools1"])){
        client_pref_sch1($prefSchool2_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools2"]) && empty($_POST["preferred_schools1"])){
        $error_message = 'Invalid form input: You cannot select option 2 before option 1';
    }

    if (empty($error_message) && isset($_POST["preferred_schools3"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools2"]))){
        include('inc/selected_subs.php');
        client_pref_sch3($prefSchool3_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools3"]) && !empty($_POST["preferred_schools2"])){
        client_pref_sch3($prefSchool3_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools3"]) && empty($_POST["preferred_schools2"])){
        $error_message = 'Invalid form input: You cannot select option 3 before option 2';
    }

    if (empty($error_message) && isset($_POST["preferred_schools4"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools3"]))){
        include('inc/selected_subs.php');
        client_pref_sch4($prefSchool4_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools4"]) && !empty($_POST["preferred_schools3"])){
        client_pref_sch4($prefSchool4_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools4"]) && empty($_POST["preferred_schools3"])){
        $error_message = 'Invalid form input: You cannot select option 4 before option 3';
    }

    if (empty($error_message) && isset($_POST["preferred_schools5"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools4"]))){
        include('inc/selected_subs.php');
        client_pref_sch5($prefSchool5_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools5"]) && !empty($_POST["preferred_schools4"])){
        client_pref_sch5($prefSchool5_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools5"]) && empty($_POST["preferred_schools4"])){
        $error_message = 'Invalid form input: You cannot select option 5 before option 4';
    }

    if (empty($error_message) && isset($_POST["preferred_schools6"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools5"]))){
        include('inc/selected_subs.php');
        client_pref_sch6($prefSchool6_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools6"]) && !empty($_POST["preferred_schools5"])){
        client_pref_sch6($prefSchool6_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools6"]) && empty($_POST["preferred_schools5"])){
        $error_message = 'Invalid form input: You cannot select option 6 before option 5';
    }

    if (empty($error_message) && isset($_POST["preferred_schools7"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools6"]))){
        include('inc/selected_subs.php');
        client_pref_sch7($prefSchool7_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools7"]) && !empty($_POST["preferred_schools6"])){
        client_pref_sch7($prefSchool7_id, $ecNumber, $levelTaught);
    }elseif (!empty($_POST["preferred_schools7"]) && empty($_POST["preferred_schools6"])){
        $error_message = 'Invalid form input: You cannot select option 7 before option 6';
    }

    if (empty($error_message) && isset($_POST["preferred_schools8"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools7"]))){
        include('inc/selected_subs.php');
        client_pref_sch8($prefSchool8_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools8"]) && !empty($_POST["preferred_schools7"])){
        client_pref_sch8($prefSchool8_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools8"]) && empty($_POST["preferred_schools7"])){
        $error_message = 'Invalid form input: You cannot select option 8 before option 7';
    }

    if (empty($error_message) && isset($_POST["preferred_schools9"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools8"]))){
        include('inc/selected_subs.php');
        client_pref_sch9($prefSchool9_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools9"]) && !empty($_POST["preferred_schools8"])){
        client_pref_sch9($prefSchool9_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools9"]) && empty($_POST["preferred_schools8"])){
        $error_message = 'Invalid form input: You cannot select option 9 before option 8';
    }

    if (empty($error_message) && isset($_POST["preferred_schools10"]) && (($_POST["level_taught"] == "High School - ZJC") ||
            ($_POST["level_taught"] == "High School - O Level")||
            ($_POST["level_taught"] == "High School - A Level"))
        && (!empty($_POST["preferred_schools9"]))){
        include('inc/selected_subs.php');
        client_pref_sch10($prefSchool10_id, $ecNumber);
    }else if (empty($error_message) && !empty($_POST["preferred_schools10"]) && !empty($_POST["preferred_schools9"])){
        client_pref_sch10($prefSchool10_id, $ecNumber, $levelTaught);
    }elseif (empty($error_message) && !empty($_POST["preferred_schools10"]) && empty($_POST["preferred_schools9"])){
        $error_message = 'Invalid form input: You cannot select option 10 before option 9';
    }

    //inserts a client into the clients database if there is no error in the form
    if (empty($error_message)){
        create_client($ecNumber,
            $userFirstName,
            $userLastName,
            $gender,
            $mobileNumber,
            $userEmail,
            $userPassword,
            $levelTaught,
            $dateCreated,
            $status,
            $dateMatched);
    }

    //inserts a record into the current schools database if there is no error in the form
    if (empty($error_message)){
        client_curr_sch($ecNumber, $currSch_id, $currDistr_id, $currProv_id, $levelTaught, $sub1_id, $sub2_id);
    }

    session_destroy();
    //redirects to the thank you page if the registration process has been succesful
    if(empty($error_message)){
        //header("location:Account_manage.php?status=thanks");
        header("location:Account_manage.php");
        exit;
    }
}

$pageTitle = "SwopMatch Handler | Sign In";
include 'inc/header.php';

if(isset($_GET['id'])){
    list($client_id,
        $client_ec_no,
        $client_first_name,
        $client_last_name,
        $client_sex,
        $client_mobile_no,
        $client_email,
        $client_password,
        $client_level_taught,
        $mpp_id,
        $mpp_province_id,
        $mpd_id,
        $mpd_distr_id,
        $mpd2_id,
        $mpd2_distr_id,
        $mpt_id,
        $mpt_town_id,
        $mpl_id,
        $mpl_loc_id,
        $mpl2_id,
        $mpl2_loc_id,
        $mpl3_id,
        $mpl3_loc_id,
        $mps_id,
        $mps_school_id,
        $mps2_id,
        $mps2_school_id,
        $mps3_id,
        $mps3_school_id,
        $mps4_id,
        $mps4_school_id,
        $mps5_id,
        $mps5_school_id,
        $mps6_id,
        $mps6_school_id,
        $mps7_id,
        $mps7_school_id,
        $mps8_id,
        $mps8_school_id,
        $mps9_id,
        $mps9_school_id,
        $mps10_id,
        $mps10_school_id) = get_client(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));

}
/*
$mps = get_pref_schools(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));
$mpd = get_pref_districts(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));
  if($mpd){
    $prefDistr1 = intval($mpd[0]['mpd_distr_id']);
    $prefDistr2 = intval($mpd[1]['mpd_distr_id']);
    $mpd_id1 = intval($mpd[0]['mpd_id']);
    $mpd_id2 = intval($mpd[1]['mpd_id']);
  }
$mpl = get_pref_locations(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));



if(isset($_GET['id'])){
  list($mps[0]['mps_id'],
        $mps[0]['mps_school_id'],
        $mps[1]['mps_id'],
        $mps[1]['mps_school_id'],
        $mps[2]['mps_id'],
        $mps[2]['mps_school_id'],
        $mps[3]['mps_id'],
        $mps[3]['mps_school_id'],
        $mps[4]['mps_id'],
        $mps[4]['mps_school_id'],
        $mps[5]['mps_id'],
        $mps[5]['mps_school_id'],
        $mps[6]['mps_id'],
        $mps[6]['mps_school_id'],
        $mps[7]['mps_id'],
        $mps[7]['mps_school_id'],
        $mps[8]['mps_id'],
        $mps[8]['mps_school_id'],
        $mps[9]['mps_id'],
        $mps[9]['mps_school_id']) = get_pref_schools(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));

}



if(isset($_GET['id'])){
  list($mpp_id,
        $mpp_province_id
        ) = get_pref_province(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));
}


if(isset($_GET['id'])){
  list($mpd_id,
        $mpd_distr_id,
        $match_sub1_id,
        $match_sub1_id) = get_reg_distr(filter_input(INPUT_GET,'id', FILTER_SANITIZE_STRING));
 */
if (isset($_GET['id'])){
    $mcs_match_ec_no = $_GET['id'];
    foreach($mcs as $key=>$value){                                             //starts a check to see if the client has registered based on preferred provinces
        if(in_array($mcs_match_ec_no,$value)){                                       //extracts province and taught subjects ids to be used to get actual related names
            $match_sub1_id = $value['mcs_sub1_id'];
            //$_SESSION['mcs_sub1_id'][$match_sub1_id] = filter_input(INPUT_POST, 'mcs_sub1_id', FILTER_SANITIZE_NUMBER_INT);
            $match_sub2_id = $value['mcs_sub2_id'];
            //$_SESSION['mcs_sub2_id'][$match_sub2_id] = filter_input(INPUT_POST, 'mcs_sub2_id', FILTER_SANITIZE_NUMBER_INT);
            $curr_school_id = $value['mcs_school_id'];
            //$_SESSION['mcs_school_id'][$curr_school_id] = filter_input(INPUT_POST, 'mcs_school_id', FILTER_SANITIZE_NUMBER_INT);
            $curr_province_id = $value['mcs_province_id'];
            //$_SESSION['mcs_province_id'][$curr_province_id] = filter_input(INPUT_POST, 'mcs_province_id', FILTER_SANITIZE_NUMBER_INT);
            $curr_distr_id = $value['mcs_distr_id'];
            // $_SESSION['mcs_distr_id'][$curr_distr_id] = filter_input(INPUT_POST, 'mcs_distr_id', FILTER_SANITIZE_NUMBER_INT);

            foreach($provinces as $key=>$value){                                  //retrieves province name based on province id
                if(in_array($curr_province_id,$value)){
                    $curr_province_name = $value['province_name'];
                    //$_SESSION['province_name'][$curr_province_name] = filter_input(INPUT_POST, 'province_name', FILTER_SANITIZE_STRING);
                }
            }

            foreach($schools as $key=>$value){                                  //retrieves province name based on province id
                if(in_array($curr_school_id,$value)){
                    $curr_school_name = $value['school_name'];
                    //$_SESSION['school_name'][$curr_school_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
                }
            }

            foreach($districts as $key=>$value){                                  //retrieves province name based on province id
                if(in_array($curr_distr_id,$value)){
                    $curr_distr_name = $value['distr_name'];
                    //$_SESSION['distr_name'][$curr_distr_name] = filter_input(INPUT_POST, 'distr_name', FILTER_SANITIZE_STRING);
                }
            }

            if($match_sub1_id != NULL){                                             //if client level taught is not primary; retrieves taught subjects names
                foreach($subjects as $key=>$value){
                    if(in_array($match_sub1_id,$value)){
                        $match_sub1_name = $value['sub_name'];
                        //$_SESSION['sub_name'][$match_sub1_name] = filter_input(INPUT_POST, 'sub_name', FILTER_SANITIZE_STRING);
                    }
                    if(in_array($match_sub2_id,$value)){
                        $match_sub2_name = $value['sub_name'];
                        //$_SESSION['sub_name'][$match_sub2_name] = filter_input(INPUT_POST, 'sub_name', FILTER_SANITIZE_STRING);
                    }
                }
            }
        }

        $mcs_client_details = [];                                                 //creates an array of the client's preferred province and subjects taught
        $mcs_client_details[] = $curr_province_name;
        $mcs_client_details[] = $curr_distr_name;
        $mcs_client_details[] = $curr_school_name;
    }
}


/*      if (isset($_GET['id'])){
        $mpp_match_ec_no = $_GET['id'];
          foreach($mpp as $key=>$value){                                             //starts a check to see if the client has registered based on preferred provinces
            if(in_array($mpp_match_ec_no,$value)){                                       //extracts province and taught subjects ids to be used to get actual related names
                $pref_province_id = $value['mpp_province_id'];
                foreach($provinces as $key=>$value){                                  //retrieves province name based on province id
                  if(in_array($pref_province_id,$value)){
                    $pref_province_name = trim($value['province_name']);
              }
            }
          }
        }
      }




      if (isset($_GET['id'])){
        $mpt_match_ec_no = $_GET['id'];
          foreach($mpt as $key=>$value){                                             //starts a check to see if the client has registered based on preferred towns
            if(in_array($mpt_match_ec_no,$value)){                                       //extracts town and taught subjects ids to be used to get actual related names
                $pref_town_id = $value['mpt_town_id'];

                foreach($towns as $key=>$value){                                      //retrieves town name based on town id
                unset($value['town_province_id']);
                  if(in_array($pref_town_id,$value)){
                    $pref_town_name = $value['town_name'];
              }
            }
          }
        }
      }



      if (isset($_GET['id'])){
        $mps_match_ec_no = $_GET['id'];
          foreach($mps as $key=>$value){                                             //starts a check to see if the client has registered based on preferred schools
            if($value['mps_client_ec_no'] != $mps_match_ec_no){unset($mps[$key]);
              $mps = array_values($mps);
            }
                if(isset($mps[0]['mps_school_id'])){$pref_school1_id = $mps[0]['mps_school_id'];}
                if(isset($mps[1]['mps_school_id'])){$pref_school2_id = $mps[1]['mps_school_id'];}
                if(isset($mps[2]['mps_school_id'])){$pref_school3_id = $mps[2]['mps_school_id'];}
                if(isset($mps[3]['mps_school_id'])){$pref_school4_id = $mps[3]['mps_school_id'];}
                if(isset($mps[4]['mps_school_id'])){$pref_school5_id = $mps[4]['mps_school_id'];}
                if(isset($mps[5]['mps_school_id'])){$pref_school6_id = $mps[5]['mps_school_id'];}
                if(isset($mps[6]['mps_school_id'])){$pref_school7_id = $mps[6]['mps_school_id'];}
                if(isset($mps[7]['mps_school_id'])){$pref_school8_id = $mps[7]['mps_school_id'];}
                if(isset($mps[8]['mps_school_id'])){$pref_school9_id = $mps[8]['mps_school_id'];}
                if(isset($mps[9]['mps_school_id'])){$pref_school10_id = $mps[9]['mps_school_id'];}
                //$match_sub1_id = $value['mps_sub1_id'];
                //$match_sub2_id = $value['mps_sub2_id'];
                foreach($schools as $key=>$value){                                      //retrieves school name based on town id
                if(in_array($pref_school1_id,$value)){
                    $pref_school1_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school1_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school2_id,$value)){
                    $pref_school2_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school2_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school3_id,$value)){
                    $pref_school3_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school3_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school4_id,$value)){
                    $pref_school4_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school4_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school5_id,$value)){
                    $pref_school5_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school5_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school6_id,$value)){
                    $pref_school6_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school6_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school7_id,$value)){
                    $pref_school7_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school7_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school8_id,$value)){
                    $pref_school8_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school8_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school9_id,$value)){
                    $pref_school9_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school9_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
                if(in_array($pref_school10_id,$value)){
                    $pref_school10_name = $value['school_name'];
                    $_SESSION['school_name'][$pref_school10_name] = filter_input(INPUT_POST, 'school_name', FILTER_SANITIZE_STRING);
              }
            }
        }
      }


      if (isset($_GET['id'])){
        $mpd_match_ec_no = $_GET['id'];
          foreach($mpd as $key=>$value){                                             //starts a check to see if the client has registered based on preferred districts
            if($value['mpd_client_ec_no'] != $mpd_match_ec_no){unset($mpd[$key]);
              $mpd = array_values($mpd);
            }
                if(isset($mpd[0]['mpd_distr_id'])){$pref_distr1_id = $mpd[0]['mpd_distr_id'];}
                if(isset($mpd[1]['mpd_distr_id'])){$pref_distr2_id = $mpd[1]['mpd_distr_id'];}

                foreach($districts as $key=>$value){                                      //retrieves school name based on district id
                if(in_array($pref_distr1_id,$value)){
                    $pref_distr1_name = $value['distr_name'];
              }
                if(in_array($pref_distr2_id,$value)){
                    $pref_distr2_name = $value['distr_name'];
              }
            }
        }
      }


if (isset($_GET['id'])){
        $mpl_match_ec_no = $_GET['id'];
          foreach($mpl as $key=>$value){                                             //starts a check to see if the client has registered based on preferred locations
            if($value['mpl_client_ec_no'] != $mpl_match_ec_no){
              unset($mpl[$key]);
              $mpl = array_values($mpl);

            }
                if(isset($mpl[0]['mpl_loc_id'])){$pref_loc1_id = $mpl[0]['mpl_loc_id'];}
                if(isset($mpl[1]['mpl_loc_id'])){$pref_loc2_id = $mpl[1]['mpl_loc_id'];}
                if(isset($mpl[2]['mpl_loc_id'])){$pref_loc3_id = $mpl[2]['mpl_loc_id'];}

                foreach($locations as $key=>$value){                                      //retrieves school name based on location id
                if(in_array($pref_loc1_id,$value)){
                    $pref_loc1_name = $value['loc_name'];
              }
                if(in_array($pref_loc2_id,$value)){
                    $pref_loc2_name = $value['loc_name'];
              }

              if(in_array($pref_loc3_id,$value)){
                    $pref_loc3_name = $value['loc_name'];
              }
            }
        }
      }
//}

*/

echo "<pre>";
//var_dump($sub1_id);
echo "</pre>";
echo "<pre>";
//print_r($sub2_id);
echo "</pre>";
echo "<pre>";
//print_r($e);
echo "</pre>";
echo "<pre>";
//print_r($sql_updates_mcs).'<br>';
echo "</pre>";
echo "<pre>";
//print_r(error_get_last());
echo "</pre>";


?>


<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid bg-warning">
    <div class="container text-sm-center p-t-1">
        <?php if (isset($_GET["status"]) && $_GET["status"] == "thanks"){
            echo '<p>Thank you for registering with us! We will contact you as soon as a match is found!</p>';
            exit;
        }elseif(!empty($error_message)){
            echo '<div class = "hidden message">';
            echo '<span class = "error">'.$error_message.'</span>';
            echo '</div>';
        }elseif(!empty($client_ec_no)){
            echo '<h1> Update ';
        }else{
            echo '<h1>Register ';
        }
        if(empty($error_message)){
            echo 'Client!';
        }?></h1>

        <form action = "Account_manage.php" method = "post">
            <fieldset>
                <legend><span class = "number" >1</span>Your Preferred Station Details</legend>
                <table>
                    <tr>
                        <th class = "h2" colspan = 5>Choose Preferred Schools By:</th>
                    <tr>
                        <td><button type="button" class="btn btn-primary" onclick="Prefs()" class = "prefButtons">Province</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="Prefs1()" class = "prefButtons">Districts</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="Prefs2()" class = "prefButtons">Town</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="Prefs3()" class = "prefButtons">Locations</button></td>
                        <td><button type="button" class="btn btn-primary" onclick="Prefs4()" class = "prefButtons">Specific Schools</button></td>
                    </tr>
                    </tr>
                </table><br>
                <div id="provinces" <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if($_POST['preferred_province']){
                        echo 'style = "display:block"';
                    }else{
                        echo 'style = "display:none"';
                    }
                }elseif(!empty($mpp_id)){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';}?> style = "display:none">
                    <hr>
                    <label for ="preferred_province" class = "h2">Select Your Preferred Province</label>
                    <table class="table">
                        <tr>
                            <th>Option</th>
                            <td><select id="preferred_province" name="preferred_province" class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php all_provinces($provinces);?>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div id="districts" <?php  if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['preferred_district1'])){
                        echo 'style = "display:block"';
                    }else{
                        echo 'style = "display:none"';
                    }
                }elseif($mpd_id){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';
                }?>>

                    <hr>
                    <label for = "preferred_district" class = "h2">Select Your Preferred District(s) - Up To Two Options</label>
                    <table class="table">
                        <tr>
                            <th> Option 1</th>
                            <td><select id="preferred_district1" name="preferred_district1" onchange="prefDistricts()" class="mySelect">
                                    <option value="" selected disabled>Please select one option -- (only if applicable)</option>
                                    <?php all_districts($districts);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 2</th>
                            <td><select id="preferred_district2" name="preferred_district2" class="mySelect" <?php if(!$mpd_distr_id){echo 'disabled';} ?>>
                                    <option value="" selected disabled>Please select one option -- (only if applicable)</option>
                                    <?php all_districts1($districts);?>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div id="towns" <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['preferred_town'])){
                        echo 'style = "display:block"';
                    }else{
                        echo 'style = "display:none"';
                    }
                }elseif($mpt_town_id){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';
                }
                ?> style = "display:none">

                    <hr>
                    <label for = "town_name" class = "h2">Select Your Preferred Town</label>
                    <table class="table">
                        <tr>
                            <th>Option</th>
                            <td><select id="town_name" name="preferred_town" onchange="toggleDisability(this);"  class="mySelect">
                                    <option value="" selected disabled>Please select one option -- (only if applicable)</option>
                                    <?php all_towns($towns);?>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div id="locations" <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['preferred_location1'])){
                        echo 'style = "display:block"';
                    }else{
                        echo 'style = "display:none"';
                    }
                }elseif($mpl_id){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';}?>>
                    <hr>
                    <label for = "location_name" class = "h2">Select Your Preferred Location(s) - Up To Three Options</label>
                    <table class="table">
                        <tr id = "loc1">
                            <th>Option 1</th>
                            <td><select id="loc_name1" name="preferred_location1"  onchange="prefLocs()"  class="mySelect">
                                    <option value="" selected disabled>Please select one option -- (only if applicable)</option>
                                    <?php all_locations($locations);?>
                                </select></td>
                        </tr>
                        <tr id = 'loc2'>
                            <th>Option 2</th>
                            <td><select id="loc_name2" name="preferred_location2" onchange="prefLocs1()" <?php if(!$mpl_loc_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected disabled>Please select another option -- (only if applicable)</option>
                                    <?php all_locations1($locations);?>
                                </select></td>
                        </tr>
                        <tr id = "loc3">
                            <th>Option 3</th>
                            <td><select id="loc_name3" name="preferred_location3" class="mySelect" <?php if(!$mpl_loc_id){echo 'disabled';} ?>>
                                    <option value="" selected disabled>Please select another option -- (only if applicable)</option>
                                    <?php all_locations2($locations);?>
                                </select></td>
                        </tr>
                    </table>
                </div>
                <div id="specific_schs" <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['preferred_schools1'])){
                        echo 'style = "display:block"';
                    }else{
                        echo 'style = "display:none"';
                    }
                }elseif($mps_id){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';
                } ?>>
                    <hr>
                    <label for = "preferred_schools" class = "h2">Select Your Preferred Schools Maximum of 10 Schools</label>
                    <table class="table">
                        <tr>
                            <th>Option 1</th>
                            <td><select id="preferred_schools1" name="preferred_schools1" onchange="preSch()" class="mySelect">
                                    <option value="" selected disabled>Please select one option -- (only if applicable)</option>
                                    <?php all_schools($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 2</th>
                            <td><select id="preferred_schools2" name="preferred_schools2" onchange="preSch1()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php all_schools1($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 3</th>
                            <td><select id="preferred_schools3" name="preferred_schools3" onchange="preSch2()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php all_schools2($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 4</th>
                            <td><select id="preferred_schools4" name="preferred_schools4" onchange="preSch3()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php all_schools3($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 5</th>
                            <td><select id="preferred_schools5" name="preferred_schools5" onchange="preSch4()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php all_schools4($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 6</th>
                            <td><select id="preferred_schools6" name="preferred_schools6" onchange="preSch5()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php	all_schools5($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 7</th>
                            <td><select id="preferred_schools7" name="preferred_schools7" onchange="preSch6()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php	all_schools6($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 8</th>
                            <td><select id="preferred_schools8" name="preferred_schools8" onchange="preSch7()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php	all_schools7($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 9</th>
                            <td><select id="preferred_schools9" name="preferred_schools9" onchange="preSch8()" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php	all_schools8($schools);?>
                                </select></td>
                        </tr>
                        <tr>
                            <th>Option 10</th>
                            <td><select id="preferred_schools10" name="preferred_schools10" <?php if(!$mps_school_id){echo 'disabled';} ?> class="mySelect">
                                    <option value="" selected>Please select one option -- (only if applicable)</option>
                                    <?php	all_schools9($schools);?>
                                </select></td>
                        </tr>
                    </table>
                </div>

            </fieldset>
            <hr>
            <fieldset>
                <legend><span class = "number" >2</span>Your Basic Information</legend>

                <label class = "h2">Gender:</label>
                <ul class="menu" id="gender">
                    <li><label for="male" name="male" id="light">Male</label></li>
                    <li><input type="radio" id="male" value="Male" name="gender" <?php if(isset($_POST['gender'])){//for remembering data during registration
                            if (($_POST['gender'] == 'Male')) echo 'checked';
                        }elseif($client_sex == 'Male') echo 'checked';
                        //for querying data during updating of client details
                        ?>></li>
                    <li><label for="female" name="female" id="light">Female</label></li>
                    <li><input type="radio" id="female" value="Female"  name="gender" <?php if(isset($_POST['gender'])){//for remembering data during registration
                            if (($_POST['gender'] == 'Female')) echo 'checked';
                        }elseif($client_sex == 'Female') echo 'checked';
                        //for querying data during updating of client details
                        ?>></li>
                </ul>
                <table>
                    <tr>
                        <th><label for = "first_name">First Name <span style ="font-size: 70%">(required)</span>:</label></th>
                        <td><input type = "text" id = "first_name" name = "user_first_name" value = "<?php if(!empty($client_first_name)){
                                echo $client_first_name;
                            }else{
                                echo htmlspecialchars($userFirstName);
                            } ?>"></td>
                    </tr>
                    <tr>
                        <th><label for = "last_name">Surname <span style ="font-size: 70%">(required)</span>:</label></th>
                        <td><input type = "text" id = "last_name" name = "user_last_name" value = "<?php if(!empty($client_last_name)){
                                echo $client_last_name;
                            }else{
                                echo htmlspecialchars($userLastName);
                            } ?>"></td>
                    </tr>
                    <tr>
                        <th><label for = "mobile_number">Mobile Number <span style ="font-size: 70%">(required)</span>:</label></th>
                        <td><input type = "number" id = "mobile_number" name = "mobile_number" value = "<?php if(!empty($client_mobile_no)){//retrieve client mobile number during updating
                                echo $client_mobile_no;
                            }else{//returns captured mobile number if submission fails
                                echo htmlspecialchars($mobileNumber);
                            }?>"></td>
                    </tr>
                    <tr>
                        <th><label for = "ec_number">EC Number <span style ="font-size: 70%">(required)</span>:</label></th>
                        <td><input type = "text" id = "ec_number" name = "ec_number" value = "<?php if(!empty($client_ec_no)){//retrieve client EC Number during updating
                                echo $client_ec_no;
                            }else{
                                echo htmlspecialchars($ecNumber);
                            }?>"<?php
                            if(!empty($client_ec_no)){//turns the html attribute to read only to avoid changing the EC Number
                                echo 'readonly';
                            }?>></td>
                    </tr>
                    <tr>
                        <th><label for = "email">Email:</label></th>
                        <td><input type = "email" id = "email" name = "user_email" value = "<?php if(!empty($client_email)){//retrieve client email during updating
                                echo $client_email;
                            }else{//returns captured email if submission fails
                                echo htmlspecialchars($userEmail);
                            } ?>"></td>
                    </tr>
                    <tr>
                        <th><label for = "password">Password:</label></th>
                        <td><input type = "password" id = "password" name = "user_password" required value = "<?php if(!empty($client_password)){//retrieve client password during updating
                                echo $client_password;
                            }else{
                                echo htmlspecialchars($userPassword);
                            } ?>"></td>
                    </tr>
                    <tr>
                        <th><label for = "blank" style ="display:none">Leave This Field Blank:</label></th>
                        <td><input type = "blank" id = "blank" name = "blank" style ="display:none"></td>
                    </tr>
                </table>
            </fieldset>
            <hr>
            <fieldset>
                <legend><span class = "number" >3</span>Your Current Station Details</legend>

                <table class="table">
                    <tr>
                        <th ><label for = "level_taught">Level <span style ="font-size: 70%">(required)</span></label></th>
                        <td>
                            <select id="level_taught" name="level_taught" onchange="mySubjects()">
                                <option value="">Please select one option</option>
                                <optgroup label="Primary Level">
                                    <option value="Primary - ECD" <?php if(isset($_POST['level_taught'])){//retrieve client level during registration if submission fails
                                        if($_POST['level_taught'] == 'Primary - ECD'){
                                            echo 'selected';
                                        }
                                    }elseif($client_level_taught == 'PRIMARY - ECD'){//retrieve client level during updating
                                        echo 'selected';
                                    } ?>>Primary - ECD</option>
                                    <option value="Primary - General" <?php if(isset($_POST['level_taught'])){//retrieve client level during registration if submission fails
                                        if($_POST['level_taught'] == 'Primary - General'){
                                            echo 'selected';
                                        }
                                    }elseif($client_level_taught == 'PRIMARY - GENERAL'){//retrieve client level during updating
                                        echo 'selected';
                                    } ?>>Primary - General</option>
                                </optgroup>
                                <optgroup label="High School">
                                    <option value="High School - ZJC" <?php if(isset($_POST['level_taught'])){//retrieve client level during registration if submission fails
                                        if($_POST['level_taught'] == 'High School - ZJC'){
                                            echo 'selected';
                                        }
                                    }elseif($client_level_taught == 'HIGH SCHOOL - ZJC'){//retrieve client level during updating
                                        echo 'selected';
                                    } ?>>High School - ZJC</option>
                                    <option value="High School - O Level" <?php if(isset($_POST['level_taught'])){//retrieve client level during registration if submission fails
                                        if($_POST['level_taught'] == 'High School - O Level'){
                                            echo 'selected';
                                        }
                                    }elseif($client_level_taught == 'HIGH SCHOOL - O LEVEL'){//retrieve client level during updating
                                        echo 'selected';
                                    } ?>>High School - O Level</option>
                                    <option value="High School - A Level" <?php if(isset($_POST['level_taught'])){//retrieve client level during registration if submission fails
                                        if($_POST['level_taught'] == 'High School - A Level'){
                                            echo 'selected';
                                        }
                                    }elseif($client_level_taught == 'HIGH SCHOOL - A LEVEL'){//retrieve client level during updating
                                        echo 'selected';
                                    } ?>>High School - A Level</option>
                                </optgroup>
                            </select></td>
                    </tr>
                    <tr>
                        <th><label for ="current_province">Province <span style ="font-size: 70%">(required)</span></label></th>
                        <td><select id="current_province" name="current_province" class="mySelect">
                                <option value="">Please select one option</option>
                                <?php
                                all_provinces_curr($provinces);
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th><label for ="current_district">District <span style ="font-size: 70%">(required)</span></label></th>
                        <td><select id="current_district" name="current_district" class="mySelect">
                                <option value="">Please select one option</option>
                                <?php
                                all_districts_curr($districts);
                                ?>
                            </select></td>
                    </tr>
                    <tr>
                        <th><label for = "current_school">School <span style ="font-size: 70%">(required)</span></label></th>
                        <td><select id="current_school" name="current_school" class="mySelect">
                                <option value="">Please select one option</option>
                                <?php
                                all_schools_curr($schools);
                                ?>
                            </select></td>
                    </tr>
                </table>
                <div id="subjects" <?php if($_SERVER["REQUEST_METHOD"] == "POST"){
                    if(isset($_POST['level_taught']) &&
                        (($_POST['level_taught'] == "Primary - ECD" ) ||
                            ($_POST['level_taught'] == "Primary - General" ))){
                        echo 'style = "display:none"';
                    }
                }elseif($match_sub1_id){
                    echo 'style = "display:block"';
                }else{
                    echo 'style = "display:none"';
                }?>>
                    <hr>
                    <table class ="table">
                        <label class = "h2">Subjects Taught:</label>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject1" value="Additional Maths" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'ADDITIONAL MATHS') || (strtoupper($match_sub2_name) == 'ADDITIONAL MATHS')){echo 'checked';}}elseif(isset($_POST['subject1'])){echo 'checked';}  ?>><label for="subject" name="subject" class="light">Additional Maths</label></td>
                            <td><input type="checkbox" id="subject" name="subject2" value="Art" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'ART') || (strtoupper($match_sub2_name) == 'ART')){echo 'checked';}}else{echo (isset($_POST['subject2'])?'checked="checked"':'');}?>><label for="subject" name="subject" class="light">Art</label></td>
                            <td><input type="checkbox" id="subject" name="subject3" value="Biology" <?php  if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'BIOLOGY') || (strtoupper($match_sub2_name) == 'BIOLOGY')){echo 'checked';}}elseif(isset($_POST['subject3'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Biology</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject4" value="Business Studies" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'BUSINESS STUDIES') || (strtoupper($match_sub2_name) == 'BUSINESS STUDIES')){echo 'checked';}}elseif(isset($_POST['subject4'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Business Studies</label></td>
                            <td><input type="checkbox" id="subject" name="subject5" value="Chemistry" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'CHEMISTRY') || (strtoupper($match_sub2_name) == 'CHEMISTRY')){echo 'checked';}}elseif(isset($_POST['subject5'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Chemistry</label></td>
                            <td><input type="checkbox" id="subject" name="subject6" value="Commerce" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'COMMERCE') || (strtoupper($match_sub2_name) == 'COMMERCE')){echo 'checked';}}elseif(isset($_POST['subject6'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Commerce</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject7" value="Computer Studies" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'COMPUTER STUDIES') || (strtoupper($match_sub2_id) == 'COMPUTER STUDIES')){echo 'checked';}}elseif(isset($_POST['subject7'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Computer Studies</label></td>
                            <td><input type="checkbox" id="subject" name="subject8" value="Economics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'ECONOMICS') || (strtoupper($match_sub2_name) == 'ECONOMICS')){echo 'checked';}}elseif(isset($_POST['subject8'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Economics</label></td>
                            <td><input type="checkbox" id="subject" name="subject9" value="English Language" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'ENGLISH LANGUAGE') || (strtoupper($match_sub2_name) == 'ENGLISH LANGUAGE')){echo 'checked';}}elseif(isset($_POST['subject9'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">English Language</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject10" value="English Literature" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'ENGLISH LITERATURE') || (strtoupper($match_sub2_name) == 'ENGLISH LITERATURE')){echo 'checked';}}elseif(isset($_POST['subject10'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">English Literature</label></td>
                            <td><input type="checkbox" id="subject" name="subject11" value="Fashion And Fabrics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'FASHION AND FABRICS') || (strtoupper($match_sub2_name) == 'FASHION AND FABRICS')){echo 'checked';}}elseif(isset($_POST['subject11'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Fashion And Fabrics</label></td>
                            <td><input type="checkbox" id="subject" name="subject12" value="Food And Nutrition" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'FOOD AND NUTRITION') || (strtoupper($match_sub2_name) == 'FOOD AND NUTRITION')){echo 'checked';}}elseif(isset($_POST['subject12'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Food And Nutrition</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject13" value="French" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'FRENCH') || (strtoupper($match_sub2_name) == 'FRENCH')){echo 'checked';}}elseif(isset($_POST['subject13'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">French</label></td>
                            <td><input type="checkbox" id="subject" name="subject14" value="Geography" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'GEOGRAPHY') || (strtoupper($match_sub2_name) == 'GEOGRAPHY')){echo 'checked';}}elseif(isset($_POST['subject14'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Geography</label></td>
                            <td><input type="checkbox" id="subject" name="subject15" value="History" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'HISTORY') || (strtoupper($match_sub2_name) == 'HISTORY')){echo 'checked';}}elseif(isset($_POST['subject15'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">History</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject16" value="Home Management" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'HOME MANAGEMENT') || (strtoupper($match_sub2_name) == 'HOME MANAGEMENT')){echo 'checked';}}elseif(isset($_POST['subject16'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Home Management</label></td>
                            <td><input type="checkbox" id="subject" name="subject17" value="Human And Social Biology" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'HUMAN AND SOCIAL BIOLOGY') || (strtoupper($match_sub2_name) == 'HUMAN AND SOCIAL BIOLOGY')){echo 'checked';}}elseif(isset($_POST['subject17'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Human And Social Biology</label></td>
                            <td><input type="checkbox" id="subject" name="subject18" value="Integrated Science" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'INTEGRATED SCIENCE') || (strtoupper($match_sub2_name) == 'INTEGRATED SCIENCE')){echo 'checked';}}elseif(isset($_POST['subject18'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Integrated Science</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject19" value="Law" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'LAW') || (strtoupper($match_sub2_name) == 'LAW')){echo 'checked';}}elseif(isset($_POST['subject19'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Law</label></td>
                            <td><input type="checkbox" id="subject" name="subject20" value="Mathematics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'MATHEMATICS') || (strtoupper($match_sub2_name) == 'MATHEMATICS')){echo 'checked';}}elseif(isset($_POST['subject20'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Mathematics</label></td>
                            <td><input type="checkbox" id="subject" name="subject21" value="Metalwork" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'METALWORK') || (strtoupper($match_sub2_name) == 'METALWORK')){echo 'checked';}}elseif(isset($_POST['subject21'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Metalwork</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject22" value="Music" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'MUSIC') || (strtoupper($match_sub2_name) == 'MUSIC')){echo 'checked';}}elseif(isset($_POST['subject22'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Music</label></td>
                            <td><input type="checkbox" id="subject" name="subject23" value="Ndebele" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'NDEBELE') || (strtoupper($match_sub2_name) == 'NDEBELE')){echo 'checked';}}elseif(isset($_POST['subject23'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Ndebele</label></td>
                            <td><input type="checkbox" id="subject" name="subject24" value="Physical Science" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'PHYSICAL SCIENCE') || (strtoupper($match_sub2_name) == 'PHYSICAL SCIENCE')){echo 'checked';}}elseif(isset($_POST['subject24'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Physical Science</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject25" value="Physics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'PHYSICS') || (strtoupper($match_sub2_name) == 'PHYSICS')){echo 'checked';}}elseif(isset($_POST['subject25'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Physics</label></td>
                            <td><input type="checkbox" id="subject" name="subject26" value="Principles Of Accounts" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'PRINCIPLES OF ACCOUNTS') || (strtoupper($match_sub2_name) == 'PRINCIPLES OF ACCOUNTS')){echo 'checked';}}elseif(isset($_POST['subject26'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Principles Of Accounts</label></td>
                            <td><input type="checkbox" id="subject" name="subject27" value="Religious Studies" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'RELIGIOUS STUDIES') || (strtoupper($match_sub2_name) == 'RELIGIOUS STUDIES')){echo 'checked';}}elseif(isset($_POST['subject27'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Religious Studies</label></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject28" value="Shona" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'SHONA') || (strtoupper($match_sub2_name) == 'SHONA')){echo 'checked';}}elseif(isset($_POST['subject28'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Shona</label></td>
                            <td><input type="checkbox" id="subject" name="subject29" value="Sociology" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'SOCIOLOGY') || (strtoupper($match_sub2_name) == 'SOCIOLOGY')){echo 'checked';}}elseif(isset($_POST['subject29'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Sociology</label></td>
                            <td><input type="checkbox" id="subject" name="subject30" value="Statistics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'STATISTICS') || (strtoupper($match_sub2_name) == 'STATISTICS')){echo 'checked';}}elseif(isset($_POST['subject30'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Statistics</label><br>
                        </tr>
                        <tr>
                            <td><input type="checkbox" id="subject" name="subject31" value="Technical Graphics" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'TECHNICAL GRAPHICS') || (strtoupper($match_sub2_name) == 'TECHNICAL GRAPHICS')){echo 'checked';}}elseif(isset($_POST['subject31'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Technical Graphics</label></td>
                            <td><input type="checkbox" id="subject" name="subject32" value="Woodwork" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'WOODWORK') || (strtoupper($match_sub2_name) == 'WOODWORK')){echo 'checked';}}elseif(isset($_POST['subject32'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Woodwork</label></td>
                            <td><input type="checkbox" id="subject" name="subject33" value="Tonga" <?php if(isset($_GET['id'])){if((strtoupper($match_sub1_name) == 'TONGA') || (strtoupper($match_sub2_name) == 'TONGA')){echo 'checked';}}elseif(isset($_POST['subject33'])){echo 'checked';} ?>><label for="subject" name="subject" class="light">Tonga</label></td>
                        </tr>
                    </table>
                </div>
            </fieldset>
            <?php if($client_id){
                echo '<input type="hidden" value="'.$client_id.'"/>';
            }
            if(!empty($mpp_id)){
                echo '<input type="hidden" value="'.$mpp_id.'"/>';
            }
            if(!empty($mpt_id)){
                echo '<input type="hidden" value="'.$mpt_id.'"/>';
            }
            if(isset($mpd_id)){
                echo '<input type="hidden" value="'.$mpd_id.'"/>';
            }
            if(isset($mpd2_id)){
                echo '<input type="hidden" value="'.$mpd2_id.'"/>';
            }
            if(!empty($mpl_id)){
                echo '<input type="hidden" value="'.$mpl_id.'"/>';
            }

            if(!empty($mpl2_id)){
                echo '<input type="hidden" value="'.$mpl2_id.'"/>';
            }
            if(!empty($mpl3_id)){
                echo '<input type="hidden" value="'.$mpl3_id.'"/>';
            }
            if(!empty($mps_id)){
                echo '<input type="hidden" value="'.$mps_id.'"/>';
            }
            if(!empty($mps2_id)){
                echo '<input type="hidden" value="'.$mps2_id.'"/>';
            }
            if(!empty($mps3_id)){
                echo '<input type="hidden" value="'.$mps3_id.'"/>';
            }
            if(!empty($mps4_id)){
                echo '<input type="hidden" value="'.$mps4_id.'"/>';
            }
            if(!empty($mps5_id)){
                echo '<input type="hidden" value="'.$mps5_id.'"/>';
            }
            if(!empty($mps6_id)){
                echo '<input type="hidden" value="'.$mps6_id.'"/>';
            }
            if(!empty($mps7_id)){
                echo '<input type="hidden" value="'.$mps7_id.'"/>';
            }
            if(!empty($mps8_id)){
                echo '<input type="hidden" value="'.$mps8_id.'"/>';
            }
            if(!empty($mps9_id)){
                echo '<input type="hidden" value="'.$mps9_id.'"/>';
            }
            if(!empty($mps10_id)){
                echo '<input type="hidden" value="'.$mps10_id.'"/>';
            }

            ?>
            <button type = "submit" class="btn btn-success" id="button" >Submit</button>
            <span id="reset-button"><input type="reset" class="btn btn-danger" id="reset"></span>

        </form>
    </div>
    <script src="js/scripts.js"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>..............
</body>


<?php include("inc/footer.php");?>
