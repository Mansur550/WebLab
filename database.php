<?php

        $db_server="localhost";
        $db_user="root";
        $db_password="";
        $db_name="aqiprojectdb";
        $conn="";

        try{
            $conn= mysqli_connect($db_server,
                              $db_user,
                              $db_password,
                              $db_name);
            // echo "connected";

        }

        catch(mysqli_sql_exception){
             echo "colud not connect!";
        }


        

?>