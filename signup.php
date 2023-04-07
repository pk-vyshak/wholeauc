<?php include('constants.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Page</title>
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <link href="./css/signupstyle.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header-->
            
    <div class="header">
        <ul>
            <li><a href="">Sell</a></li>
            <li>Shop By Category<span class="category-icon"><a href=""><i class="fa-solid fa-chevron-down"></i></a></i></span></li>
            <li class="title">WHOLEAUC</li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-cart-shopping"></i></a></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-user"></i></a></i></li>
            <li style="float:right;"><a href=""><i class="fa-solid fa-magnifying-glass"></i></a></i></li>
            

        </ul>
    </div>


    <!--Content Of Signup Page-->
    <div class="formsignup">
            <span class="cartsymbol"><i class="fa-solid fa-cart-flatbed"></i></span>
            <br>
        <div class="signupform">
            <form name="signupform" method="post">
                <input type="text" placeholder="ENTER YOUR NAME" id="namein" name="name" required>
                <br>
                <br>
                <input type="email" placeholder="ENTER YOUR EMAIL ID"id="emailin"  name="email" required>
                <br>
                <br>
                <br>
                <input type="tel" placeholder="ENTER YOUR PHONE NO." id="nmbrin"  name="phone">
                <br>
                <br>
                <input type="password" placeholder="ENTER YOUR PASSWORD" id="passwdin" name="password" required>
                <br>
                <br>
                <input type="password" placeholder="CONFIRM YOUR PASSWORD" id="cnfmin" name="psw-repeat" required>
                <br>
                <br>
                <input type="submit" name="submit" value="SIGNUP" id="signup">
            
            </form>   
        </div>


            </form>

    </div>
<?php 
    

    if(isset($_POST['submit']))
    {
    
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password']; 


        $sql = "INSERT INTO user SET 
            name='$name',
            password='$password',
            email='$email',
            phone='$phone'
        ";
 
        
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        
        if($res==TRUE)
        {

            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
        
            header("location:".SITEURL.'sucess.php');
        }
        else
        {
            
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            header("location:".SITEURL.'fail.php');
        }

    }
    
?>



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