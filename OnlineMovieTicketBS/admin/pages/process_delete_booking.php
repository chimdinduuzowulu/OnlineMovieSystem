<?php
session_start();
include('../../config.php');

$booking_ID=$_GET['bid'];
mysqli_query($con,"delete  from tbl_bookings where ticket_id='$booking_ID'");
 $_SESSION['success']="Booking deleted  successfully";
header("location:manage_booking.php");
?>