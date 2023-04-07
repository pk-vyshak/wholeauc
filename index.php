<?php include('constants.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in Page</title>
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <link href="./css/signinstyle.css" rel="stylesheet">
    
    <script src="https://kit.fontawesome.com/cd818db9e4.js"></script>
</head>
<body>

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

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
            ?>
           
     <!--body-->
     <div id="bg1">
                <img src="./images/download.png">

                <form action="" method="post" id="frm1">
                    <span class="usericn"><i class="fa-solid fa-user-crown"></i></span><input type="text" id="namelp" name="username" required placeholder="USERNAME">
                    <span id="lockicn"><i class="fa-solid fa-lock"></i></span><input type="password" id="passlp" name="password" required placeholder="PASSWORD">
                    <input type="submit" name="submit" value="LOGIN" id="loginbtn">
                    <a href="signup.php" id="lnkfrgtpass">New User? Signup</a>

                    

                </form>

    </div>
    <?php 

   
    if(isset($_POST['submit']))
    {
    
        $username = mysqli_real_escape_string($conn, $_POST['username']);       
        $password = mysqli_real_escape_string($conn, $_POST['password']);       
        $sql = "SELECT * FROM user WHERE  name='$username' AND password='$password'";
        $res = mysqli_query($conn, $sql);     
        $count = mysqli_num_rows($res);
        if($count==1)
        {
            $row = mysqli_fetch_assoc($res);
            $userid=$row['userid'];
            $_SESSION['login'] = "<div class='success' style='color: white;'>Login Successful.</div>";
            $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
            header('location:'.SITEURL.'main.php?userid='.$userid);
        }
        else
        {

            $_SESSION['no-login-message'] = "<div class='one' style='color: white;'>Username or Password did not match.</div>";
            header('location:'.SITEURL.'index.php');
        }


    }

?>

    <div id="elip1"></div>





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