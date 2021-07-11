<?php
include "DB_connection.php";

// checks, stores and query the ID of the selected task to be edited from the index.php page in the variable $task_to_be_updated_ID
if (isset($_GET["edit_todo"])){
    $todo_to_be_updated_ID = $_GET["edit_todo"];
    $sql = "SELECT * FROM my_todo_list WHERE t_id = '$todo_to_be_updated_ID'";
    $result = mysqli_query($conn, $sql);
    $fetched_row = mysqli_fetch_assoc($result);
} 

// edit todo in the database table my_todo_list
$error = ""; // define $error variable and set to empty value
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["editedTodo"])){
        $error = "Todo CANNOT be empty!";
    }else{
        $editedTodo = $_POST["editedTodo"];
        $sql = "UPDATE my_todo_list SET t_task = '$editedTodo' WHERE t_id = '$todo_to_be_updated_ID'";
        $result = mysqli_query($conn, $sql);
        header("Location:index.php?Task_Edited");
    }
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

input[type=text] {
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

input[type=submit] {
  color: white;  
  background-color: Green;
  width: 15%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border-radius: 10px;
  font-weight: bold;
  font-size: 18.5px;
}

h1{
    font-weight: bold; 
    font-size: 50px;
    text-shadow: 2px 2px grey;
}

</style>
</head>

<body>

    <div style="display:block; text-align:center; font-family:'Comic Sans MS';">
            <div style="display:block;width:80%;border:1px solid #ddd;border-radius:10px;margin-right:auto;margin-left:auto;background-color:LightGray;">
                <h1>My Todo List Application</h1>
                <span style="text-align:center;font-family:Comic Sans MS;font-weight:bold;font-size:20px;color:red;"><?php echo $error ?></span>
                    <form action="" method="post">
                        <input type="text" name="editedTodo" value="<?php echo $fetched_row["t_task"]; ?>"><br>
                        <input type="submit" name="submitEdit" value="Update Todo">
                    <?php  ?>
                    </form>
            </div>
    </div>
</body>
</html>