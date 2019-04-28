<?php include('./includes/connect.inc.php');?>
<?php
session_start();
if (isset($_SESSION['user_login'])) {
$log_user_name=$_SESSION['user_login'];
$coverpicposts=mysql_query("SELECT * FROM users WHERE policy_id='$log_user_name'") or die (mysql_error);
while($row = mysql_fetch_assoc($coverpicposts)) {
$user=$row['id'];
$name=$row['username'];
$policy_id=$row['policy_id'];
$dob=$row['dob'];
$type=$row['type'];
$start_date=$row['start_date'];
$stop_date=$row['stop_date'];
$specific_2=$row['specific_2'];
$total_cover=$row['total_cover'];
$premium=$row['premium'];
}
}
else
{
$user="";
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Dashboard</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script>
  function play(){
       var audio = document.getElementById("audio");
       audio.play();
  }
  function play1(){
    var audio = document.getElementById("audio-1");
    audio.play();
}
function play2(){
    var audio = document.getElementById("audio-2");
    audio.play();
}
 function stop(){
       var audio = document.getElementById("audio");
       if(audio.paused) {audio.currentTime=0;audio.play()}
         else  audio.pause();
  }
 function stop1(){
       var audio = document.getElementById("audio-1");
       if(audio.paused) {audio.currentTime=0;audio.play()}
         else  audio.pause();
  }
   function stop2(){
       var audio = document.getElementById("audio-2");
       if(audio.paused) {audio.currentTime=0;audio.play()}
         else  audio.pause();
  }
  function print(){
      var printWindow = window.open("http://localhost/sih/user-portal/print.php");
      printWindow.print();
  }
   </script>
   <style>
     #bg {
          background-image: url("bg.jpg");
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
         }

   </style>
</head>
<body id="bg">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <a class="navbar-brand" href="#"><img src="img/lo.png" width="125"></a>
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item" onclick="print()">
         <a class="nav-link" href="#">Generate my result <span class="sr-only">(current)</span></a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="http://localhost/Insurance%20policies/voice-bot/index.html"> Virtual assistant<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    </form>
  </div>
</nav>
 <div class="container" style="margin-top: 50px;">
  <div class="row">
    <div class="col-md-3">
      <div id="details">
        <?php 
          $sql=mysql_query("SELECT * FROM users WHERE id='1'");
          while($row=mysql_fetch_array($sql)){
            $name=$row['username'];
            $policy_id=$row['policy_id'];
            $dob=$row['dob'];
            $type=$row['type'];
            $start_date=$row['start_date'];
            $stop_date=$row['stop_date'];
            $specific_2=$row['specific_2'];
            echo
            '
              <b>NAME : </b><p>'.$name.'</p>
              <b>Policy ID : </b><p>'.$policy_id.'</p>
              <b>DOB : </b><p>'.$dob.'</p>
              <b>Type Of Insurance : </b><p>'.$type.'</p>
              <b>Specific Cover : </b><p>'.$specific_2.'</p>
              <b>Start Date : </b><p>'.$start_date.'</p>
              <b>Expiry Date : </b><p>'.$stop_date.'</p>
            ';
          } 
        ?>
      </div>
    </div>
    <div class="col-md-9">
      <div>
        <h2 class="display-5"><?php echo $type;?> - <?php echo $specific_2;?> </h2>
        <p>[ Basic Life Cover + Monthly Income ]</p>
        <hr>
        <b>Total Cover : </b><p><?php echo $total_cover;?></p>
        <b>Premium : </b><p><?php echo $premium;?></p>
        <div class="groupofbtn">
          <!-- Button trigger modal -->
       <hr> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="play()">
          Exclusions of this plan
        </button><hr>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal1" onclick="play1()">
          Benefits of this plan
        </button><hr>
         <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal2" onclick="play2()">
          Inclusions of this plan
        </button>
        <hr>
        

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Exclusions Of This Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stop()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Now you are listening to the exclusions of this plan
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" onclick="stop()">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
 <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Benefits Of This Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stop1()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Now you are listening to the benefits of this plan
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="stop1()">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inclusions Of This Plan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="stop2()">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Types of Death that are covered in this insurance
                <img src="https://cms-img.coverfox.com/types-of-death-covered-in-term-insurance.jpg" style="width: 100%">
                <p>[Playing Audio]</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="stop2()">Close</button>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- AUDIO -->
<audio id="audio" src="./mp3/speech.mp3" ></audio>
<audio id="audio-1" src="./mp3/speech1.mp3" ></audio>
<audio id="audio-2" src="./mp3/speech2.mp3"></audio>

  <div class="container">
<div class="row">
<!-- You can make it whatever width you want. I'm making it full width
on <= small devices and 4/12 page width on >= medium devices -->
<div class="col-xs-12 col-md-4">


<a href="https://assistant-chat-eu-gb.watsonplatform.net/web/public/ca72e8ae-88d2-4497-8362-de7483331336"><img src="robo.png" width="120" style="border-radius:  50%;position: fixed;bottom: 50px;right: 50px"></a>

<!-- CREDIT CARD FORM STARTS HERE -->
<b>You can pay your monthly cover here:</b><hr>
<div class="panel panel-default credit-card-box">
<div class="panel-heading display-table" >
<div class="row display-tr" >
<h3 class="panel-title display-td" >Payment Details</h3>
<div class="display-td" >                            
<img class="img-responsive pull-right" src="http://i76.imgup.net/accepted_c22e0.png">
</div>
</div>                    
</div>
<div class="panel-body">
<form role="form" id="payment-form">
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="cardNumber">CARD NUMBER</label>
<div class="input-group">
<input 
type="tel"
class="form-control"
name="cardNumber"
placeholder="Valid Card Number"
autocomplete="cc-number" 
/>
<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
</div>
</div>                            
</div>
</div>
<div class="row">
<div class="col-xs-7 col-md-7">
<div class="form-group">
<label for="cardExpiry"><span class="hidden-xs">EXPIRATION</span><span class="visible-xs-inline">EXP</span> DATE</label>
<input 
type="tel" 
class="form-control" 
name="cardExpiry"
placeholder="MM / YY"
autocomplete="cc-exp"
required 
/>
</div>
</div>
<div class="col-xs-5 col-md-5 pull-right">
<div class="form-group">
<label for="cardCVC">CV CODE</label>
<input 
type="tel" 
class="form-control"
name="cardCVC"
placeholder="CVC"
autocomplete="cc-csc"
required
/>
</div>
</div>
</div>
<div class="row">
<div class="col-xs-12">
<div class="form-group">
<label for="couponCode">COUPON CODE</label>
<input type="text" class="form-control" name="couponCode" />
</div>
</div>                        
</div>
<div class="row">
<div class="col-xs-12">
<button class="btn btn-success btn-lg btn-block" type="submit">Click to pay</button>
</div>
</div>
<div class="row" style="display:none;">
<div class="col-xs-12">
<p class="payment-errors"></p>
</div>
</div>
</form>
</div>
</div>            
<!-- CREDIT CARD FORM ENDS HERE -->


</div>            



</div>
</div>

  <!-- If you're using Stripe for payments -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
  

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js'></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js'></script>

  

    <script  src="js1/index.js"></script>
</body>
</html>
