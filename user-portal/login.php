<?php include('./includes/connect.inc.php');?>
<?php
session_start();
//Login form PHP Code
if (isset($_POST["user_login"])&& isset($_POST["password_login"])) {
$user_login= strip_tags(@$_POST['user_login']);
$password_login=@$_POST['password_login'];
$sql=mysql_query("SELECT * From users WHERE policy_id='$user_login' AND dob='$password_login'  LIMIT 1");//
//Check for existence
$user_count= mysql_num_rows($sql);
if ($user_count==1) {
while($row=mysql_fetch_array($sql)) {
$id=$row["id"];
}
$_SESSION["user_login"]=$user_login;
header("location:user-dashboard.php?profile_id=$id");
exit();
}
else
{
echo("<script>alert('The Information is Incorrect')</script>");
}
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="Jekyll v3.8.5">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <title>User Portal Login</title>
    <!-- Bootstrap core CSS -->
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      #bg {
          background-image: url("hero-bg.jpg");
          height: 100%;
          background-position: center;
          background-repeat: no-repeat;
          background-size: cover;
         }
    </style>
    <!-- Custom styles for this template -->
    <link href="./css/style.css" rel="stylesheet">
  </head>
  <body id="bg" class="text-center">
    <form class="form-signin" method="POST" action="#">
  <h1 class="h3 mb-3 font-weight-normal">User Login Portal</h1>
  <label for="inputEmail" class="sr-only">Policy ID</label>
  <input type="text" id="inputEmail" name="user_login" class="form-control" placeholder="Policy ID" required autofocus>
  <label for="inputPassword" class="sr-only">Date Of Birth</label>
  <input type="text" id="inputPassword" name="password_login" class="form-control" placeholder="Date Of Birth" required>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
</form>
</body>
</html>
