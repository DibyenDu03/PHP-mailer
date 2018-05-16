<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   <link rel="stylesheet" type="text/css" href="css/bootstrap.css">

    <title>Email Form</title>
  </head>
  <body>
    <div style="padding: 35px;" >
    <br>
    <h2 >Get in touch!</h2>
    <br>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <?php

    $val=2;
    $flag=0;
    $error1="Please fill the following fileds- <br>";
    session_start();
    if(isSet($_POST['submit']))
    {
    
        
        $_SESSION['email']=$_POST['email'];
       $_SESSION['message']=$_POST['message'];
       $_SESSION['subject']=$_POST['subject'];
    if(empty($_POST['email']))
        {
            $error1=$error1." email field <br>";
            $flag=1;
           // echo $error;
        }
        if(empty($_POST['subject']))
        {
            $error1=$error1." subject field <br>";
            $flag=1;
           // echo $error;
        }
            if(empty($_POST['message']))
            {
                $error1=$error1." message field <br>";
                $flag=1;
                // echo $error;
             }
             if($flag==0)
             {
                header("Location:check.php");
              }
  }    
    
  
    if($_SESSION['ch']==1)
    {
      $val=$_SESSION['val'];
      $error=$_SESSION['error'];
    }
    if($flag==1)
      {
        $val=1;
        $error=$error1;
      }
    if($val==1)
    echo "<div class='alert alert-danger' role='alert'>".$error."
    </div>";
    if($val==0)
    echo "<div class='alert alert-success' role='alert'>".$error."
    </div>";
    ?>
    <form action="" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
    <label for="exampleInputEmail1">Subject</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="subject">
    </div>
    <div class="form-group">
    <label for="exampleFormControlTextarea1" >Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
  </div>
   <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  </div>
 
</form>
  </body>
</html>