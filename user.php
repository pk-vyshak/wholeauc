<?php include('constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/userdetails.css" rel="stylesheet">
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
    <title>Document</title>
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






    <div id="main-sec">
        <div id="logo-icon">
            <span id="logo1"><img src="./images/download (2).jpeg"></span>

            <?php
                if(isset($_GET['userid']))
                {
                    $userid = $_GET['userid'];
                    $sql = "SELECT * FROM user WHERE  userid=$userid";
                    $res = mysqli_query($conn, $sql);     
                    $count = mysqli_num_rows($res);
                    if($count==1)
                    {
                        $row = mysqli_fetch_assoc($res);
                        $username=$row['name'];
                        $phone=$row['phone'];
                        $email=$row['email'];
                    }}
                    

            ?>

            <table id="table1" style="color:azure; width:80%;">
                <tr>
                    <th>Name</th>
                    <td style="width:70%"><?php echo $username;?></td>
                </tr>
                <tr>
                    <th>Email-Id</th>
                    <td style="width:70%"><?php echo $email;?></td>
                </tr>
                <tr>
                    <th>PhNo</th>
                    <td style="width:70%"><?php echo $phone;?></td>
                </tr>
            </table>
            <button onclick="showForm()" class="passwordbut" value="Change Password">Change Password</button>
            <form id="formElement" style="display: none;" action="" method="post" >
                    <input type="text" name="password" placeholder="enter new password" id="pass1">
                    <br>
                    <br>
                    <input type="text" name="rpassword" placeholder="Confirm new password" id="pass2">
                    <br>
                    <input type="submit" name="submit" id="submitbutton">
            </form>
            
            <script type="text/javascript">
                function showForm() {
                    document.getElementById('formElement').style.display = 'block';
                }
            </script>
            <?php

         
                if(isset($_POST['submit']))
                {
                    $password=$_POST['password'];
                    $sql="UPDATE `user` SET `password`='$password' WHERE userid='$userid'";
                    $res=mysqli_query($conn,$sql);
                    if($res)
                    {
                        //echo"successful";
                        echo "<p id='dem'>Changed Successfully....</p>";
                    }
                }
            ?>
        

        
        </div>



    </div>
    
        <br><br>
        <br>
        
        


         

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