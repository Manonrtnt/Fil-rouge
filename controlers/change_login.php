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
    $data =[];

    //! check input
    if (!empty($_POST['login_user']) && !empty($_POST['newLogin_user']) && !empty($_POST['email_user'])){
        //?TRIM : escape whites(before and after) 
        $login_user = trim($_POST['login_user']);
        $email_user = trim($_POST['email_user']);
        $newLogin_user = trim($_POST['newLogin_user']);

        //?STRIP_TAGS protect from any HTML and/or Javascript code injection (failles XSS (Cross-Site Scripting) / delete tags
        //?HTLMSPECIALCHARS neutralize the characters &, ", ', <, > with a special code
        $login = htmlspecialchars(strip_tags($login_user));
        $email = htmlspecialchars(strip_tags($email_user));
        $newLogin = htmlspecialchars(strip_tags($newLogin_user));

        //? new Instance and setter
        $itemUser = new Users();
        $itemUser->setLogin_user($login);
        $itemUser->setEmail_user($email);

        //? rowCount / user login and email
        $checkLogin = $itemUser->verifyLogin();
        $nbrLogin = $checkLogin->rowCount();

        $checkEmail = $itemUser->verifyEmail();
        $nbrEmail = $checkEmail->rowCount();

        //? Condition if user exist
        if ($nbrLogin == 0){
            $msg = "No user with this login found, check your input login.";

        } else if ($nbrEmail == 0){
            $msg = "No user with this email found, check your input email.";

        } else if ($nbrLogin == 1) {
            $itemUser->setLogin_user($newLogin);
            $itemUser->updateLogin($email);
            $success = 1;
            $data['user'] = $newLogin;
            $msg= "Change login ok";
        }

    } else {
        $msg = "Error during connexion, please renew your request.";
    }

    //! SUCCES or NOT = JSON ENCODE
    if($success == 1){
        //table : succes / msg and data
        $res = ["success" => $success, "msg" => $msg, "data" => $data, "redirection" => "http://localhost/Fil_rouge1/views/account.php"];
        //return json encode 
        echo json_encode($res);

    } else {
        // else table : success and data 
        $res = ["success" => $success, "msg" => $msg, "data" => $data];
        echo json_encode($res);
    }
?>