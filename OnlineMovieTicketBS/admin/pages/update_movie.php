<?php
include('header.php');
$mid=$_GET['mid'];
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder;      
  ?>   
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update Movie
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Add Movies</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
        <div class="box-body">
            <form action="process_update_movie.php?mid=<?php echo $mid?>" method="post" enctype="multipart/form-data" id="form1">
            <div class="form-group">
                <label class="control-label">Theater</label>
                <select name="TheaterName" class="form-control">
                  <option disabled=true value="......."></option>
              <?php 
                $th=mysqli_query($con,"select * from tbl_theatre"); 
				        if(mysqli_num_rows($th)){
                while($th_id=mysqli_fetch_array($th)){
							?>
                <option value="<?php echo $th_id["id"]?>"><?php echo $th_id["name"]?></option>

              <?php }}?>
                </select>
                <?php $frm->validate("name",array("required","label"=>"Movie theater")); // Validating form using form builder written in form.php ?>
              </div>
                <?php 
                $mid=$_GET['mid'];
                $th=mysqli_query($con,"select * from tbl_movie where movie_id='$mid'"); 
                if(mysqli_num_rows($th)){
                while($update=mysqli_fetch_array($th)){
                ?>

              <div class="form-group">
                <label class="control-label">Movie name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $update["movie_name"]; ?> "/>
                <?php $frm->validate("name",array("required","label"=>"Movie Name")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Cast</label>
                <input type="text" name="cast" class="form-control" value="<?php echo $update["cast"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"Cast","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Description</label>
                 <input type="text" name="description" class="form-control" value="<?php echo $update["desc"]; ?>" />
                 <?php $frm->validate("description",array("required","label"=>"Description")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                <label class="control-label">Release Date</label>
                <input type="date" name="Rdate" class="form-control" value="<?php echo $update["release_date"]; ?>" />
                <?php $frm->validate("date",array("required","label"=>"Release Date")); // Validating form using form builder written in form.php ?>
              </div>
                   
              <div class="form-group">
                  <label class="control-label">Images</label>
              <input type="file"  name="attachment" class="form-control" placeholder="Images" value="<?php echo $update["image"]; ?>" >
               <?php $frm->validate("attachment",array("required","label"=>"Image")); // Validating form using form builder written in form.php ?>
               <center></center>
              </div>
              <div class="form-group">
                 <label class="control-label">Video Url</label>
                <input type="text" name="video_url" class="form-control" value="<?php echo $update["video_url"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"Video_Url","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Theater Address</label>
                <input type="text" name="TheaterAddress" class="form-control" value="<?php echo $update["TheaterAddress"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"TheaterAddress","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Theater Place</label>
                <input type="text" name="TheaterPlace" class="form-control" value="<?php echo $update["TheaterPlace"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"TheaterPlace","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">Theater State</label>
                <input type="text" name="TheaterState" class="form-control" value="<?php echo $update["TheaterState"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"TheaterState","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>    
              <!-- ..... -->
              <div class="form-group">
                 <label class="control-label">screen Name</label>
                <input type="text" name="screenName" class="form-control" value="<?php echo $update["screenName"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"screenName","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">numSeats </label>
                <input type="number" name="numSeats" class="form-control" value="<?php echo $update["numSeats"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"numSeats","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">charge</label>
                <input type="text" name="charge" class="form-control" value="<?php echo $update["charge"];?>" />
                <?php $frm->validate("cast",array("required","label"=>"charge","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
              <div class="form-group">
                 <label class="control-label">sequence Name</label>
                <input type="text" name="sequencName" class="form-control" value="<?php echo $update["sequencName"]; ?>" />
                <?php $frm->validate("cast",array("required","label"=>"sequencName","regexp"=>"text")); // Validating form using form builder written in form.php ?>
              </div>
               <div class="form-group">
                <label class="control-label">Start Date</label>
                <input type="date" name="startDate" class="form-control" value="<?php echo $update["startDate"]; ?>"/>
                <?php $frm->validate("date",array("required","label"=>"start Date")); // Validating form using form builder written in form.php ?>
              </div>             
                    <div class="form-group">
                <label class="control-label">Start Time</label>
                <input type="time" name="startTime" class="form-control" value="<?php echo $update["startTime"]; ?>" />
                <?php $frm->validate("date",array("required","label"=>"startTime")); // Validating form using form builder written in form.php ?>
              </div>
                   
              <div class="form-group">
                <button class="btn btn-success">Update Movie</button>
              </div>
               <?php }}?>
        </form>
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <?php
include('footer.php');
?>
<script>
        <?php $frm->applyvalidations("form1");?>
    </script>