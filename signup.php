<?php




session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    

    $username= filter_input(INPUT_POST, "username",FILTER_SANITIZE_SPECIAL_CHARS);
    $email= filter_input(INPUT_POST, "email",FILTER_SANITIZE_SPECIAL_CHARS);
    $address= filter_input(INPUT_POST, "address",FILTER_SANITIZE_SPECIAL_CHARS);
    $zip= filter_input(INPUT_POST, "zip",FILTER_SANITIZE_SPECIAL_CHARS);
    $password= filter_input(INPUT_POST, "password",FILTER_SANITIZE_SPECIAL_CHARS);
    $city= filter_input(INPUT_POST, "city",FILTER_SANITIZE_SPECIAL_CHARS);
    $color = htmlspecialchars($_POST['color']);
    
    




   
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
            'city' => $city,
            'color'=> $color,

        ];
}
else{
    echo"No Data";
    
}


 ?>

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
            background-color: <?= htmlspecialchars($bgColor) ?>;
            /* */

         
            
        }
       
        .uinfo{

           
            text-align: center;
            
            border-style: dotted;
            border-width: thick;
            width: 500px;
            padding-bottom:50px;
            height: 500px
            background-color:rgb(34, 95, 99);
            padding-top:10px;

            
      
            
        }
        
/* a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
} */


        /* .buttons{
            display: inline;

        } */

        /* .buttons a, .buttons input[type="submit"] {
            padding: 10px 15px;
            font-size: 16px;
            margin: 5px;
            /* text-decoration: none; */
            /* border: none; 
            border-radius: 4px;
        }

        .buttons a {
            background-color: #ccc;
            color: black;
        }

        .buttons input[type="submit"] {
            background-color: #4CAF50;
            color: white;
        } */

        .buttons {
        margin-top: 20px;
    }

    .buttons a,
    .buttons input[type="submit"] {
        display: inline-block;
        padding: 10px 20px;
        margin: 5px;
        font-size: 16px;
        text-decoration: none;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .buttons a {
        background-color: #EB5406;
        color: black; 
        border: 1px solid #999;
         transition: background-color 0.3s; 
    }

    .buttons a:hover {
        background-color:rgb(205, 19, 9);
    }

    .buttons input[type="submit"] {
        background-color:rgb(28, 224, 34);
        color: white;
        transition: background-color 0.3s;
    }

    .buttons input[type="submit"]:hover {
        background-color:rgb(6, 98, 10);
    }

    </style>
    
</head>
<body>
    

<div class="uinfo">
<h1>User Details</h1>
<br><br>

    <p>Full Name:  <?php echo "$username"; ?> </p>
    
    <p>Email Address:  <?php echo "$email"; ?> </p>
    
    <p>Address:  <?php echo "$address"; ?> </p>

    <p>Zip Code:  <?php echo "$zip"; ?> </p>

    <p>Password:  <?php echo "$password" ?> </p>
    <p>City:  <?php echo "$city"; ?> </p>
    <p><strong>Color:</strong> <?php echo $color; ?></p>
    

    

</div>

<div class="buttons">
    <a href="index.html">Cancel</a>

        <form action="submit.php" method="post" style="display: inline;">
                <input type="submit" value="Confirm and Register">
        </form>

    </div>






</body>
</html>



