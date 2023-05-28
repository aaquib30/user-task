<?php


$a= htmlspecialchars($_GET["username"]);
$b=htmlspecialchars($_GET["email"]);
$c=htmlspecialchars($_GET["number"]);
$name='';
$email='' ;
$number='';   


  // validating user input at server side using php REgex
    if(preg_match("/[a-zA-Z]/",$a)){
        
        $name=$a; 
        return true;     
    }else{
      return false;
    }

    if (preg_match("/[a-z0-9]+@[a-z]+\.[a-z]{2,3}/", $b)){

        $email=$b;
    }

    if (preg_match("/[0-9]{10}/",$c)){

        $number=$c;
}

// coonection with sql file

$servername= "localhost";
$username= "root";
$password= "";

          ////// CREATING DATABASE ///////////////

                 // $conn =  mysqli_connect($servername,$username,$password);

                // $database= "CREATE DATABASE userinfo";

                 // $dbname= mysqli_query($conn,$database);



     $dbname= "userinfo";
                 
     $conn =  mysqli_connect($servername,$username,$password,$dbname);
                 
                 
                 
                 
                 
                 
                 
                         /////////Creating table ///////////

        
                  // $table="CREATE TABLE `user`(
                  //   user_id INT(30) AUTO_INCREMENT PRIMARY KEY,
                  //   NAME varchar(30),
                  //   Email TEXT,
                  //   Number bigint(10)
                  // )";
        
                  // $conn->query($table);



                  
// insert user data into sql table
if(isset($_GET["submit"])){
if ($conn)
{
  $insert="INSERT INTO `user` ( `Name`, `Email`, `Number`) 
  VALUES ( '$name', '$email', '$number')";
  $data= mysqli_query($conn,$insert);
  
}

if($data){
  
    header('location:table.php');
}
else{
  echo "Please enter values".mysqli_connect_error();
}
}










// Export user data into excel sheet from sql table
if(isset($_GET["export"])){

  $query = "SELECT `Name` ,`Email`, `Task`,`Status` FROM user INNER JOIN conn ON user.user_id=conn.user_id;";
  $result= mysqli_query($conn, $query);
  if (!$result = mysqli_query($conn, $query)) {
      exit(mysqli_error($conn));
  }
  
  $users = array();
  if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
          $users[] = $row;
      }
  }
  $output = fopen('user.csv', 'w');
  fputcsv($output, array( 'Name', 'Email', 'Task','Status'));
  
  if (count($users) > 0) {
    foreach ($users as $row) {
      fputcsv($output, $row);
      
      header('Content-Type: text/csv; charset=utf-8');
      header("Location: user.csv");
      header('Content-Disposition: attachment; filename=User.csv');
      }
  }


}







?>