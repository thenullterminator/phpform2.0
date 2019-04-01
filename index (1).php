<?php
$error="";
$success="";
    if($_POST)
    {
        
        if(!$_POST['email'])
        $error=$error."> Please Enter email address<br>";
        if ((!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))&&$_POST['email']) 
        $error=$error. "> Invalid Email Address<br>";   
        if(!$_POST['subject'])
        $error=$error."> Subject field cannot be blank<br>";
        if(!$_POST['message'])
        $error=$error."> Message field cannot be blank<br>";
        if($_POST['checkst']!=on)
        $error=$error."> Please Confirm the details<br>";

        if($error!="")
        $error='<div class="alert alert-danger" role="alert"> <b>There were error(s) in the form:</b><br>'.$error.'</div>';
        else
        {

        //  $to=$_POST['email'];
        //  $subject= "<p><h1>"+$_POST['subject']+"</h1></p>";
        //  $message="<p>"+$_POST['message']+"</p>";
       

        //  // Always set content-type when sending HTML email
        // $header = "MIME-Version: 1.0" . "\r\n";
        // $header .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // // More headers
        // $header .= 'From: <webmaster@example.com>' . "\r\n";
        // // $header .= 'Cc: myboss@example.com' . "\r\n";





        

        $to = $_POST['email'];
        $subject = $_POST['subject'];
        
        $message = $_POST['message'];
        
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
        // More headers
        $headers .= 'From: Dhairya Patel' . "\r\n";
       
        if (mail($to,$subject,$message,$header))
        {
            $success="Your Message is sent successfully!";
            $success='<div class="alert alert-success" role="alert"> <b>'.$success.'</b></div>';
        }
        else
        {
            $error="Please Try again later.";
            $error='<div class="alert alert-danger" role="alert"> <'.$error.'</div>';
        }    
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Feedback | FORM</title>

    <style>

        main
        {
            width:70vw;
            margin:0 auto;   
        }
        #heading
        {
            font-family: 'Montserrat', sans-serif;
            font-size: 3vw;
            font-weight: 900;
            letter-spacing: -0.1vw;
        }
        label{
            font-family: 'Montserrat', sans-serif !important;
            font-size: 1.4vw;
            font-weight: bold;
            letter-spacing: -0.04vw;
            margin: 1vw 0;
        }

        input{
            font-family: 'Montserrat', sans-serif !important;
        }

        textarea{
            font-family: 'Montserrat', sans-serif !important;
            font-size:1.25rem !important;   
        }
        
        .check
        {
            margin-top:33px;
        }

        .size
        {
            width:8vw;
            height:2.6vw;
            font-family: 'Montserrat', sans-serif !important;
            font-size:1.25rem !important;  
        }
        #status
        {
            font-family: 'Montserrat', sans-serif !important;
        }
    
    </style>
  </head>
  <body>
    
    <main>
        <div id="heading">
            Get In Touch!
        </div>
  
        <p></p>

        <div id="status"><?php echo $error;?> <?php echo $success;?></div>

        <form method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input name="email" type="email" class="form-control form-control-lg" id="email" aria-describedby="emailHelp" placeholder="Enter email here....">
                  <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Subject</label>
                  <input name="subject" type="text" class="form-control form-control-lg" id="subject" placeholder="Enter subject here....">
                </div>
                <div class="form-group">
                <label for="exampleFormControlTextarea1">Message</label>
                <textarea name="message" class="form-control" id="message" rows="5" placeholder="Enter Message here...."></textarea>
                </div>
                <div class="form-check">
                <input name="checkst" type="checkbox" class="form-check-input check" id="checkst">
                <label class="form-check-label" for="exampleCheck1"> I confirm the above details.</label>
                </div>
                <p></p>
                <br>
                <button type="submit" class="btn btn-primary size">Submit!</button>
              </form>


    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/JavaScript">


        $("form").submit(function()
        {

            var error="";

            if($("#email").val()=="")
            {
                error+="> Please Enter email address<br>";
            }
            if($("#subject").val()=="")
            {
                error+="> Subject field cannot be blank<br>";
            }
            if($("#message").val()=="")
            {
                error+="> Subject field cannot be blank<br>";
            }
            if(!$("#checkst").is(':checked'))
            {
                error+="> Confirm the details<br>";
            }
            if(error=="") return true;
            else
            {
                $("#status").html('<div class="alert alert-danger" role="alert"> <b>There were error(s) in the form:</b><br>'+error+'</div>');
                return false;
            }
        });

    </script>
</body>
</html>

