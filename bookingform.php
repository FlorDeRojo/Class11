<!-- Importing header -->
<?php
require('header.php');
?>

<!DOCTYPE html>
<html>
  <head>
   <title>Agencia Flor de Maga - Booking Form</title>
  </head>
  <body>
    <h2>
    &nbsp;&nbsp;Book With Us
    </h2>

    <h4>
    </br>&nbsp;&nbsp;&nbsp;Before we start, here are some things you need to know. 
    </br>&nbsp;&nbsp;&nbsp;The Stays are per night as indicated on the Stays page.
    </br>&nbsp;&nbsp;&nbsp;We do not charge differently based on how many adults and children there are. It is one fixed price.
    </br>&nbsp;&nbsp;&nbsp;If you are a first time visiter and/or user of Agencia Flor de Maga, you get a $50 discount.
    </br>&nbsp;&nbsp;&nbsp;If you forget the prices for the stays, food, and activities, you can click on those words and you will be led to the page.
    </br>&nbsp;&nbsp;&nbsp;The only acceptable input for stays, food, and activities are numbers (e.g 1...5 or 1...3).
    </br>&nbsp;&nbsp;&nbsp;The only acceptable input for first time visiter is yes or no (e.g yes, Yes, YES).
    </br>&nbsp;&nbsp;&nbsp;The only acceptable input for how many nights you will be staying is a number (e.g 1...10...).
    </br>&nbsp;&nbsp;&nbsp;Nothing else will be accepted! Thank you for booking with us!
    </h4>

    <form action="processbooking.php" method="post">
    <table>
    <tr>
      <td>Offerings</td>
      <td >Package</td>
    </tr>
    <tr>

      <style> 
      a {
        text-decoration:none
      }
      a{
        color:black
      }
      </style>

    <td><a href="stays.php">Stays</a></td>
      <td><input type="text" name="stayschoice" size="5" maxlength="3" /></td>
    </tr>

    <tr>
     <td>How many nights will you stay?</td>
     <td><input type="text" name="nightchoice" size="5" maxlength="3" /></td>
    </tr>

    <tr>
     <td>How many adults?</td>
     <td><input type="text" name="adult" size="5" maxlength="3" /></td>
    </tr>

    <tr>
     <td>How many children?</td>
     <td><input type="text" name="children" size="5" maxlength="3" /></td>
    </tr>

    <tr>
     <td><a href="activities.php">Activities</a></td>
     <td><input type="text" name="activitieschoice" size="5" maxlength="3" /></td>
    </tr>

    <tr>
     <td><a href="food.php">Food</a></td>
     <td><input type="text" name="foodchoice" size="5" maxlength="3" /></td>
    </tr>
  
    <tr>
     <td> First Time Visiter</td>
     <td><input type="text" name="userchoice" size="5" maxlength="3" /></td>
    </tr>

    <tr>
    </tr>
    <tr>
     <td colspan="2" style="text-align: center;"><input type="submit" value="Book Itinerary" /></td>
    </tr>
    </table>
    </form>
  </body>
</html>

