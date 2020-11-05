// login & sign up page password eye
function show(){

    let pass = document.getElementById('password');
    pass.type = "password";
    document.querySelector('.fa-eye').style.display = "none";
    document.querySelector('.fa-eye-slash').style.display = "block"
}

function noShow(){
    
    let pass = document.getElementById('password');
    pass.type = "text";
    document.querySelector('.fa-eye').style.display = "block";
    document.querySelector('.fa-eye-slash').style.display = "none"
}

// profile arrow up and down in home page
 function dropDown(){

    let options = document.querySelector('.user-options');
    options.classList.toggle("show");
 }



