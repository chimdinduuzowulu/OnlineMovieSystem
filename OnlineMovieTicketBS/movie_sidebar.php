<?php
 $rates = $_COOKIE['Rvalue'];
$mvid=$_COOKIE['mvid'];
;?>
<script type="text/javascript">
function rating($this){
var val = $this.previousElementSibling.value;
var numberRated= parseInt(val);
numberRated = numberRated +1;
document.cookie= "Rvalue = "+ numberRated;
document.cookie= "set = "+ parseInt(1);
// document.cookie= "mvid = "+ a;
unsetValues();
alert(val);
document.location.reload();
}							
function unsetValues(){
		<?php 
		 $querried= mysqli_query($con,"UPDATE tbl_movie_rating SET rates='$rates' where movieId='$mvid'");
		 	if(!$querried){
					mysqli_query($con,"insert into tbl_movie_rating values(NULL,'$rates','$mvid','$userId')");
		 		}
		 ?>;
}
</script>

 			<div class="listview_1_of_3 images_1_of_3">
				<style>
					.rateBorder{border:none; border:.2 solid orange; border-radius:100%;height:20px;width:20px;padding:4px;}
					.rate{color:orange;border:none;}
					</style>
					<h2 style="color:#555;">Films in Theaters</h2>
					
					<?php
          	 $today=date("Y-m-d");
          	$qry2=mysqli_query($con,"select * from tbl_movie where status='1' order by rand() limit 10");
						
          	  while($m=mysqli_fetch_array($qry2))
                   {
									 	$mvid=$m['movie_id'];
                    ?>
            <div class="content-left">
					<div class="listimg listimg_1_of_2">
					<?php
						
						?>
						 <a href="about.php?id=<?php echo $m['movie_id'];?>"><img src="<?php echo $m['image'];?>"></a>
					</div>
					<div class="text list_1_of_2">
						  <div class="extra-wrap1">
                                         <a href="about.php?id=<?php echo $m['movie_id'];?>" class="link4" style="text-decoration:none; font-size:18px;"><?php echo $m['movie_name'];?></a><br>
                                        <span class="data">Release Date: <?php echo $m['release_date'];?></span><br>
                                        Cast: <Span class="data"><?php echo $m['cast'];?></span><br>
                                        Description: <span" class="color2" style="text-decoration:none;"><?php echo $m['desc'];?></span><br>
                                    </div>
					</div>
					
					<div>
					
					<?php 
					$mvid=$m['movie_id'];
					echo "<script> document.cookie= 'mvid = '+ $mvid; </script>";
						$ratingQry=mysqli_query($con,"select MAX(rates) as MaxRated from tbl_movie_rating where movieId='$mvid'");
						if(mysqli_num_rows($ratingQry)> 0){
							while($rval=mysqli_fetch_array($ratingQry)){
							
							if($rval['MaxRated'] ==5){			
					?>
					

					<button type="radio" value="1" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="2" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="3" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="4" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="5" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<?php } elseif ($rval['MaxRated'] ==4) {
						?>
						<button type="radio" value="1" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="2" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="3" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="4" class="rate rateBorder" onclick="rating(this)"></button>
						<button type="radio" value="5" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<?php } elseif($rval['MaxRated'] ==3){?>
						<button type="radio" value="1" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="2" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="3" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="4" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="5" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<?php } elseif($rval['MaxRated'] ==2){?>
						<button type="radio" value="1" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="2" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="3" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="4" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="5" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<?php } else{?>
						<button type="radio" value="1" class="rate rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="2" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="3" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="4" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<button type="radio" value="5" class="rateBorder glyphicon glyphicon-star" onclick="rating(this)"></button>
						<?php }?>
						
					<?php }}?>
					</div>

					<div class="clear"></div>
				</div>
  	    <?php
  	    	}
					 	
  	    	?>

				</div>		
				<div class="clear"></div>		
			

