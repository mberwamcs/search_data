<?php
       // include('search.php');
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search by keyword</title>
</head>
<body>
    <h3>Search in the Database</h3>
    <form action="" method="POST">
        <input type="text" name="searchteam" placeholder="Search ..."><br><br>
        <input type="submit" name="search" id="search" value="Search">
    </form>
    <?php
       $db =  mysqli_connect("localhost", "root", "", "gesyclean"); 
       //mysqli_select_db("gesyclean");

       if(!$db){
        echo "connection error";
       } else{ }
      //php 'trim()' -removes spaces
      //'sql mysqli_real_escape_string()' -Escapes special characters in a string for use in an SQL statement
      if(isset($_POST['search'])){
      $search =trim($_POST['searchteam']); 
      //
      
      $query = "SELECT * FROM timesheet WHERE `acc_name` LIKE '%$search%'";
      $find_data = mysqli_query($db, $query);

     // if(!$find_data){
       // echo "!!!!!!!";
        //($find_data);
     // }
      //else{
       while($row = mysqli_fetch_assoc($find_data)){

        $name = $row['acc_name'];


        echo "$name<br/>";
       }
   // }
}else {
    echo "Enter a keyword to search";
}
    ?>
</body>
</html>