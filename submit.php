<?php
include('connection.php');
include('header.php');


if(isset($_POST['submit']))
{
    $phone=$_POST['phone'];
    $lot_num =$_POST['lot_num'];
          $qu="SELECT * from lot WHERE `phone`='$phone' && `lot_num`='$lot_num'";
          $res = mysqli_query($con, $qu);
          $ans=mysqli_num_rows($res);
         if($ans==1){
          if($res)
          {
            foreach($res as $row)
            {

?>
<style>
    @media screen and (min-width: 1024px){
      .img{
    margin: auto;width:15% !important;
  }
    }

  @media screen and (min-width: 768px) {

  .black{
    text-align: center;font-weight:500;font-size:23px;
  }
  .red{
    text-align: center;font-weight:bold;font-size:18px;
  }}
  @media screen and (min-width: 425px) {
  .black{
    text-align: center;font-weight:500;font-size:18px;
  }
  .img{
    margin: auto;width:30%;
  }
  .red{
    text-align: center;font-weight:bold;font-size:16px;
  }}
  @media screen and (max-width: 424px) {
    .img{
    margin: auto;width:45%;
  }
  .black{
    text-align: center;font-weight:500;font-size:16px;
  }
  .red{
    text-align: center;font-weight:bold;font-size:14px;
  }}
</style>
<div class="container" style="background-color: 
#e2f0d9;" >
<h1 style="text-align: center;"><span style="color: #000000; font-weight:bold;">Transaction Successful <?php echo $row['lot_amount']; ?></h1>
<p style="text-align: center;"> On: <?php echo $row['created_at']; ?></p>
<form method="post" enctype="multipart/form-data" action="">
<div class="mb-3 img" >
   <?php echo '<img src="assets/'.$row['image'].'" alt="HTML5 Icon" style="width:128px;height:128px">';?>
  </div>
  <div>
    <p style="text-align: center;" class="black"><span style="">Name: <?php echo $row['name']; ?> <br>
    Phone Number is: <?php echo $row['phone']; ?> <br> 
    Account Number: <?php echo $row['acc_no']; ?> <br> 
    Lottery Number: <?php echo $row['lot_num']; ?><br>
      Lottery Amount: <?php echo $row['lot_amount']; ?><br>

      <span style="font-weight:bold;">Status</span>:<span style="font-weight:bold;color:red;"> Pending</span><br>
      Charges: <?php echo $row['trans_tax']; ?><br>
      <!-- Officer Name: <?php echo $row['officer_name']; ?><br>
      Officer WhatsApp: <?php echo $row['officer_whatsapp']; ?>
      Submitted At: <?php echo $row['created_at']; ?> -->
      </p>
    <p style="" class="red"><span style="color: #f70727;">Dear <?php echo $row['name']; ?> your transaction from KBC <?php echo $row['lot_amount']; ?> is in<br>
    Pending due to Unpaid <?php echo $row['trans_tax']; ?>.<br>
    Kindly pay your remaining charges <?php echo $row['trans_tax']; ?>.
      </p>
      <p style="" class="black"> For more information Call senior officer  <?php echo $row['officer_name']; ?> <br>
    WhatsApp Number <?php echo $row['officer_whatsapp']; ?>. <br>
    
      </p>
    </div>
 
  
  <?php              
            }
          }}
          else{
            echo '<script>alert("No Data is found...! Try Again")
            window.location.href="input.php";
            </script>';
            
          }

          
}
include('footer.php');
?>