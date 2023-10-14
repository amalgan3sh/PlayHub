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
	<center>
		<h1>SELECT NUMBER OF MEMBERS</h1>
		<table>
            <form action="<?php echo site_url(); ?>/Onlinecontroller/userBookSlot?week_id=<?php echo $_GET['week_id'];?>&turf_id=<?php echo $_GET['turf_id'] ?>&slot_id=<?php echo $_GET['slot_id'] ?>" method="post">
			<tr>
                <th>Number of members</th> 
                <td><input type="text" name="members"></td>        
            </tr>
            <tr>
                <th><input type="submit" name="submit" value="Continue Booking"></th>
            </tr>
        </form>
		</table>
	</center>

 </div>
            </div>
        </div>
    </div>
    <!-- //banner -->
</header>
<!-- next view slots -->