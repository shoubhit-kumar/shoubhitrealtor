let register_form = document.getElementById('register_form');
let login_form = document.getElementById('login_form');
window.addEventListener("load", hide_register);

function hide_register() {
    register_form.style.display = 'none';
    login_form.style.display = 'block';
}

document.getElementById('register_link').addEventListener('click', hide_login);
function hide_login(){
    login_form.style.display = 'none';
    register_form.style.display = 'block';
}

document.getElementById('login_link').addEventListener('click', hide_register);

// console.log(login_form);
