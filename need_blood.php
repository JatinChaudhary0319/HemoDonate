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
  html{
      height: 100%;
      box-sizing: border-box;
    }
  body{
      min-height: 100vh;
      box-sizing: inherit;
      position: relative;
      margin: 0;
  }
  main{
    width: 80%;
    margin: 0px;
    margin-bottom: 0px;
  }
  *{
    margin: 0;
    padding: 0;
  }
  .xyz{
    margin-top: -50px;
    background-image: url("./image/need.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    height: 87.5vh;
    opacity: 0.8;
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
  #footer{
    position:sticky;
    bottom: 0;
    width: 100%;
    height: 75px;
    background-color:#000000;
    color:white;
    text-align: center;
  }
</style>
</head>

<body>
  <?php 
  $active ='need';
  include('head.php') ?>
  <div class="xyz">
  <div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
    <div class="container">
    <div id="content-wrap" style="padding-bottom:50px;">

  <div class="row">
      <div class="col-lg-6">
          <h1 class="mt-4 mb-3"><span style="color:rgb(0, 0, 0)">Need Blood</span></h1>

        </div>
  </div>


  <form name="needblood" action="" method="post">
  <div class="row">
  <div class="col-lg-4 mb-4">
  <div class="font-italic"><span style="color:rgb(255, 200, 255)">Blood Group</span><span style="color:white">*</span></div>
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

<div class="col-lg-4 mb-4">
<div class="font-italic"><span style="color:rgb(255, 200, 255)">Reason, why do you need blood?</span><span style="color:white">*</span></div>
<div><textarea class="form-control" name="address" required></textarea></div>
</div>

</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div><input type="submit" name="donor" class="btn btn-primary" value="Find Donor" style="align:center; background-color:#7FB3D5;color:#273746 "></div>
</div>
</div>

<div class="row">
<?php if(isset($_POST['donor'])){

  $bg=$_POST['blood'];
  $sql= "select * from donor_details join blood where donor_details.donor_blood=blood.blood_id AND donor_blood='{$bg}' order by rand() limit 5";
  $result=mysqli_query($conn,$sql) or die("query unsuccessful.");
    if(mysqli_num_rows($result)>0)   {
    while($row = mysqli_fetch_assoc($result)) {
      ?>

      <div class="col-lg-4 col-sm-6 portfolio-item" ><br>
      <div class="card" style="width:300px">
          <img class="card-img-top" src="image\blood_drop_logo.jpg" alt="Card image" style="width:100%;height:300px">
          <div class="card-body">
            <h3 class="card-title"><?php echo $row['donor_name']; ?></h3>
            <p class="card-text">
              <b>Blood Group : </b> <b><?php echo $row['blood_group']; ?></b><br>
              <b>Mobile No. : </b> <?php echo $row['donor_number']; ?><br>
              <b>Gender : </b><?php echo $row['donor_gender']; ?><br>
              <b>Age : </b> <?php echo $row['donor_age']; ?><br>
              <b>Address : </b> <?php echo $row['donor_address']; ?><br>
            </p>

          </div>
      </div>
      </div>

  <?php
    }
  }
    else
    {

        echo '<div class="alert alert-danger">No Donor Found For your search Blood group </div>';

    }
} ?>
</div>
</div>
</div>
</div>
</div>
</body>

</html>
