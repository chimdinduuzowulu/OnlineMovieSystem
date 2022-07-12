<?php
    include('../../config.php');
    extract($_POST);
       $uploaddir = '../../images/';
      $uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
    move_uploaded_file($_FILES['attachment']['tmp_name'],$uploadfile);
    $flname="images/".basename($_FILES["attachment"]["name"]);
    $sql=mysqli_query($con,"insert into  tbl_movie values(NULL,'$TheaterName','$TheaterAddress','$TheaterPlace','$TheaterState','$name','$cast','$description','$Rdate','$flname','$video_url','$screenName','$numSeats','$charge','$sequencName','$startDate','$startTime','1','1')");
    $_SESSION['add']=1;
    header('location:add_movie.php');
?>


<!-- screenName,numSeats,charge  -->