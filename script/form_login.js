//!Retrieve form fields
document.getElementById("connexionForm").addEventListener("submit", async function(e){
    //*Preventing default browser behavior
    e.preventDefault();

    //*Form data in the variable with a new FormData() object
    let data = new FormData(this);
    let url = "./controlers/login_user.php";

    let response = await fetch(
        url, {
            method: 'POST',
            body: data
        }
    );

    let res = await response.json();

    //*Success = 1
    if(res.success == 1) {
        //*Create newObject myUser
        let myUser = {
            "id_user": null,
            "name_user": "",
            "first_name_user": "",
            "login_user": "", 
            "email_user":"", 
            "id_right": null, 
            "name_right": ""
        };
        //*Add value
        myUser.id_user = res.data.id_user;
        myUser.name_user = res.data.name_user;
        myUser.first_name_user = res.data.first_name_user;
        myUser.login_user = res.data.login_user;
        myUser.email_user = res.data.email_user;
        myUser.id_right = res.data.id_right;
        myUser.name_right= res.data.name_right;
        
        //*JSON.stringify() : converts a myUser value to a JSON string
        let toJson = JSON.stringify(myUser);
        //*localStorage.setItem : create item myUser in localStorage
        localStorage.setItem('myUser', toJson);
        //*Success message
        alert(res.msg);
        //*Redirection to home page
        document.location.href=res.redirection;
    } else {
        //*Success ≠ 1
        alert(res.msg);
    }

    //*Return false to not block the js script
    return false;
});