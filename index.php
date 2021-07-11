<?php
include "DB_connection.php";

// insert todo into the database table my_todo_list from the form
$error = ""; // define $error variable and set to empty value
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["todo"])){
        $error = "Todo CANNOT be empty!";
    }else{
        $todo_to_be_added = $_POST["todo"];
        $date = date("jS \ F, Y h:i A");
        $sql = "INSERT INTO my_todo_list(t_task, t_date) VALUES('$todo_to_be_added ', '$date')";
        $result = mysqli_query($conn, $sql);
        header("Location:index.php?New_Todo_inserted");
    }
}

// delete todo from the database table my_todo_list
if (isset($_GET["delete_todo"])){
    $todo_to_be_deleted_ID = $_GET["delete_todo"];
    $sql = "DELETE FROM my_todo_list WHERE t_id = $todo_to_be_deleted_ID";
    $result = mysqli_query($conn, $sql);
    header("Location:index.php?Todo_deleted");
}
?>
<!doctype html>
<html>
<head>
<title>Todo List Application using PHP and MySQL</title>
<link rel="icon" href="favicon.jpg" type="image/gif">
<meta charset="UTF-8">
<meta name="keywords" content="Register page, PHP session">
<meta name="author" content="Emmanuel Onah">
<!-- <meta http-equiv="refresh" content="100"> -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>

body{
  background-image: url('humanEdge.jpg');
  background-repeat: no-repeat;
  background-size: cover;
}    

input[type=text]{
  color: white;  
  background-color: rgb(60 60 60);
  width: 46%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  text-align: center; 
  border-radius: 10px;
  font-family: "Comic Sans MS";
  font-weight: bold;
  font-size: 25px;
}

input[type=submit]{
  color: white;  
  background-color: Green;
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-radius: 10px;
  font-weight: bold;
  font-size: 16px;
}

.edit{
  background-color: Green !important;
  color: white;
  padding: 10px 20px;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: Times;
}

.delete{
  background-color: #ff0000  !important;
  color: white;
  padding: 10px 20px;
  border-radius: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-family: Times;
}

a:hover{
    background-color: grey !important;
}

table{
  border-spacing: 5px;
  border-radius: 10px;
  width: 80%;
  border: 2px solid black;
  margin-right: auto;
  margin-left: auto;
}

th, td {
  text-align: center;
  padding: 10px;
}

th{
    background-color: MediumSeaGreen;
    font-family:'Comic Sans MS';
    font-weight: bold;
    font-size: 24px;
    border-radius: 5px;
}

td{
    background-color: LightGray;
    font-family:'Comic Sans MS';
    font-weight: bold;
    font-size: 15px;
    border-radius: 5px;
}

h1{
    font-weight: bold; 
    font-size: 50px;
    text-shadow: 2px 2px grey;
}

</style>
</head>

<body>

    <div style="display:block; text-align:center; font-family:Comic Sans MS;">
            <div style="display:block;width:80%;border:1px solid #ddd;border-radius:10px;margin-right:auto;margin-left:auto;background-color:LightGray;">
                <h1>My Todo List Application</h1>
                <span style="text-align:center;font-family:Comic Sans MS;font-weight:bold;font-size:20px;color:red;"><?php echo $error ?></span>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" name="todo" placeholder="Enter your Todo here"><br>
                        <input type="submit" name="submitTodo" value="Add a New Todo">
                    <?php  ?>
                    </form>
            </div>
    </div>

    <div>
        <table>
         <caption><h2 style="background-color:black;font-family:Times;color:white;padding:20px;border-radius:10px">My Todo List</h2></caption>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Todo</th>
                    <th>Date</th>
                    <th>Edit Todo</th>
                    <th>Delete Todo</th>
                </tr>
            </thead>
            <tbody>

            <?php 
            // display todo in database table (mytodolist) 
            $sql = "SELECT * FROM my_todo_list";
            $results = mysqli_query($conn, $sql);
            // an alternative way to achieve auto increment of the ID column is to set loop counter to $i = 1 and loop increment to $i++; 
            while($row = mysqli_fetch_assoc($results)){
                $t_id = $row["t_id"];
                $t_task = $row["t_task"];
                $t_date = $row["t_date"]; 
            ?>
                <tr>
                    <td><?php echo $t_id; ?></td>
                    <td style="text-align:left;"><?php echo $t_task; ?></td>
                    <td style="text-align:left;"><?php echo $t_date; ?></td>
                    <td><a href="edit.php?edit_todo=<?php echo $t_id; ?>" class="edit">Edit</a></td>
                    <td><a href="index.php?delete_todo=<?php echo $t_id; ?>" class="delete">Delete</a></td>
                </tr>
            <?php 
            } 
            ?>    
            </tbody>
        </table>
    </div>
</body>
</html> 