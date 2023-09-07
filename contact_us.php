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
    background-image: url("./image/contact_us2.jpg");
    background-size: 100% 90%;
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
<?php $active ='contact';
include 'head.php'; ?>
<?php
if(isset($_POST["send"])){
  $name=$_POST['fullname'];
$number=$_POST['contactno'];
$email=$_POST['email'];
$message=$_POST['message'];
$conn=mysqli_connect("localhost","root","","blood_donation") or die("Connection error");
$sql= "insert into contact_query (query_name,query_mail,query_number,query_message) values('{$name}','{$number}','{$email}','{$message}')";
$result=mysqli_query($conn,$sql) or die("query unsuccessful.");
  echo '<div class="alert alert-success alert_dismissible"><b><button type="button" class="close" data-dismiss="alert">&times;</button></b><b>Query Sent, We will contact you shortly. </b></div>';
}?>
<div class="xyz">
<div id="page-container" style="margin-top:50px; position: relative;min-height: 84vh;">
  <div class="container">
  <div id="content-wrap" style="padding-bottom:50px;">
    <div class="row">
      <div class="col-lg-8 mb-4">
        <span style="color:rgb(0, 0, 0);">
        <h3>Send us a Message</h3>
        </span>
        <form name="sentMessage"  method="post">
            <div class="control-group form-group">
                <div class="controls">
                    <span style="color:rgb(0, 0, 0);">
                    <label>Full Name:</label>
                    </span>
                    <input type="text" class="form-control" id="name" name="fullname" required>
                    <p class="help-block"></p>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <span style="color:rgb(0, 0, 0);">
                    <label>Phone Number:</label>
                    </span>
                    <input type="tel" class="form-control" id="phone" name="contactno"  required >
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <span style="color:rgb(0, 0, 0);">
                    <label>Email Address:</label>
                    </span>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                    <span style="color:rgb(0, 0, 0);">
                    <label>Message:</label>
                    </span>
                    <textarea rows="7" cols="100" class="form-control" id="message" name="message" required  maxlength="999" style="resize:none"></textarea>
                </div>
            </div>
            <div class="control-group form-group">
                <div class="controls">
                  <button type="submit" name="send"  class="btn btn-primary" style="cursor:pointer; align:center; background-color:rgb(255, 220, 255);color:#273746 ">Send Message</button>
                </div>
            </div>
        </form>
    </div>
    
    <div class="col-lg-4 mb-4">
        <h2><span style= "color:#969696;">Contact Details</h2></span>
        <?php
          include 'conn.php';
          $sql= "select * from contact_info";
          $result=mysqli_query($conn,$sql);
          if(mysqli_num_rows($result)>0)   {
              while($row = mysqli_fetch_assoc($result)) { ?>
        <br>
        <p>
            <h4><span style= "color:#969696;">Address :</h4><?php  echo '<span style="color:#969696;">'.$row["contact_address"];?></span>
        </p>
        <p>
            <h4><span style= "color:#969696;">Contact Number :</h4><?php echo '<span style="color:#969696;">'.$row['contact_phone']; ?></span>
        </p>
        <p>
          <h4><span style= "color:#969696;">  Email: </span></h4><a href="#"><?php echo $row['contact_mail']; ?></a>
          </a></b>
        </p>
        <?php }
      } ?>
    </div>
</div>
<!-- /.row -->

</div>
</div>
</div>
<?php include 'footer.php' ?>
</div>

</body>

</html>
