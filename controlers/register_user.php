<?php
    //! ACCESS
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST");
    
    //! INCLUDE 
    include('../models/users.php');
    include('../models/right_user.php');
    include('../utils/db_config.php');

    //! JSON return 
    $success = 0;
    $msg = "An error occurred in the php";
    $redirection = "../views/index.php";

    //! CHECK INPUT
    if(!empty($_POST['name_user'])
    && !empty($_POST['first_name_user'])
    && !empty($_POST['login_user'])
    && !empty($_POST['email_user'])
    && !empty($_POST['em2_user'])
    && !empty($_POST['password_user'])
    && !empty($_POST['pwd2_user'])){

        //?TRIM : escape whites(before and after) 
        $name_user = trim($_POST['name_user']);
        $first_name_user = trim($_POST['first_name_user']);
        $login_user = trim($_POST['login_user']);
        $email_user = trim($_POST['email_user']);
        $em2_user = trim($_POST['em2_user']);
        $password_user = trim($_POST['password_user']);
        $pwd2_user = trim($_POST['pwd2_user']);

        //?STRIP_TAGS protect from any HTML and/or Javascript code injection (failles XSS (Cross-Site Scripting) / delete tags
        //?HTLMSPECIALCHARS neutralize characters &, ", ', <, > with a special code
        $verifLogin = htmlspecialchars(strip_tags($login_user));
        $verifPassword = htmlspecialchars(strip_tags($password_user));
        $verifEmail = htmlspecialchars(strip_tags($email_user));

        //?CREATE USER INSTANCE
        $newUser = new Users();
        $itemIdRight= new Right();

        //?ADD ATTRIBUTES
        $newUser->setName_user($name_user);
        $newUser->setFirst_name_user($first_name_user);
        $newUser->setLogin_user($verifLogin);
        $newUser->setPassword_user(password_hash($verifPassword, PASSWORD_BCRYPT));
        $newUser->setEmail_user($verifEmail);
        $newUser->setId_right($newUser->getId_right());
        
        //?CHECK LOGIN and EMAIL
        $checkLogin = $newUser->verifyLogin();
        $checkEmail = $newUser->verifyEmail();

        //? rowCount nbrLogin or email exists
        $nbrLogin = $checkLogin->rowCount();
        $nbrEmail = $checkEmail->rowCount();
        if($nbrLogin>0){
            $msg = "This login is already taken, choose a new one";
        } else if ($nbrEmail>0){
            $msg = "An account is already associated with this email address, go to the login section.";
        } else {
            $newUser->createUser();
            $success = 1;
            $msg = "User created with success";
        }
    }

    //! SUCCES or NOT = JSON ENCODE
    if($success == 1){
        $res = ["success" => $success, "msg" => $msg, "redirection" => $redirection];
        echo json_encode($res);
    } else {
        $res = ["success" => $success, "msg" => $msg];
        echo json_encode($res);
    }
?>