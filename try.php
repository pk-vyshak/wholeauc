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
    <!-- Display the countdown timer in an element -->
<p id="demo"></p>
<?php   $sql="select * from time";
        $res = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($res);
        $time=$row['time'];
        ?>
<script>
// Set the date we're counting down to
var countDownDate = new Date("<?php echo $time;?>");
var x = setInterval(function() {
var now = new Date().getTime();
 var distance = countDownDate - now;
 var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById("demo").innerHTML = days + "d " + hours + "h "
  + minutes + "m " + seconds + "s ";

  

},1000);

</script>
</body>
</html>