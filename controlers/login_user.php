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
    $data = [];
    $redirection = "../views/home.php";

    //! CHECK INPUT
    if(!empty($_POST['login_user']) && !empty($_POST['password_user'])) {
        //?TRIM : escape whites(before and after) 
        $loginSignIn = trim($_POST['login_user']);
        $passwordSignIn = trim($_POST['password_user']);

        //?STRIP_TAGS protect from any HTML and/or Javascript code injection (failles XSS (Cross-Site Scripting) / delete tags
        //?HTLMSPECIALCHARS neutralize the characters &, ", ', <, > with a special code
        $verifLogin = htmlspecialchars(strip_tags($loginSignIn));
        $verifPassword = htmlspecialchars(strip_tags($passwordSignIn));

        //?CREATE USER INSTANCE
        $itemUser = new Users();
        $itemIdRight= new Right();

        //?ADD ATTRIBUTES
        $itemUser->setLogin_user($verifLogin);
        $itemUser->setPassword_user($verifPassword);

        //? rowCount / user
        $myReturn = $itemUser->getSingleUser();
        $nbrUsers = $myReturn->rowCount();

        if($nbrUsers == 0) {
            $msg = "No user with this nickname found, check your input.";
        
        } else if($nbrUsers > 1 ) {
            $msg = "There seems to be an error, please contact an administrator";
        
        } else if ($nbrUsers == 1) {
            while($rowUser = $myReturn->fetch()) {
                extract($rowUser);

                // password compare bdd
                if(!password_verify($verifPassword, $rowUser['password_user'])) {
                    $msg = "Error password, please try again";
                
                } else if (password_verify($itemUser->getPassword_user(), $rowUser['password_user'])) {
                    $itemIdRight->setId_right($rowUser['id_right']);
                    //get methods
                    $returnRight = $itemIdRight->getSingleRight();
                    //create 2 variables
                    $id_right;
                    $name_right;
                    while($rowRight = $returnRight->fetch()) {
                        extract($rowRight);
                        //assign values to variables
                        $id_right =  intval($rowRight['id_right'], 10);
                        $name_right = $rowRight['name_right'];
                    }
                    //return values
                    $success = 1;
                    $msg = "Successful login";
                    $data['id_user'] = intval($rowUser['id_user'], 10);
                    $data['name_user'] = $rowUser['name_user'];
                    $data['first_name_user'] = $rowUser['first_name_user'];
                    $data['login_user'] = $rowUser['login_user'];
                    $data['email_user'] = $rowUser['email_user'];
                    $data['id_right'] = $id_right;
                    $data['name_right'] = $name_right;
                }
            }
        }
    } else {
        $msg = "Error during connexion, please renew your request.";
    }
    
    //! SUCCES or NOT = JSON ENCODE
    if($success == 1){
        //table : succes / msg and data
        $res = ["success" => $success, "msg" => $msg, "data" => $data, "redirection" => $redirection];
        //return json encode 
        echo json_encode($res);


    } else {
        // else table : success and data 
        $res = ["success" => $success, "msg" => $msg];
        echo json_encode($res);
    }
?>