<?php
include('header.php');
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
	
  $Id=$_GET['id'];
  include('config.php');
	?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Ticket</title>
</head>
<body>

<div class="container_fluid">
    <div id="printableArea" class="row" style="margin-top:160px;">
        <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <address>
                        <strong>Movie Ticket</strong>
                        <br>
                        No.7 Hombari Crescent,
                        <br>Off Ademola Adetokunbo
                            Wuse 2 Abuja, Nigeria
                        <br>
                        <abbr title="Phone">P:</abbr> +234 704 370 0000

                    </address>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em><strong>Date</strong>:<?php echo date("l jS \of F Y h:i:s A")?></em>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="text-center">
                    <h1>Receipt</h1>
                </div>
                <!-- </span> -->
                
                  <?php include('msgbox.php');?>
						      <?php
                    include ('phpqrcode/qrlib.php');
				            $bk=mysqli_query($con,"select * from tbl_bookings where book_id='$Id' AND user_id='".$_SESSION['user']."'");
				        if(mysqli_num_rows($bk))
				        {
                ?>
          <table class="table table-bordered">
						<thead>
						<th>Booking Id</th>
						<th>Movie</th>
						<th>Theatre</th>
						<th>Screen</th>
						<th>Seats</th>
						<th>Amount</th>
            <th>P_Date</th>
            <!-- <th>Show_Time</th> -->
						<!-- <th></th> -->
						</thead>
						<tbody>
						<?php
						while($bkg=mysqli_fetch_array($bk))
						{
              $userCodeId=$bkg['ticket_id'];
              $pixel_size=5;
              $frame_size=5;
              $path='QrCodeImages/';
              $file=$path.uniqid().".png";
              $ecc='L';
              QRcode::png($userCodeId,$file,$ecc,$pixel_size,$frame_size);
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
								 <?php echo $bkg['ticket_date'];?>
								</td>
                <!--  -->
                <!-- <td>
									<?php echo $bkg['start_time'];?>
								</td> -->
							</tr>
							<?php
						}
						?></tbody>
					</table>
          <center> <img src="<?php echo $file ?>" /></center>
          <a href="javascript:void(0);" onclick="printPageArea('printableArea')" class="btn btn-success btn-lg btn-block"><span ><i class="glyphicon glyphicon-print"></i></span>| Print Receipt</a>
          
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
      </div>
    </div>
		</div>
		<br><br>
<?php include('footer.php');?>
<script>
function printPageArea(areaID){
    var printContent = document.getElementById(areaID);
    var WinPrint = window.open('', '', 'width=650,height=650');
    WinPrint.document.write(printContent.innerHTML);
    WinPrint.document.close();
    WinPrint.focus();
    WinPrint.print();
    // WinPrint.close();
}
</script>
<!-- JavaScript Bundle with Popper -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script> -->
</body>
</html>
