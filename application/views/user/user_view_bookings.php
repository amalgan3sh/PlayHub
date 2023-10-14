    <!-- banner -->
    <div class="banner layer" id="home" style="height:800px;">
        <div class="container">
            <div class="row banner-text">
                <div class="slider-info col-lg-8">
        <style type="text/css">
                        th,td,h1{
                            color: white;
                            opacity: 0.7;
                        }
                    </style>
<body>

    <?php
$description        = "Product Description";
$txnid              = date("YmdHis");     
$key_id             = "rzp_test_Al5H6FRRN067tX";
$currency_code      = 'INR';            

$merchant_order_id  = "ABC-".date("YmdHis");
$card_holder_name   = 'Amal Ganesh';
$email              = 'amalganesh4u@gmail.com';
$phone              = '7356529545';
$name               = "RazorPay Infovistar";
?>

	<center>
		<h1>Your Bookings</h1>
		<table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Turf Name</th>
                <th>Location</th>
                <th>Day</th>
                <th>Members</th>
                <th>Slot</th>
                <th>Booking Date</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php
                $n = 1;

                foreach ($bookings->result() as $row) {
                    // Calculate the amount based on the number of members
                    $amount = 100 * $row->members;
                    // Generate a unique order ID (alphanumeric) for each booking
                    $order_id = "ABC-" . date("YmdHis");
                    ?>
                    <tr>
                        <td><?php echo $n; ?></td>
                        <td><?php echo $row->turf_name; ?></td>
                        <td><?php echo $row->location; ?></td>
                        <td><?php echo $row->week_name; ?></td>
                        <td><?php echo $row->members; ?></td>
                        <td><?php echo $row->slot_time; ?></td>
                        <td><?php echo $row->booking_date; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <?php if ($row->status !== 'cancelled') { ?>
                            <td><a href="javascript:void(0);" onclick="razorpaySubmit(<?php echo $amount*100; ?>, <?php echo $row->booking_id; ?>);">Pay</a></td>
                            <td><a href="<?php echo site_url(); ?>/Onlinecontroller/userCancelBooking?booking_id=<?php echo $row->booking_id; ?>">Cancel Booking</a></td>
                        <?php } ?>
                    </tr>
                    <?php
                    $n++;
                }
                ?>


            </tbody>
        </table>
	</center>

 </div>
            </div>
        </div>
    </div>
    <!-- //banner -->
</header>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    function razorpaySubmit(amount,booking_id) {
        // Now you can use the 'amount' variable to process the payment
        // You can pass this 'amount' to your payment gateway (Razorpay in this case)

        // For example, you can create a Razorpay payment object and proceed with payment
        var options = {
            key: 'rzp_test_Al5H6FRRN067tX',
            amount: amount, // Pass the amount here
            name: 'Booking Payment',
            description: 'Payment for booking',
            handler: function (response) {
                // Handle the Razorpay payment success
                alert('Payment successful! Payment ID: ' + response.razorpay_payment_id);
                updateBookingStatus(booking_id);
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    }

    function updateBookingStatus(bookingId) {
    // Make an AJAX request to update the booking status
        console.log('hai');
    $.ajax({
        url: '<?php echo site_url(); ?>/Onlinecontroller/updateBookingStatusAfterPayment?booking_id=' + bookingId, // Replace with the actual URL to your update script
        method: 'POST',
        data: {
            booking_id: bookingId,
            new_status: 'Paid'
        },
        success: function (response) {
            // Handle the response from the server (e.g., show a success message)
            if (response) {
                alert('Payment successful');
                location.reload();
            } else {
                alert('successful');
                location.reload();
            }
        },
        error: function () {
            location.reload();

        }
    });
}
</script>