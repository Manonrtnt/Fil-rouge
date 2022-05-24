<?php
    //! ACCESS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    
    //! INCLUDE 
    include('../models/users.php');
    include('../models/right_user.php');
    include('../utils/db_config.php');

    //! JSON return js
    $success = 0;
    $msg = "Error in php";

    //! check input
    if (!empty($_POST['login_user'])){
        //?TRIM : escape whites(before and after) 
        $login = trim($_POST['login_user']);
        // echo "".$_POST['login_user']."";

        //?STRIP_TAGS protect from any HTML and/or Javascript code injection (failles XSS (Cross-Site Scripting) / delete tags
        //?HTLMSPECIALCHARS neutralize the characters &, ", ', <, > with a special code
        $verifLogin = htmlspecialchars(strip_tags($login));

        //?CREATE USER INSTANCE
        $itemUser = new Users();
        $itemUser->setLogin_user($verifLogin);

        //? rowCount / user
        $checkLogin = $itemUser->verifyLogin();
        $nbrLogin = $checkLogin->rowCount();

        if ($nbrLogin == 0){
            $msg = "No user with this login found, check your input login.";
        } else if ($nbrLogin == 1) {
            $itemUser->deleteUser();
            $success = 1;
            $msg = "Your account has been deleted, see you soon. You will be redirected to the login page";
        }
    } else {
        $msg = "Error during connexion, please renew your request.";
    }

    //! SUCCES or NOT = JSON ENCODE
    if($success == 1){
        //table : succes / msg and data
        $res = ["success" => $success, "msg" => $msg, "redirection" => "http://localhost/Fil_rouge1/views/index.php"];
        //return json encode 
        echo json_encode($res);

    } else {
        // else table : success and data 
        $res = ["success" => $success, "msg" => $msg];
        echo json_encode($res);
    }
?>