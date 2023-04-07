<?php include('constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        highli
        <input type="submit" name="submit">
    </form>
    <?php
     if(isset($_POST['submit']))
                {
                    echo "good";
                    // $order_date = date("Y-m-d h:i:sa"); 
                    // echo $order_date;
                    // $sql2 = "INSERT INTO time SET 
                    //     time = '$order_date'";
                    // $res2 = mysqli_query($conn, $sql2);

                    // if($res2==true)
                    // {
                    //     echo"successful";
                    // }
                }
            ?>
</body>
</html>