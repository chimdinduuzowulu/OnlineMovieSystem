<?php include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	$qry2=mysqli_query($con,"select * from tbl_movie where movie_id='".$_SESSION['movie']."'");
	$movie=mysqli_fetch_array($qry2);
	?>
<div class="content">
	<div class="wrap">
		<div class="content-top">
				<div class="section group">
					<div class="about span_1_of_2">	
						<h3 style="color:black;" class="text-center">BOOKING HISTORY</h3>
						<?php include('msgbox.php');?>
						<?php
				$bk=mysqli_query($con,"select * from tbl_bookings where user_id='".$_SESSION['user']."'");
				if(mysqli_num_rows($bk))
				{
					?>
					<table class="table table-bordered">
						<thead>
						<th>Booking Id</th>
						<th>Movie</th>
						<th>Theatre</th>
						<th>Screen</th>
						<!-- <th>Show</th> -->
						<th>Seats</th>
						<th>Amount</th>
						<th></th>
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
							
							?>
							<tr>
								<td>
									<?php echo $bkg['ticket_id'];?>
								</td>
								<td>
									<?php echo $bkg['movie'];?>
								</td>
								<td>
									<?php echo $bkg['theater'];?>
								</td>
								<td>
									<?php echo $bkg['screen'];?>
								</td>
							
								<td>
									<?php echo $bkg['no_seats'];?>
								</td>
								<td>
									# <?php echo $bkg['amount'];?>
								</td>
								<td>
									
									<a href="cancel.php?id=<?php echo $bkg['book_id'];?>" style="text-decoration:none; color:red;"><i class="glyphicon glyphicon-remove"></i></a> <span>|</span> <a href="print.php?id=<?php echo $bkg['book_id'];?>" style="text-decoration:none; color:green;"><i class="glyphicon glyphicon-print"></i></a>
									
								</td>
							</tr>
							<?php
						}
						?></tbody>
					</table>
					<?php
				}
				else
				{
					?>
					<h3 style="color:red;" class="text-center">No Previous Bookings Found!</h3>
					<p>Once you start booking movie tickets with this account, you'll be able to see all the booking history.</p>
					<?php
				}
				?>
					</div>			
				<?php include('movie_sidebar.php');?>
				
			</div>
				<div class="clear"></div>		
			</div>
	</div>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
	$('#seats').change(function(){
		var charge=<?php echo $screen['charge'];?>;
		amount=charge*$(this).val();
		$('#amount').html("# "+amount);
		$('#hm').val(amount);
	});
</script>