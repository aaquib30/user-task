<?php
$name= $_GET["name"];
$Tname= $_GET["task"];
$status=$_GET["status"];

$server="localhost";
$username="root";
$pass="";
$Db="userinfo";

 $conn= mysqli_connect($server,$username,$pass,$Db);





// Create table conn 
     // $table="CREATE TABLE `user`(
                // Task_no INT(3)
                  //   user_id INT(30),
                  //   TASK varchar(30),
                  //   STATUS varchar(10),
                  //   FOREIGN KEY(user_id) REFRENCE user(user_id),
                  //   PRIMARY KEY(Task_no,user_id)
                  // )";




    
    

// insert form data  to users task table  in sql 

if($conn){
    $insert= "INSERT INTO `conn` (`user_id`, `Task`, `Status`) VALUES ('$name','$Tname','$status'); " ;
    mysqli_query($conn,$insert); 
    header("location:task.php")    ;  
}

?>