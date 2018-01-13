//Get login button
var login = document.getElementById("login");
var informationlogin = document.getElementById("logininformation");
var printissue = document.getElementById("printissue");
login.addEventListener("click", logindata , false);


function logindata(){
    informationlogin.innerHTML = ("<fieldset class=\"informationlogin\"> " +
        "<legend id=\"loginField\">Login Information</legend>" +
        "<span class=\"prompt\">Username:</span>" +
        "<input type='text' id='username' /></br>" +
        "<span class=\"prompt\">Password:</span>" +
        "<input type='password' id='password' />" +
        "<button type=\"submit\" value=\"Login\" id=\"loginSubmit\">Login</button>" +
        "</fieldset>");

    document.body.removeChild(login);

}

function requirements(){

    var username = document.getElementById("username");
    username = username.value;
    var password = document.getElementById("password");
    password = password.value;


    if(CheckPassword(password)&&CheckUsername(username)) {
        printissue.innerHTML = "Username and password authentication happening"
        return true;
    }
    else if(CheckPassword(password)&&!CheckUsername(username)){
        printissue.innerHTML = "Make sure username does not contain anything other than alphanumeric characters.";
        return false;
    }
    else if (CheckUsername(username)&&!CheckPassword(password)){
        printissue.innerHTML = "Make sure password contains at least one letter symbol and one symbol from the alphabet as well as being at least 4 characters long.";
        return false;
    }
    else{
        printissue.innerHTML = "Both username and password are wrong, read instructions again"
        return false;
    }

}

//pattern searching used for username and password. not included in the final exam but during the course of the semester. 
function CheckUsername(string){
    var reg1 = new RegExp("[A-z]+");
    return (reg1.test(string));
}

function CheckPassword(string){
    var reg11 = new RegExp("^([A-z0-9]){4,}$");
    var reg22 = new RegExp("[A-z]+");
    var reg33 = new RegExp("[0-9]+");
    return (reg11.test(string) && reg22.test(string) && reg33.test(string));
}

