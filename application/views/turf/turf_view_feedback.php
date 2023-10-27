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
</head>
<body>
	<center>
		<h1>FEEDBACK</h1>
		<table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Users name</th>
                <th>Feedback</th>
                <th>Date</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($bookings->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $row->username;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->datetime;?></td>
                    </tr>
                <?php  $n++;}?>
            </tbody>
        </table>
	</center>
  </div>
            </div>
        </div>
    </div>
    <!-- //banner -->
</header>