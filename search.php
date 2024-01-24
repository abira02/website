<?php include('./connection.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css?v<?php echo time();?>">
    <title>Library</title>
</head>
<body>
    <?php include('./header.php');?>
    <form method="post" class='forms'>
        <h1>Enter category to search book</h1>
        <label for="cat">Category:</label><br>
        <input type="text" name="cat" required><br>
        <input type="submit" value="Search" name='search'>
    </form><br><br>
    <?php
        if(isset($_POST['search'])){
            $cat = $_POST['cat'];
            $sql = "SELECT * FROM book WHERE category='$cat'";
            $res = mysqli_query($con, $sql);
            if(mysqli_num_rows($res) != 0){
                echo "<table border = 1>
                <tr><th>ID</th><th>Book</th><th>Author</th><th>Category</th></tr>";
                foreach($res as $row){
                    echo "<tr><td>".$row['id']."</td><td>".$row['book']."</td><td>".$row['author']."</td><td>".$row['category']."</td></tr>";
                }
                 echo "</table>";
            }
            else{
                echo "<script>alert('No Data available!');</script>";
            }
        }
    ?>
</body>
</html>