<?php include('constants.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/homestyle.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php
 if(isset($_GET['userid']))
        {
            //Get the Food id and details of the selected food
            $userid = $_GET['userid'];
        
        }
?>
    <!--Header -->
    <div class="header">
        <ul>
            <li><a href="./sell.php">Sell</a></li>
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
            <li style="float:right;"><a href="./user.php?userid=<?php echo $userid;?>"><i class="fa-solid fa-user"></i></a></i></li>
            <li style="float:right;"><a href="logout.php">logout</a></i></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></i></li>
            
    
        </ul>
    </div>
        <?php
        if(isset($_SESSION['login']))
                        {
                            echo $_SESSION['login'];
                            unset($_SESSION['login']);
                        }?>
    
            <div id="Hot-Pic">HOT PICKS FOR TODAY</div>
            <div class="sec1">
            <?php 
                //Display Items that are Active
                $sql = "SELECT * FROM products WHERE featured='Yes'";

                //Execute the Query
                $res=mysqli_query($conn, $sql);

                //Count Rows
                $count = mysqli_num_rows($res);

                //CHeck whether the items are availalable or not
                if($count>0)
                {
                    //Items Available
                    while($row=mysqli_fetch_assoc($res))
                    {
                        //Get the Values
                        $id = $row['id'];
                        $title = $row['title'];
                        $image_name = $row['image_name'];
                        $starttime=$row['starttime'];
                        ?>        
                <div class="row11">
                    <div id="product"><img src="./images/<?php echo $image_name;?>" id="pic"></div>
                    <div id="name-product"><?php echo $title;?></div>
                    <button type="button" id="button"><a id="placeabid"href="./bid.php?product_id=<?php echo $id; ?>&userid=<?php echo $userid;?>">Place a bid</a></button>
                            <script>
                                function set_timer(prod_id, stsrt_time){
                            // Set the date we're counting down to
                            var countDownDate = new Date(stsrt_time).getTime();

                            // Update the count down every 1 second
                            var x = setInterval(function() {

                            // Get today's date and time
                            var now = new Date().getTime();
                                
                            // Find the distance between now and the count down date
                            var distance = countDownDate - now;
                                
                            // Time calculations for days, hours, minutes and seconds
                            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                                
                            // Output the result in an element with id="demo"
                            document.getElementById("<?php echo $id;?>").innerHTML = days + "d " + hours + "h "
                            + minutes + "m " + seconds + "s ";
                                
                            // If the count down is over, write some text 
                            if (distance < 0) {
                                clearInterval(x);
                                document.getElementById("<?php echo $id;?>").innerHTML = "EXPIRED";
                            }
                            }, 1000);
                        }
                            </script>
                    <div class="timer">
                        <p id="<?php echo $id;?>">
                    <script type="text/javascript">
                        set_timer(<?php echo $id;?>,<?php echo $starttime;?>);
                    </script>
                    </p>
                    </div>
                </div>
            
                 <?php  
                  }
                }?>
            </div>       
            
           <!--Row 2-->
            <div class="row2">
                <p class="row-headline">BID & RAISE YOUR BUSINESS</p>
                <div id="ship"><span class="delivery"><i class="fa-solid fa-truck"></i></span>
                    <p id="shipping-txt">Free<br> Shipping</p>
                </div>
                <div id="support"><span class="support24logo"><i class="fa-solid fa-cloud-arrow-down"></i></span>
                    <p id="shipping-txt">24/7<br> Support</p>
                </div>
                <div id="moneyback"><span class="moneybacklogo"><i class="fa-solid fa-money-check-dollar"></i></span>
                    <p id="shipping-txt">100%<br> Moneyback</p>
                </div>

            </div>
            <br><br><br><br><br><br><br><br>
            
            
            <!--footer-->
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