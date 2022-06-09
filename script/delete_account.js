//!Retrieve form fields
document.getElementById("deleteForm").addEventListener("submit", async function(e){
    //*Preventing default browser behavior
    e.preventDefault();

    let data = new FormData(this);
    console.log(this);
    let url = "../controlers/delete_user.php";

    let response = await fetch (
        url, {
            method: 'POST',
            body: data
        }
    );
    let res = await response.json();

    //* retour JSON
    if (res.success == 1){
        localStorage.clear();
        alert(res.msg);
        //*Redirection to home page
        document.location.href=res.redirection;
        
    } else {
        alert(res.msg);
    }
});