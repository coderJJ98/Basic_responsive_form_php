<?php
$insert= false;
if(isset($_POST['name']))
{
    //set connection variables
$sever="localhost";
$username="root";
$password="";
    //create the connections
$con = mysqli_connect($sever,$username,$password);

//check wheather the connection is established or not.
if(!$con){
    die("Connection to the database failed due to ".mysqli_connect_error());
}
//echo "Database is sucessfully connected !";

//collect post variables

$name=$_POST['name'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$desc=$_POST['desc'];

//execute the query.

$sql ="INSERT INTO `trip`.`trip` ( `name`, `age`, `gender`, `email`, `phone`, `other`, `dt`)
 VALUES ( '$name', '$age', '$gender', '$email', '$phone', '$desc', 'current_timestamp()');"; 

//echo $sql;

//flag the succes of the query.
if($con->query($sql)== true){
    //echo "Data Successfully inserted !";
    $insert= true;
}
else{
    echo "Error: $sql <br> $con->error";
}
// close the database connection. It is very important to close the connection.
$con->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <img src="bg.jpg" class="bg" alt="New york city">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap"
     rel="stylesheet">

    <title>Welcome to the UCAN TRAVLES form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> Welcome to USA trip</h1>
        <p> Enter your details and submit this form to confirm your participation
            in the trip.
        </p>
        <?php
            if($insert==true){
                echo"<p class='submitmsg'>
                Thanks for submitting your form. We are happy to see you joining
                us for the USA trip with UCAN travles.

        </p>";
            }
        ?>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
            <textarea name="desc" id="desc" placeholder="Enter any other information"
             cols="30" rows="12">

            </textarea>
            <button class="btn">Submit</button>
            

        </form>
    </div>
    <script src="index.js">
        </script>
    
    
</body>
</html>