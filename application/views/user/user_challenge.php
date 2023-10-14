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
                    <a href="<?php echo site_url(); ?>/Onlinecontroller/userViewChallengeRequest">Challenge Request</a>
<body>
    <h1>CHALLENGER'S</h1>
        <table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Challenger's Name</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($challenger->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $row->challenger_name;?></td>
                        <td><a href="<?php echo site_url(); ?>/Onlinecontroller/userChallengeUser?user_id=<?php echo $row->user_id ?>&turf_id=<?php echo $row->turf_id ?>">Challenge</a></td>
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