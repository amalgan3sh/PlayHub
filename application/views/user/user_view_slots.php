<!-- banner -->
<div class="banner layer" id="home" style="height: 800px;">
    <div class="container">
        <div class="row banner-text">
            <div class="slider-info col-lg-8">
                <style type="text/css">
                    th,
                    td,
                    h1 {
                        color: white;
                        opacity: 0.7;
                    }

                    /* Add custom styles for the table container */
                    .table-container {
                        max-height: 400px; /* Set the maximum height you prefer */
                        overflow-y: auto;
                    }

                    /* Add media query for mobile screens */
                    @media (max-width: 768px) {
                        .table-container {
                            max-height: none; /* Remove the max height for mobile screens */
                        }
                    }

                    /* Rest of your styles... */

                    .book-slot-button {
                        background-color: #4CAF50;
                        color: white;
                        border: none;
                        padding: 8px 12px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        border-radius: 5px;
                        cursor: pointer;
                    }
                </style>
                <body>
                    <h1>SLOTS</h1>
 

                    <!-- Wrap the table in a container with a fixed height -->
                    <div class="table-container">
                        <table id="dataTable">
                            <thead>
                                <tr>
                                    <th>Sno</th>
                                    <th>Time</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $n = 1;
                                foreach ($slots->result() as $row) { ?>
                                    <tr>
                                        <td><?php echo $n; ?></td>
                                        <td><?php echo $row->slot_time; ?></td>
                                        <td>
                                            <a class="book-slot-button" href="<?php echo site_url(); ?>/Onlinecontroller/userSelectMembers?week_id=<?php echo $_GET['week_id']; ?>&turf_id=<?php echo $_GET['turf_id']; ?>&slot_id=<?php echo $row->slot_id; ?>">Book Slot</a>
                                        </td>
                                    </tr>
                                <?php
                                    $n++;
                                } ?>
                            </tbody>
                        </table>

                        <!-- Add this HTML section after your existing code -->

                    </div>
                </body>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
</header>
