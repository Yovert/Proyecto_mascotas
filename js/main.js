document.addEventListener("DOMContentLoaded", ()=> {
    setTimeout(function(){
        let presentation = document.getElementById("presentation");
        presentation.style.display= "none";
    }, 5000);
})


let sign_in = document.getElementById("signIn");
let check_in = document.getElementById("checkIn");

sign_in.addEventListener('click', () => {
    window.location.href ="login.php";
})
check_in.addEventListener('click', () => {
    window.location.href ="check_in.php";
})

