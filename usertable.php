<!DOCTYPE html>
<html>

<head>
    <style>
    ul {
        list-style-type: none;
        margin: 0;
        padding: 2px;
        font-size: 18px;
        font-family: "Monospace", Lucida Console;
        padding: 5px;
        color: white;
        background-color: #a700bb;
        height: 40px;
    }

    li {

        display: inline;
        background-color: #a700bb;
        padding: 6px;
        border: 1px solid white;
    }


    a:link {

        color: white;
        text-decoration: none;

    }

    a:visited {

        color: white;
        text-decoration: none;

    }

    a:hover {

        color: black;
        text-decoration: none;

    }

    #form {
        margin-left: 91%;
        margin-top: -30px;
    }
    </style>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
        integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous">
    </script>

</head>


<body>



  <!-- THIS PAGE IS SHOWING USER DETAILS WITH THEIR TASK -->




  
    <!-- navbar -->


    <ul>
        <li><a href="index.html">Registration page</a></li>
        <li><a href="task.php">Task page</a></li>
        <li><a href="table.php">user table</a></li>
        <li><a href="#">Task details</a></li>
        <form method="get" action="table.php" id="form">
            <button name="export" value="export">Export to excel</button>
        </form>

    </ul>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Task Assign</th>
                <th scope="col">Status</th>

            </tr>
        </thead>
        <tbody>

            <?php



// GETTING USER DATA AND TASK DATA FROM SQL TABLE USING INNER JOIN



$conn=  mysqli_connect("localhost","root","","userinfo");
 
$select= "SELECT * from user INNER JOIN conn ON user.user_id=conn.user_id";

$result= mysqli_query($conn,$select);


// PAGINATION

$data= mysqli_num_rows($result);
$pages= 3;
$totalpages= ceil($data/$pages);
// echo $totalpages;


if(isset($_GET['page'])){

$pa=$_GET['page'];


}
else{
  $pa=1; 
}

$startpage=($pa-1)*$pages;

$sql="SELECT * FROM user INNER JOIN conn ON user.user_id=conn.user_id LIMIT ".$startpage.','.$pages;
$result= mysqli_query($conn,$sql);




if($result){
  while($row=mysqli_fetch_assoc($result)){
   $no=     $row['user_id'];
   $name=   $row['Name'];
   $age=    $row['Email'];
   $task=  $row['Task'];
   $status=  $row['Status'];
   
  echo   '<tr>
   
   <td>'.$no.'</td>
   <td>'.$name.'</td>
   <td>'.$age.'</td>
   <td>'.$task.'</td>';



if($status=="Done"){
    echo '<td>';
    echo '<span class="badge badge-success">';
    echo $status;
    echo '</span>';
    echo '</td>';

}

else if($status=="pending"){
    echo '<td>';
    echo '<span class="badge badge-danger">';
    echo $status;
    echo '</span>';
    echo '</td>';

}








'</tr>';
//    <td>'.$status.'</td>



}



}


?>

</tbody>
</table>





</body>

</html>
<?php
for($btn=1;$btn<=$totalpages;$btn++){
    
    echo '<a class="btn btn-primary" href="usertable.php?page='.$btn.'" >'.$btn.'</a>';

  }
  ?>