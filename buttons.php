<?php

session_start();

$con= mysqli_connect('localhost', 'root', 'Raptour92', 'alchemy');

        $query= "SELECT * FROM users WHERE id=4";
    
        $query_run= mysqli_query($con, $query);
        
        if(mysqli_num_rows($query_run)){
            while($row = mysqli_fetch_array($query_run)){
                if($row['password']= md5('$password')){
                    foreach($row as $key=>$value){
                        if(is_string($key)){
                            $_SESSION[$key] = $value;
                        }
                    }
                    echo $_SESSION['usertype'];
                }else {
                    echo 'oasswird is wriong';
                }
            }
        }else{
            echo 'email';
        }
           








