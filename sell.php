<?php include('constants.php');?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selling</title>
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">
    <link href="./css/sell.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/cd818db9e4.js" crossorigin="anonymous"></script>
</head>
<body>
    <!--Header-->
            
    <div class="header">
        <ul>
            <li><a href="">Sell</a></li>
            <li>
                <div class="shop">
                    Shop By Category<span class="category-icon"><i class="fa-solid fa-chevron-down"></i></span>
                    <div class="dropcontent">
                        <a href="./category.php" class="catlink">Fashion</a>
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

    <!--body-->

    <div class="icon1">
        <div id="p1"><p><b>1</b></p></div>
     </div>
    <div class="icon1-p1">
        <div id="p2"><p><b>List your item<br></b></p></div>
        <div class="p3"><p><small>You can select your category and<br> give the necessary details</small></p></div>
    </div>

    <div class="icon2">
        <div id="i1"><p><b>2</b></p></div>
     </div>
    <div class="icon2-i1">
        <div id="i2"><p><b>Set your bid<br></b></p></div>
        <div class="i3"><p><small>Choose your base price for the <br> product</small></p></div>
    </div>


    <div class="icon3">
        <div id="q1"> <p><b>3</b></p></div>
     </div>
    <div class="icon3-q1">
        <div id="q2"><p><b>Get paid<br></b></p></div>
        <div class="q3"><p><small>You will get paid after the auction <br> ends</small></p></div>
    </div>
    
    
    
    <!--Form To list Seller Product-->
    <div class="formsell">
        <p id="capt">FILL THE FORM TO LIST YOUR PRODUCT</p>
        <form action="" name="" method="post" class="frmseller">
        <input type="name" name="title" id="name" placeholder="Name of the Product">
        <select id="categorylist" name="category">
            <option value="">Choose a category</option>
            <option value="1"></option>
            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT DISTINCT(category) FROM products ";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $category = $row['category'];
                                        ?>
                                        <option value="<?php echo $category; ?>"><?php echo $category; ?></option>
                                        <?php
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }
                            ?>
          </select>
          <br>
          <input type="number" id="quantity" name="quantity" placeholder="specify the quantity">
          <br>
          <input type="number" id="baseprice" name="baseprice" placeholder="Set Base_Price">
          <p id="uploadimage">Upload image</p>
          <br>
          <input type="file" name="image" id="image" accept="image/*">
          <select id="timerlist" name="timer">
            <option value="">specify bid time</option>
            <option value="1">12 hr</option>
            <option value="2">24 hr</option>
          </select>
          <p id="proddesc">Product Description</p>
          <br>
          <textarea id="textarea" name="description"></textarea>
          <br>
          <p id="featured">Featured:</p>
          <br>
          <input type="radio" name="featured" value="Yes" id="featuredyes"><p id="yesradio">Yes</p>  
          <input type="radio" name="featured" value="No" id="featuredno"> <p id="noradio">No</p>
            <br>
          <input type="submit" name="submit" id="submit" value="SUBMIT">

        </form>
    </div>

 <?php 

            //CHeck whether the button is clicked or not
            if(isset($_POST['submit']))
            {
                //Add the Food in Database
                //echo "Clicked";
                
                //1. Get the DAta from Form
                $title = $_POST['title'];
                $category = $_POST['category'];
                $quantity = $_POST['quantity'];
                $baseprice=$_POST['baseprice'];
                $bidtime = $_POST['timer'];
                $description = $_POST['description'];
                $featured=$_POST['featured'];
                
                //Check whether radion button for featured and active are checked or not
                if(isset($_POST['featured']))
                {
                    $featured = $_POST['featured'];
                }
                else
                {
                    $featured = "No"; //SEtting the Default Value
                }

                //2. Upload the Image if selected
                //Check whether the select image is clicked or not and upload the image only if the image is selected
                if(isset($_FILES['image']['name']))
                {
                    //Get the details of the selected image
                    $image_name = $_FILES['image']['name'];

                    //Check Whether the Image is Selected or not and upload image only if selected
                    if($image_name!="")
                    {
                        // Source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //Destination Path for the image to be uploaded
                        $dst = "./images/".$image_name;

                        //Finally Uppload the food image
                        $upload = move_uploaded_file($src, $dst);

                        //check whether image uploaded of not
                        if($upload==false)
                        {
                            //Failed to Upload the image
                            //REdirect to Add Food Page with Error Message
                            $_SESSION['upload'] = "<div class='error'>Failed to Upload Image.</div>";
                            header('location:'.SITEURL.'fail.php');
                            //STop the process
                            die();
                        }

                    }

                }
                else
                {
                    $image_name = ""; //SEtting DEfault Value as blank
                }

                //3. Insert Into Database

                //Create a SQL Query to Save or Add food
                // For Numerical we do not need to pass value inside quotes '' But for string value it is compulsory to add quotes ''
                $sql2 = "INSERT INTO products SET 
                    title = '$title',
                    category = '$category',
                    quantity = $quantity,
                    base_price = $baseprice,
                    description = '$description',
                    featured = '$featured',
                    image_name = '$image_name'
                ";

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);

                //CHeck whether data inserted or not
                //4. Redirect with MEssage to Manage Food page
                if($res2 == true)
                {
                    //Data inserted Successfullly
                    $_SESSION['add'] = "<div class='success'>Product Added Successfully.</div>";
                    header('location:'.SITEURL.'sucess.php');
                }
                else
                {
                    //FAiled to Insert Data
                    $_SESSION['add'] = "<div class='error'>Failed to Add Product.</div>";
                    header('location:'.SITEURL.'fail.php');
                }

                
            }

        ?>

    <!-- Footer -->
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