<?php include('../constants.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/admin.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header -->
    <div class="header">
        <ul>
            <li><a href="./sell.html">Sell</a></li>
            <li>
                <div class="shop">
                    Shop By Category<span class="category-icon"><i class="fa-solid fa-chevron-down"></i></span>
                    <div class="dropcontent">
                        <a href="./category.html" class="catlink">Fashion</a>
                        <a href="./category.html" class="catlink">link2</a>
                        <a href="./category.html" class="catlink">link3</a>
                    </div>
                </div>
            </li>
            <li class="title">WHOLEAUC</li>
            <li style="float:right;"><a href="" title="Rules And Regulations"><i class="fa-solid fa-scale-balanced"></i></a></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-user"></i></a></i></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></i></li>
            
    
        </ul>
    </div>


    <!--BODY-->

    <p id="heading">CLICK ON TO SEE THE BIDDERS   POSITION</p>
    <?php
    $sql = "SELECT * FROM products";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
             if($count>0)
                {
                    //Items Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id=$row['id'];
                        $title = $row['title'];
                        $baseprice = $row['base_price'];
                        $quantity = $row['quantity'];
                        $image_name = $row['image_name'];
                        $description = $row['description'];
                        $category = $row['category'];
                        

    ?>
    <div class="image-main">
        <div class="image-sec1">
                <div class="imagerow1">
                    <img src="../images/<?php echo $image_name;?>" alt="image of<?php echo $title;?>" id="image">
                    <br>
                    <p id="image-def1"><?php echo $title;?></p>
                    <br>
                    <button type="button" id="button"><a id="placeabid" href="./abid.php?product_id=<?php echo $id;?>">show bid list</a></button>
                </div>
        </div>

    </div>
<?php
    }
    }
?>


     <!--footer-->
     <div class="footerhead">WHOLEAUC</div>
     <div class="footerdef"><br> CUSTOMER SERVICE<br><br>
         <small><br>GEC, PALAKKAD
             <br><b>+91 9897542652</b>
             <p id="companymail">support@wholeauc.in</p>

        </small>
         
     </div>
     <div class="footerleft">
         <B>KEEP IN TOUCH</B>
         <br><br>
          <small>Use the form below to drop us an email.We will get back to you within 24 hours.</small>
         <br>
         <form action="" method="post">
         <input type="email" placeholder="  E-mail">
         <button type="submit" id="send-btn">SEND ></button>
         </form>
         

     </div>
     <p id="footer-foot">Copyright © 2022 WHOLEAUC Inc. All Rights Reserved. Accessibility, User Agreement, Privacy, Cookies, Do not sell my personal information and AdChoice</p>

     

    
</body>
</html>