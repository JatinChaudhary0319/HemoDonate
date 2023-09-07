<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
  *{
    margin: 0;
    padding: 0;
  }
  .xyz{
    margin-top: -50px;
    background-image: url("./image/bad.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    height: 87.5vh;
  }
  input{
    width: 230px;
    height: 40px;
    border-radius: 20px;
    background: rgb(23, 26, 49);
    border: None;
    color: #ffff;
    padding-left: 20px;
    font-size: 14px;
    outline: None;
  }
</style>
</head>

<body>
<?php
$active ='donate';
 include('head.php') ?>
<div class="xyz">
<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
<div class="row">
    <div class="col-lg-6">
        <h1 class="mt-4 mb-3">Donate Blood </h1>
      </div>
</div>
<form name="donor" action="savedata.php" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 200, 255)">Full Name</span><span style="color:white">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Mobile Number</span><span style="color:white">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Email Id</span></div>
<div><input type="email" name="emailid" class="form-control"></div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Age</span><span style="color:white">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Gender</span><span style="color:white">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Blood Group</span><span style="color:white">*</span></div>
<div><select name="blood" class="form-control" required>
  <option value=""selected disabled>Select</option>
  <?php
    include 'conn.php';
    $sql= "select * from blood";
    $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
  while($row=mysqli_fetch_assoc($result)){
   ?>
   <option value=" <?php echo $row['blood_id'] ?>"> <?php echo $row['blood_group'] ?> </option>
  <?php } ?>
</select>
</div>
</div>
</div>
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 190, 213)">Address</span><span style="color:white">*</span></div>
<div><textarea class="form-control" name="address" required></textarea></div></div>
</div>
<div class="row">
  <div class="col-lg-4 mb-4">
  <div><input type="submit" name="submit" class="btn btn-primary" value="Submit" style="cursor:pointer; align:center; background-color:#7FB3D5;color:#273746 "></div>
  </div>
</div>
</div>
</div>
</div>
<?php include('footer.php') ?>
</div>
</body>
</html>