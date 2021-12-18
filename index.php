<?php

$msg=false;


require 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$env_key= $_ENV["API_KEY"];
// echo $env_key;



if(isset($_POST['submit'])) {

    $name= $_POST['name'];
    $email= $_POST['email'];


    $postdata =array(

        "api_key" => $env_key,
        "email" => $email,
        "first_name" => $name,

        // "fields" => [

        //     "name" =>$name,
        //     "email"=>$email,
        // ]
        );

        $newdata = json_encode($postdata);
        // echo $newdata;

        $url = curl_init("https://api.convertkit.com/v3/forms/2851163/subscribe");
        curl_setopt($url,CURLOPT_HTTPHEADER,array('Content-Type:application/json'));
        curl_setopt($url,CURLOPT_POSTFIELDS, $newdata);
        curl_setopt($url, CURLOPT_RETURNTRANSFER,true);

        $res = curl_exec($url);
        // echo $res;

        // curl_close($url);

        // echo "success";


        if($res=200) {
          $msg = true;
        }else {

          echo "invalid ";
        }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    
<?php

if($msg==true) {

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> You have successfully subscribed.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
}

?>






<div class="container mt-5">
    <div class="row">
    <div class="col-md-6">
    
    


<form action="index.php" method="post">
  <div class="form-group">
    <label for="exampleInputname1">Name</label>
    <input type="text" class="form-control" name="name" id="exampleInputName1"  placeholder="Enter name" required>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter email" required>
  </div>
 
  <input type="submit" name="submit"  value="submit" class="btn btn-primary" />

            
 </div>
</div>
    </div>
    <!-- <script async data-uid="3d4197ea24" src="https://skilled-experimenter-4471.ck.page/3d4197ea24/index.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>