<?php
include "function.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        if(isset($_POST['add'])){
            $a=$_POST['num1'];
            $b=$_POST['num2'];
            echo sum($a,$b);
        }
    ?>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="text" name="num1">
        <input type="text" name="num2">
        <button type="submit"></button>
    </form>
</body>
</html>