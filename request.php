<?php
session_start();
require_once 'database.php'; 

if (!isset($_SESSION["user"])) {
    header("Location: index.html");
    exit();
}

$user = $_SESSION["user"];

// Fetch 20 cities from DB (with country and AQI)
$cities = [];
$sql = "SELECT id, city, country FROM aqiindex LIMIT 20";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cities[] = $row;
    }
} else {
    die("Query failed: " . mysqli_error($conn));
}


?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>


ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color:rgb(28, 166, 33);;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 20px 22px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.logout {
  background-color: #e74c3c;
  /* border-radius: 5px; */
}

.active {
  background-color: #04AA6D;
}
/* .main {
    margin: auto;
     display: flex;
    height: 1200px;
    width: 70%;
  } */

.container {

            max-width: 100%;
            
            padding:20px ;
            border: 1px solid #ccc;
            background: #f9f9f9;
        }
        .user-info {
            margin-bottom: 1px solid black;
        }
        
        /* .logout {
            display: inline-block;
            padding: 0.5rem 1rem; 
            background: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        } */
        .logout:hover {
            background:rgb(195, 43, 26);
        } 
        .user-info img{
        width:150px;
        height:150px;
        object-fit:cover;
        border-radius:100%;
        margin-bottom:15px;
        display:block}

        body  {
        font-family: Arial, sans-serif;
        
       
        
    } 
    table {
        margin: 20px auto;
        border-collapse: collapse;
        width: 80%;
        max-width: 700px;
        background: white;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    }
    th, td {
        padding: 12px 15px;
        border: 1px solid #ddd;
        text-align: center;
    }
    th {
        background-color: #4CAF50;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }
    tr:nth-child(even) {
        background-color: #f2f2f2;
    }
    p.message {
        color: #cc0000;
        font-weight: bold;
    }

    form{
  
  display: flex;
  flex-direction: column;
  align-items: center;
  /* padding: 10px 0px ; */
}
 
   

    button[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    font-size: 16px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    max-width: 100px;
    margin: auto;
        
}

button[type="submit"]:hover {
    background-color:rgb(16, 141, 22);
}

#request th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}


</style>


<title>Request</title>
</head>
<body style="background-color: <?php echo $_COOKIE['bgcolor']?>">
<div class="main">
    

        <ul>
            <li><a href="profile.php">My Profile</a></li>
            <!-- <li><a href="#news">News</a></li> -->
            <!-- <li><a href="#contact">Contact</a></li> -->
            <li style="float:right"><a class="logout" href="logout.php">Log Out</a></li>
        </ul>




<div class="container">
        
        <div class="user-info">
        <?php if (!empty($user['profile_photo'])): ?>
            <img src="<?= htmlspecialchars($user['profile_photo']); ?>" alt="Profile Photo">
        <?php else: ?>
            <p>No profile photo uploaded.</p>
        <?php endif; ?>
            <h2>Welcome, <?= htmlspecialchars($user["username"]) ?>!</h2>
            <p><strong>Email:</strong> <?= htmlspecialchars($user["email"]) ?></p>
            <p><strong>Address:</strong> <?= htmlspecialchars($user["address"]) ?></p>
            
        </div>
        

</div>


<div class="container2" style="padding-top:100px;"> 
					
    <form action="showaqi.php" method="post" onsubmit="return validateSelection()">
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Select</th>
                <th>Id</th>
                <th>City</th>
                <th>Country</th>
              
            </tr>
        </thead>
        <tbody>
            <?php foreach ($cities as $city): ?>
                <tr>
                    <td><input type="checkbox" name="selected_ids[]" value="<?= $city['id'] ?>" class="item_id"></td>
                    <td><?= htmlspecialchars($city['id']) ?></td>
                    <td><?= htmlspecialchars($city['city']) ?></td>
                    <td><?= htmlspecialchars($city['country']) ?></td>
                    
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>

    


    <div class="submit"></div><button type="submit">Submit</button>
            </div>

    </form>
</div>

</div>

<script>
  function toggleAll(source) {
    const checkboxes = document.querySelectorAll('.item_id');
    checkboxes.forEach(cb => cb.checked = source.checked);

    const checked = document.querySelectorAll('.item_id:checked');
    if (checked.length > 10) {
        alert('You cannot select more than 10 rows.');
        source.checked = false;
        checkboxes.forEach(cb => cb.checked = false);
    }
  }

  function validateSelection() {
    const checkedItems = document.querySelectorAll('.item_id:checked');
    if (checkedItems.length > 10) {
        alert('You cannot select more than 10 rows.');
        return false;
    }
    return true;
  }
</script>







</body>
</html>

