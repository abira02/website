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
        <h1>Enter Book Details</h1>
        <label for="book">Book Name:</label><br>
        <input type="text" name="book" required><br>
        <label for="author">Author Name:</label><br>
        <input type="text" name="author" required><br>
        <label for="cat">Category:</label><br>
        <input type="text" name="cat" required><br>
        <input type="submit" value="Add Book" name='submit'>
    </form>
    <?php
        if(isset($_POST['submit'])){
            $book = $_POST['book'];
            $author = $_POST['author'];
            $cat = $_POST['cat'];
            $sql = "INSERT INTO book VALUES('','$book','$author','$cat')";
            mysqli_query($con, $sql);
            echo "<script>alert('Successfully Added!');</script>";
        }
    ?>
</body>
</html>