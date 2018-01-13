var expertsuggestions = document.getElementById("expertsuggestions");
var LargeRoom = document.getElementbyId("MoreFiveHalf");
var fourhalf = document.getElementById("FourHalf");
var fivehalf = document.getElementById("FiveHalf");
var dtown = document.getElementById("downtown");
var Price = document.getElementById("Price");

//set all of these variables to false to start off with. 
var morethanfivehalf = false;
var five_half = false;
var four_half = false;
var d_town = false;
var _499price = false;
var _700price = false;
var _1000price = false;
var _1001price = false;

//check the ones that are selected and clicked upon. 
function Checkselected() {
    if(d_town&&(_499price||_700price)&&(four_half||five_half||morethanfivehalf))
        expertsuggestions.innerHTML = "<h2>Expert Suggestions</h2>" +
            "<p>Normally an apartment of 4&frac12; and above costs more" +
            "than 1000$ in downtown area</p>";
    else if(morethanfivehalf&&d_town)
        expertsuggestions.innerHTML = "<h2>Expert Suggestions</h2>" +
            "<p>It is very difficult to find an apartment larger than 5&frac12; downtown</p>";
    else
        expertsuggestions.innerHTML = "";
}

//Change boolean status of each as soon as they are selected
LargeRoom.addEventListener("change", BooleanLargeRoom, false);
fivehalf.addEventListener("change", Booleanfivehalf, false);
fourhalf.addEventListener("change", BooleanTruthfourhalf, false);
dtown.addEventListener("change", BooleanTruthDtown, false);
Price.addEventListener("change", findSelected, false);
    
//show which are chosen and change the boolean
function findSelected(){
    if (Price.value == "499")
        Boolean499();
    else if(Price.value=="700")
        Boolean700();
    else if(Price.value = "1000")
        Boolean1000();
    else if(Price.value = "1001")
        Boolean1001();
    else
        return;
}

function BooleanLargeRoom() {
    if (morethanfivehalf == true)
        morethanfivehalf = false;
    else
        morethanfivehalf = true;
        Checkselected();
}

function Booleanfivehalf() {
    if (five_half == true)
        five_half = false;
    else
        five_half = true;
        Checkselected();
}

function Booleanfourhalf() {
    if (four_half == true)
        four_half = false;
    else
        four_half = true;
        Checkselected();
}

function BooleanDtown() {
    if (d_town == true)
        d_town = false;
    else
        d_town = true;
        Checkselected();
}

//Change boolean once clicked

function Boolean499() {
    _499price = true;
    _700price = false;
   _1000price = false;
   _1001price = false;
    Checkselected();
}
function Boolean700() {
    _499price = false;
    _700price = true;
   _1000price = false;
   _1001price = false;
    Checkselected();
}
function Boolean1000() {
   _499price = false;
    _700price = false;
   _1000price = true;
   _1001price = false;
    Checkselected();
}
function Boolean1001() {
    _499price = false;
    _700price = false;
   _1000price = false;
   _1001price = true;
    Checkselected();
}


















