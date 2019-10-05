console.log('hello email.js');
var email = document.getElementById('email');
email.addEventListener('click', focus);
function focus(){
    email.style.border = '2px solid blue';
}
