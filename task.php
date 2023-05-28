<!DOCTYPE html>
<html>

<head>
    <title>Task Assign</title>

    <style>
    input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        margin-top: 10px;
    }

    .option{
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
        margin-top: 10px;
    }


    h2 {
        /* background-color: #A700BB; */
        /* color: white; */
        display: inline;
        padding-top: 25px;
    }



    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #A700BB;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }


    .button:hover,
    .button:active,
    .button:focus {
        background: #d82bd8;
    }

    .head {
        margin-bottom: 25px;
        font-family: "Roboto", sans-serif;

    }


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

    .button{
 
  position:absolute;
  top: 300px; /*[wherever you want it]*/
  left:1px; /*[wherever you want it]*/

    }
    </style>


</head>

<body>

                          <!-- this task assign page -->



    <ul>
        <li><a href="index.html">Registration page</a></li>
        <li><a href="task.php">Task page</a></li>
        <li><a href="table.php">user table</a></li>
        <li><a href="usertable.php">Task details</a></li>
        

    </ul>










    <div class="form">
        <div class="head">
            <h2>Task Assign</h2>
        </div>









        <!-- sending this form values to excel.php -->


        <form mehthod="GET" action="excel.php">



            <!-- Getting user name from sql table using php  -->
            
                 <input type="text" name="task" placeholder="Task"><br>
            PENDING <input type="radio" name="status" value="pending">
            DONE <input type="radio" name="status" value="Done">
            
            
            <input class="button" type="submit" value="submit" name="submit" placeholder="Submit"><br>
            <?php


        $servername= "localhost";
        $username= "root";
        $password= "";
        $dbname= "userinfo";

        $conn =  mysqli_connect($servername,$username,$password,$dbname);
        $values= "SELECT * FROM user;";
        $result= mysqli_query($conn,$values);
        $row= mysqli_fetch_assoc($result);

        echo "<select name='name'>";
        echo "<option class='option' selected='selected' value='none'>select</option>";
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<option value='".$row['user_id']."'>".$row['Name']."</option>";
            }
        echo "</select>";
?>
            <!-- task form -->
           

        </form>
        
    

</body>





</html>