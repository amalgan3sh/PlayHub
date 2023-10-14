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
    <h1>PROPRIETOR'S</h1>
        <table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Proprietor's Name</th>
                <th>Location</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($turf->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $row->turf_name;?></td>
                        <td><?php echo $row->location;?></td>
                        <td><?php echo $row->location;?></td>
                        <td><a href="<?php echo site_url(); ?>/Onlinecontroller/userSelectWeek?turf_id=<?php echo $row->turf_id;?>">View Slots</a></td>
                    </tr>
                <?php  $n++;}?>
            </tbody>
        </table>

 </div>
            </div>
        </div>
    </div>
    <!-- //banner -->
</header>