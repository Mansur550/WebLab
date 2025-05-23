<?php


session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    

    $username= filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
    $email= filter_input(INPUT_POST, "email",FILTER_SANITIZE_SPECIAL_CHARS);
    $address= filter_input(INPUT_POST, "address",FILTER_SANITIZE_SPECIAL_CHARS);
    $zip= filter_input(INPUT_POST, "zip",FILTER_SANITIZE_SPECIAL_CHARS);
    $password= filter_input(INPUT_POST, "password",FILTER_SANITIZE_SPECIAL_CHARS);
    $city= filter_input(INPUT_POST, "city",FILTER_SANITIZE_SPECIAL_CHARS);



   
        // $hash=password_hash($password,PASSWORD_DEFAULT);

        // $sql= "INSERT INTO user(user , password)
        //        VALUES('$username', '$hash')";

        // mysqli_query($conn, $sql);
        // echo"Registration sucessful";
        $_SESSION['user_data'] = [
            'username' => $username,
            'email' => $email,
            'address' => $address,
            'zip' => $zip,
            'password' => $password,
            'city' => $city
        ];
}
else{
    echo"No Data";
    
}


    



// ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confim Info</title>
    <style>
        body{
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top:50px;
            /* */

         
            
        }
        .uinfo{

           
            text-align: center;
            
            border-style: dotted;
            border-width: thick;
            width: 500px;
            padding-bottom:50px;
            height: 700px
            background-color:rgb(34, 95, 99);
            padding-top:30px;

            
      
            
        }
    </style>
    
</head>
<body>
    

<div class="uinfo">
<h1>User Details</h1>

    <p>Full Name:  <?php echo "$username"; ?> </p>
    <br>
    <p>Email Address:  <?php echo "$email"; ?> </p>
    <br>
    <p>Address:  <?php echo "$address"; ?> </p>
    <br>
    <p>Zip Code:  <?php echo "$zip"; ?> </p>
    <br>
    <p>Password:  <?php echo "$password" ?> </p>
    <br>
   
    <p>City:  <?php echo "$city"; ?> </p>
    <br>
    <a href="index.html">Cancel</a>

    <form action="submit.php" method="post">
    <input type="submit" value="Confirm and Register">
    </form>
</div>











</body>
</html>



