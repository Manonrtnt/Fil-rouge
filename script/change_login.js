//!Retrieve form fields
document.getElementById("changeLogin").addEventListener("submit", async function(e){
    //*Preventing default browser behavior
    e.preventDefault();

    let data = new FormData(this);
    // console.log(this);
    let url = "../controlers/change_login.php";

    let response = await fetch (
        url, {
            method: 'POST',
            body: data
        }
    );
    let res = await response.json();
    console.log(res);

    //* retour JSON
    if (res.success == 1){
        alert(res.msg);
        //*Redirection to home page
        // document.location.href=res.redirection;
        
    } else {
        alert(res.msg);
    }
});
