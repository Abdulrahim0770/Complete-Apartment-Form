var DateAndTime = document.getElementById("DateAndTime");

function setDate(){
    var date = new Date();
    var now = date.toTimeString();
    dateTime.innerHTML = now;
}

