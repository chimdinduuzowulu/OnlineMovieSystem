<?php
include('header.php');
?>
<link rel="stylesheet" href="../../validation/dist/css/bootstrapValidator.css"/>
    
<script type="text/javascript" src="../../validation/dist/js/bootstrapValidator.js"></script>
  <!-- =============================================== -->
  <?php
    include('../../form.php');
    $frm=new formBuilder; 
    include('../../config.php');     
  ?>   
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Booking
      </h1>
      
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Booking</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box --> 
      <div class="box">
      <?php include('../../msgbox.php');?>
        <div class="box-body">
        <?php 
               $qry=mysqli_query($con,"select * from tbl_bookings order by ticket_date asc");
                if(mysqli_num_rows($qry))
                  { $i=1; ?>
                  <table class="table">
                 <thead class="table-dark">
             <tr>
               <th scope="col">#</th>
               <th scope="col">Booking ID</th>
               <th scope="col">Theater</th>
               <th scope="col">Screen</th>
               <th scope="col">Seat</th>
               <th scope="col">Amount</th>
               <th scope="col">Ticket Date</th>
               <th scope="col">User ID</th>
               <th scope="col"></th>
             </tr>
           </thead>
           <tbody>
        <?php while($c=mysqli_fetch_array($qry)){?>  

             <tr>
               <th scope="row"><?php echo $i?></th>
               <td><?php echo $c["ticket_id"]?></td>
               <td><?php echo $c["theater"]?></td>
               <td><?php echo $c["screen"]?></td>
               <td><?php echo $c["no_seats"]?></td>
               <td><?php echo $c["amount"]?></td>
               <td><?php echo $c["ticket_date"]?></td>
               <td><?php echo $c["user_id"]?></td>
               <td><a style="color:red;" href="process_delete_booking.php?bid=<?php echo $c['ticket_id'];?>" class="fa fa-trash-o"></a></td>
             </tr>
                    
<?php $i++;}}?>
</tbody>
 </table>

<!-- ................ -->
        </div> 
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>

<?php include('footer.php');?>
<script type="text/javascript">
function deleteBooking(b)
    {
        if (confirm("Are you sure you want to delete?") == true) 
        {
            window.location="process_delete_booking.php?bid="+b;
        } 
    }
    </script>