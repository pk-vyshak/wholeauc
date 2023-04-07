<?php include('../constants.php');
 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>placing a bid</title>
    <link href="../css/footer.css" rel="stylesheet">
    <link href="../css/header.css" rel="stylesheet">
    <link href="../css/abidstyle.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header-->
    <div class="header">
        <ul>
            <li><a href="sell.php">Sell</a></li>
            <li>
                
                <div class="shop">
                    Shop By Category<span class="category-icon"><i class="fa-solid fa-chevron-down"></i></span>
                    <div class="dropcontent">
                        <a href="./category.php?category=sports" class="catlink">Sports</a>
                        <a href="./category.php" class="catlink">link2</a>
                        <a href="./category.php" class="catlink">link3</a>
                    </div>
                </div>
            </li>
            <li class="title">WHOLEAUC</li>
            <li style="float:right;"><a href="" title="Rules And Regulations"><i class="fa-solid fa-scale-balanced"></i></a></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-user"></i></a></i></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></i></li>
            
    
        </ul>
    </div>


    <!--body-->
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

    <p class="bid-head"> BID lIST</p>
    <img id="image1"src="../images/<?php echo $image_name;?>" alt="image of <?php echo $title;?>">
    <p id="timer">Ends in</p>
    <p id="category">category:&nbsp;&nbsp;&nbsp;<span id="cat-name"><?php echo $category;?></span></p>
    <p id="Quantity">Quantity:&nbsp;&nbsp;&nbsp;<span id="qat-amount"><?php echo $quantity;?></span></p>
    <p id="base-price">Base price:&nbsp;&nbsp;&nbsp;<span id="base">Rs.<?php echo $baseprice;?></span></p>
    <p id="description">Description&nbsp;&nbsp;&nbsp;</p>
    <p id="description-con"><?php echo $description;?>&nbsp;&nbsp;&nbsp;</p>
   
   
  
       
        <button  id="submit" onclick="showDiv()"> Show Biders List</button>
        <div id="tablebid" style="display:none;">
            <table id="t1" style="width:40%;" >
                <tr style="height:70px;">
                    <th>SNO</th>
                    <th>USERNAME</th>
                    <th>BID-AMOUNT</th>
                    <th>TIME</th>
                </tr>

                <?php
    
                        
                        $sql2 = "SELECT user.name, bid.bid_amount, bid.time
                                    FROM bid
                                    INNER JOIN user
                                    ON user.userid=bid.user_id AND bid.product_id=$product_id"; 
                   
                        $res2 = mysqli_query($conn, $sql2);
                    
                        $count2 = mysqli_num_rows($res2);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count2>0)
                        {
                            //Order Available
                            while($row2=mysqli_fetch_assoc($res2))
                            {
                                //Get all the order details
                                $name=$row2['name'];
                                $bidamount=$row2['bid_amount'];
                                $time=$row2['time'];
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>.</td>
                                        <td><?php echo $name; ?></td>
                                        <td>Rs.<?php echo $bidamount; ?></td>
                                        <td><?php echo $time; ?></td>
                                    </tr>

                                <?php

                            }
                        }
                
                ?>
            </table>
        </div>
        <script type="text/javascript">
            function showDiv() {
                document.getElementById('tablebid').style.display = 'block';
            }
        </script>

    




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
