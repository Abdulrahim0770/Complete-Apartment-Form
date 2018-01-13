<!DOCTYPE html> 

<html>
<head>
    
<title>Abdul's Apartment Search Form</title>
<link rel="stylesheet" type="text/css" href="SearchForm.css" />
</head>

<body>
    
<?php include "header.html"?>
<?php include "SearchForm.html"?>
    
<?php

//Set the 0's and 1's of each case for all the checked boxes. 
    
$Smoker =  $_POST["Smoker"];

$Pets = $_POST["Pets"];
if($Pets!=1)
    $Pets= 0;
    
    
$Studiospace = $_POST["Studio"];
if($Studiospace!=1)
    $Studiospace=0;

$ThreeHalfspace = $_POST["ThreeHalf"];
if($ThreeHalfspace!=1)
    $ThreeHalfspace=0;
    
$FourHalfspace = $_POST["FourHalf"];
if($FourHalfspace!=1)
    $FourHalfspace=0;
    
$FiveHalfspace = $_POST["FiveHalf"];
if($FiveHalfspace!=1)
    $FiveHalfspace=0;
    
$MoreFiveHalfspace = $_POST["MoreFiveHalf"];
if($MoreFiveHalfspace!=1)
    $MoreFiveHalfspace=0;
    

$Location_WestIsland = $_POST["wi"];
if($Location_wi!=1)
    $Location_wi=0;
    
$Location_Downtown = $_POST["dt"];
if($Location_dt!=1)
    $Location_dt=0;
    
$Location_LowerWestmount = $_POST["lw"];
if($Location_lw!=1)
    $Location_lw=0;
    
$Location_NDG = $_POST["ndg"];
if($Location_ndg!=1)
    $Location_ndg=0;
    
$Location_EastIsland = $_POST["eei"];
if($Location_eei!=1)
    $Location_eei=0;
    
$Fireplace = $_POST["Fireplace"];
if($Fireplace!=1)
    $Fireplace = 0;
    
$Laundry = $_POST["Laundry"];
if($Laundry!=1)
    $Laundry=0;
    
$IndoorParking = $_POST["IndoorParking"];
if($IndoorParking!=1)
    $IndoorParking=0;
    
$OutdoorParking = $_POST["OutdoorParking"];
if($OutdoorParking!=1)
    $OutdoorParking=0;
    
$Balcony = $_POST["Balcony"];
if($Balcony!=1)
    $Balcony=0;
    
$Price = $_POST["Price"];
    
    
//Make sure the file exists and if it does, remove the first line because it is not needed
if(file_exists("apartments.txt")) {
    $File = file("apartments.txt");
    unset($File[0]);
}
else
    $File = null;   
    

//Smoker, pet, size, location, price, fireplace, laudromat, indoorpark, outdoorpark, balcony
for($i=0;$i<count($File);$i++){
 
    //Each index of apartmentFile has an array now. 
    $File[$i] = explode(",",$File[$i]);
}
    
    
 //clean for location
foreach ($File as $i => $line){
    if($Location_WestIsland==1||$Location_Downtown==1||$Location_LowerWestmount==1||$Location_NDG==1||$Location_EastIsland==1) {
            if (($line[3] == "wi" && $Location_WestIsland == 0) ||
                ($line[3] == "dt" && $Location_Downtown == 0) ||
                ($line[3] == "lw" && $Location_LowerWestmount == 0) ||
                ($line[3] == "ndg" && $Location_NDG == 0) ||
                ($line[3] == "eei" && $Location_EastIsland == 0))
                unset($File[$i]);
    }
}   
    
    
//clean for smoker
$File = clean($File,$Smoker, 0,$Smoker);
    
//clean for pets
$File = clean($File, $Pets,1,$Pets);
    
//clean for size of space
foreach ($File as $i => $line){
        if($MoreFiveHalfspace==1||$FiveHalfspace==1||$ThreeHalfspace==1||$FourHalfspace==1||$Studiospace==1) {
            if ( $line[2] == "studio" && $Studiospace == 0 ||
                
    $line[2] == "3.5" && $ThreeHalfspace == 0 ||
    $line[2] == "4.5" && $FourHalfspace == 0 ||
    $line[2] == "5.5" && $FiveHalfspace == 0 ||
    $line[2] == "gt5.5" && $MoreFiveHalfspace == 0) 
            {
                unset($File[$i]);
            }
        }
}
//clean price
foreach ($File as $i => $line){
    if($Price!=0){
        if( ($line[4]<500&&$Price!=500) ||
            ($line[4]>=500&&$line[4]<700&&$Price!=700) ||
            ($line[4]>=700&&$line[4]<1000&&$Price!=1000) ||
            ($line[4]>=1000&&$Price!=1001)
        )
            unset($apartmentFile[$i]);
    }
}
//clean Fireplace
$File = clean($File, $Fireplace, 5, $Fireplace );
//clean laudromat
$File = clean($File, $Laundry, 6, $Laundry);
//clean indoor parking
$File = clean($File, $IndoorParking, 7, $IndoorParking);
//clean for outdoor parking
$File = clean($File, $OutdoorParking, 8, $OutdoorParking);
//clean for balcony
$File = clean($File, $Balcony, 9, $Balcony);

foreach($File as $line){
    displayLine($line);
    echo "<br/>";
}
?>    
    
<?php include "footer.html"
?>

</body>
</html>

<?php

function clean($Results, $type, $index, $NON)
{
    //NON = zero value for a clean means show everything
   if($NON==1) {
       foreach ($Results as $i => $line) {
           if ($line[$index] == 1 && $type == 0)
               unset($Results[$i]);
           elseif ($line[$index] == 0 && $type == 1)
               unset($Results[$i]);
       }
   }
    return $Results;
}

function displayLine($line){
    if($line[0]==1)
        echo "Smoking is allowed, ";
    else
        echo "No smoking is allowed, ";
    if($line[1]==1)
        echo "Pet are allowed, ";
    else
        echo "Pets are not allowed, ";
    if($line[2]=="studio")
        echo "Studio, ";
    elseif ($line[2]=="3.5")
        echo "3 and a half, ";
    elseif($line[2]=="4.5")
        echo "4 and a half, ";
    elseif($line[2]=="5.5")
        echo "5 and a half, ";
    elseif($line[2]=="gt5.5")
        echo "Larger than a 5 and a half, ";
    if($line[3]=="wi")
        echo "West Island, ";
    elseif($line[3]=="dt")
        echo "Downtown, ";
    elseif($line[3]=="ndg")
        echo "NDG, ";
    elseif($line[3]=="eei")
        echo "East End of Island, ";
    elseif($line[3]=="lw")
        echo "Lower Westmount, ";
    echo "\$$line[4], ";
    if($line[5]==1)
        echo "Fireplace, ";
    if($line[6]==1)
        echo "Laundromat, ";
    if($line[7]==1)
        echo "Indoor Parking, ";
    if($line[8]==1)
        echo "Outdoor Parking, ";
    if($line[9]==1)
        echo "Balcony";
}
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    