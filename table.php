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
        margin-top: -10px;
    }

    #pagination{
        color: black;
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


    <!-- navbar -->


    <ul>
        <li><a href="index.html">Registration page</a></li>
        <li><a href="task.php">Task page</a></li>
        <li><a href="table.php">user table</a></li>
        <li><a href="usertable.php">Task details</a></li>
        <form method="get" action="#" id="form">
            <button name="export" value="export" onclick="export_data()">Export to excel</button>
        </form>

    </ul>



    <table class="table" id="data">
        <thead>
            <tr>
                <th scope="col">User ID</th>
                <th scope="col"> Name</th>
                <th scope="col">Email</th>
                <th scope="col">Number</th>

            </tr>
        </thead>
        <tbody>

            <?php

    // Getting values from user sql table to show 

$conn=  mysqli_connect("localhost","root","","userinfo");
 
$select= "SELECT * FROM `USER` ";

$result= mysqli_query($conn,$select);










// PAGINATION




$data= mysqli_num_rows($result);
$pages= 4;
$totalpages= ceil($data/$pages);
// echo $totalpages;


if(isset($_GET['page'])){

$pa=$_GET['page'];


}
else{
  $pa=1; 
}

$startpage=($pa-1)*$pages;

$sql="SELECT * FROM `USER` LIMIT ".$startpage.','.$pages;
$result= mysqli_query($conn,$sql);



if($result){
  while($row=mysqli_fetch_assoc($result)){
   $no=     $row['user_id'];
   $name=   $row['Name'];
   $age=    $row['Email'];
   $phone=  $row['Number'];
   
  echo   '<tr>
   
   <td>'.$no.'</td>
   <td>'.$name.'</td>
   <td>'.$age.'</td>
   <td>'.$phone.'</td>
 </tr>';



}




}





echo "</tbody>";
echo "</table>";


for($btn=1;$btn<=$totalpages;$btn++){
    
    echo '<a class="btn btn-primary" href="table.php?page='.$btn.'" >'.$btn.'</a>';

  }

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

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"> </script>


<script>

function export_data(){

let data  = document.getElementById('data');
var fp=XLSX.utils.table_to_book(data, {sheet : "data"});

XLSX.write(fp, {

bookType : 'xlsx',
type: 'base64'


});

XLSX.writeFile(fp, 'test.xlsx');


}








</script> -->


</body>

</html>