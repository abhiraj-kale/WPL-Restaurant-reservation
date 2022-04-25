window.onload = function(e){
    document.getElementById('username').focus()
}
function login(e){
    const username = document.querySelector('#username').value;
    const password = document.querySelector('#password').value;
    if(username != "" && password != ""){
        return true;}
    else {
        alert('Please enter valid username/password')
        return false;
    }
}