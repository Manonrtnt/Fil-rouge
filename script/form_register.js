//!Retrieve form fields
document.getElementById("registerForm").addEventListener("submit", async function(e){
    //*Preventing default browser behavior
    e.preventDefault();

    //*Form data in the variable with a new FormData() object
    let data = new FormData(this);
    let url = "../controlers/register_user.php";

    let response = await fetch(
        url, {
            method: 'POST',
            body: data
        }
    );

    let res = await response.json();

    //*Success = 1
    if(res.success == 1) {
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