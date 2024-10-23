<?php
require('header.php');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Agencia Flor de Maga - Booking Itinerary</title>
  </head>
    <h1>&nbsp;Agencia Flor de Maga: Booking Itinerary and Receipt</h1>
    <!-- <img class="book" src= "Postcard.jpg" alt="AFM" height = 400 width = 650/>  -->
    <body>
    <?php
    date_default_timezone_set('US/Eastern');
    echo "<p>&nbspOrder processed at ".date('l\, F jS Y h:i A')."</p><br>"; 
    $stayschoice = $_POST['stayschoice'];
    $activitieschoice = $_POST['activitieschoice'];
    $foodchoice = $_POST['foodchoice'];
    $userchoice = $_POST['userchoice'];
    $nightchoice = $_POST['nightchoice'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];

    // if the stay selected is Choice #1-5, display the package selected
    //else display the package is not selected

    if ($stayschoice >= 1 && $stayschoice <=5) {
      echo '&nbspStay Package: ',$stayschoice. '</br>';
    }
    else {
      $stayschoice = "Not selected.";
      echo '&nbspStay Package: ',$stayschoice. '</br>';
    }

    // if the user specified how many nights will you stay, display the specification
    //else display the user did not specify

    if ($nightchoice > 0){
      echo '&nbspHow many nights will you stay?: ',$nightchoice. '</br>';
    }
    else {
      if ($nightchoice == 0){
        $nightchoice = 0;
      }
      else {
        $nightchoice = "Not specified.";
        echo '&nbspHow many nights will you stay?: ',$nightchoice. '</br>';
      }
    }

    // if the user specified how many adults, display the specification
    //else display the user did not specify

    if ($adult > 0){
      echo '&nbspHow many adults?: ',$adult. '</br>';
    }
    else {
      if ($adult == 0){
        $adult = 0;
      }
      else {
        $adult = "Not specified.";
        echo '&nbspHow many adults?: ',$adult. '</br>';
      }
    }

    // if the user specified how many children, display the specification
    //else display the user did not specify

    if ($children > 0){
      echo '&nbspHow many children?: ',$children. '</br>';
    }
    else {
      $children = "Not specified.";
      echo '&nbspHow many children?: ',$children. '</br>';
    }

    // if the activities package selected is Choice #1-3, display the package selected
    //else display the package is not selected

    if ($activitieschoice >= 1 && $activitieschoice <=3) {
      echo '&nbspActivities Package: ',$activitieschoice. '</br>';
    }
    else {
      $activitieschoice = "Not selected.";   
      echo '&nbspActivities Package: ',$activitieschoice. '</br>';
    }

    // if the food package selected is Choice #1-3, display the package selected
    //else display the package is not selected

    if ($foodchoice >= 1 && $foodchoice <=3) {
      echo '&nbspFood Package: ',$foodchoice. '</br>';
    }
    else {
      $foodchoice = "Not selected.";
      echo '&nbspFood Package: ',$foodchoice. '</br>';
    }

    // if the user specified they are a first time visiter or not, display the specification
    //else display the user did not specify

    if ($userchoice == "yes" || $userchoice == "Yes"  || $userchoice == "YES" || $userchoice == "no" || $userchoice == "No" || $userchoice == "NO") {
      echo '&nbspFirst Time Visiter: ',$userchoice. '</br>';
    }
    else {
      $userchoice = "Not specified.";
      echo '&nbspFirst Time Visiter: ',$userchoice. '</br>';
    }

    //Intialize total to zero
    $total = 0;

    //If stay selction is as specified, add to total, else add zero to total
    if ($stayschoice == "1") {
      $total += 150 * $nightchoice;
    } elseif ($stayschoice == "2") {
      $total += 250 * $nightchoice;
    } elseif ($stayschoice == "3") {
      $total += 350 * $nightchoice;
    } elseif ($stayschoice == "4") {
      $total += 450 * $nightchoice;
    } else {
      if($stayschoice == "5"){
        $total += 550 * $nightchoice;
      }
      else{
        $total += 0;
      }
    }

     //If activities selction is as specified, add to total, else add zero to total
    if ($activitieschoice == "1") {
      $total += 30;
    } elseif ($activitieschoice == "2") {
      $total += 60;
    } elseif ($activitieschoice == "3") {
      $total += 90;
    }
    else{
        $total += 0;
    }
  

     //If food selction is as specified, add to total, else add zero to total
    if ($foodchoice == "1") {
      $total += 50;
    } elseif ($foodchoice == "2") {
      $total += 100;
    } elseif ($foodchoice == "3") {
      $total += 150;
    }
    else{
        $total += 0;
    }
    

    //If user is a first time user, then apply $50 discount
    //otherwise apply no discount
    $discount = 0;
    if (($userchoice == "yes" || $userchoice == "Yes" || $userchoice == "YES") && ($stayschoice >= 1 && $stayschoice <=5) || ($activitieschoice >= 1 && $activitieschoice <=3) || ($foodchoice>= 1 && $foodchoice <=3)){
       $discount = 50;
    }
    else{
       $discount = 0;
    }

    $tax = 0.0875;
  
    //if user is a first time user, display discount, total amount, and total after discount  
    //No output unless there is at least one adult and they are staying at least one night
    if ($adult >= 1 && $nightchoice > 0 && ($stayschoice >= 1 && $stayschoice <=5)){
    if ($userchoice == "yes" || $userchoice == "Yes" || $userchoice == "YES"){
         echo "<p>&nbspFirst Time Discount: $".$discount.'</br>';
         $tax = $tax * ($total - $discount);
         echo "&nbspSubtotal: $".$total.'</br>';
         if(($total - $discount < 0) || (($total - $discount) + $tax < 0)){
         echo "&nbspSubtotal w/ Discount: $".$total - $discount.'</br>';
         echo "&nbspTotal (8.75% Sales Tax Applied): $" .number_format(($total - $discount) + $tax, 2).'</br>';
         echo "&nbspAny negative amount can be used as applied credit toward future bookings. Future credit: $" .number_format(((($total  * $nightchoice) - $discount) + $tax) * -1, 2);
         }
         else {
          echo "&nbspSubtotal w/ Discount: $".$total - $discount.'</br>';
          echo "&nbspTotal (8.75% Sales Tax Applied): $" .number_format(($total - $discount) + $tax, 2).'</br>';
         }
    }
    else {
         $tax = $tax * $total;
         echo "<p>&nbspSubtotal: $".$total.'</br>';
         echo "&nbspTotal (8.75% Sales Tax Applied): $" .number_format($total  + $tax, 2).'</br>';
        }
    } 
    else {
    echo "&nbspThere must be a least one adult staying one night.";
    }
  
    ?>    
    </body>
  </html>
  

