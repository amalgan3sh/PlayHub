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
    <h1>CHALLENGE REQUEST</h1>
        <table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Challenger's Name</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($challenge_request->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $n;?></td>
                        <td><?php echo $row->challenger_name;?></td>
                        <td><?php echo $row->challenge_status;?></td>
                        <td><a href="<?php echo site_url(); ?>/Onlinecontroller/userAcceptChallenge?challenge_id=<?php echo $row->challenge_id ?>">Accept Challenge</a></td>
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