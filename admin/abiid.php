<?php include('../constants.php');
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>placing a bid</title>
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/place-a-bidstyle.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>

</head>
<body>
    <!--Header-->
       
    <div class="header">
        <ul>
            <li>Shop By Category<span class="category-icon"><a href=""><i class="fa-solid fa-chevron-down"></i></a></i></span></li>
            <li class="title">WHOLEAUC</li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-user"></i></a></i></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></i></li>
            

        </ul>
    </div>
 <?php 
        //CHeck whether food id is set or not
        if(isset($_GET['product_id']))
        {
            //Get the Food id and details of the selected food
            $product_id = $_GET['product_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM products WHERE id=$product_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $baseprice = $row['base_price'];
                $quantity = $row['quantity'];
                $image_name = $row['image_name'];
                $description = $row['description'];
                $category = $row['category'];
            }
        }
    ?>
        
    <!--body-->

    <p class="bid-head"> Product Details</p>
    <img id="image1"src="../images/<?php echo $image_name;?>">
    <p id="timer">Ends in</p>
    <p id="category">category:&nbsp;&nbsp;&nbsp;<span id="cat-name"><?php echo $category;?></span></p>
    <p id="Quatity">Quatity:&nbsp;&nbsp;&nbsp;<span id="qat-amount"><?php echo $quantity;?></span></p>
    <p id="base-price">Base price:&nbsp;&nbsp;&nbsp;<span id="base">Rs.<?php echo $baseprice;?></span></p>
    <p id="description">Description&nbsp;&nbsp;&nbsp;</p>
    <p id="description-con"><?php echo $description;?>&nbsp;&nbsp;&nbsp;</p>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <!--bidderlist-->
    <div class="table">
        <table>
        <tr>
        <th >Company</th>
        <th>Contact</th>
        <th>Country</th>
        </tr>
        <tr>
        <td>Alfreds Futterkiste</td>
        <td>Maria Anders</td>
        <td>Germany</td>
        </tr>
        <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
        </tr>
        </table>
   </div>
  

    <!--Footer-->
    <div class="footer">
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
    </div>
        </body>

</html>