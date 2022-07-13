
<?php
    include('../../config.php');
    $mid=$_GET['mid'];
    extract($_POST);
       $uploaddir = '../../images/';
      $uploadfile = $uploaddir . basename($_FILES['attachment']['name']);
    move_uploaded_file($_FILES['attachment']['tmp_name'],$uploadfile);
    $flname="images/".basename($_FILES["attachment"]["name"]);

    $sql=mysqli_query($con,"update tbl_movie set theater='$TheaterName', TheaterAddress='$TheaterAddress',TheaterPlace='$TheaterPlace',TheaterState='$TheaterState',movie_name='$name',cast='$cast',desc='$description',release_date='$Rdate',image='$flname',video_url='$video_url',screenName='$screenName',numSeats='$numSeats',charge='$charge',sequencName='$sequencName',startDate='$startDate',startTime='$startTime' where movie_id='$mid')");
    $_SESSION['add']=1;
    header('location:index.php');
?>


<!-- screenName,numSeats,charge  -->

