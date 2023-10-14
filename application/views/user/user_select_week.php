<!-- banner -->
<div class="banner layer" id="home" style="height: 800px;">
    <div class="container">
        <div class="row banner-text">
            <div class="slider-info col-lg-8">
                <style type="text/css">
                    .calendar {
                        display: grid;
                        grid-template-columns: repeat(7, 1fr);
                        gap: 10px;
                        text-align: center;
                    }

                    .calendar th,
                    .calendar td {
                        width: 50px;
                        height: 50px;
                        border: 1px solid #ccc;
                        background-color: #f5f5f5;
                        color: #333;
                    }

                    .calendar th {
                        background-color: #333;
                        color: #fff;
                    }

                    /* Style for the week_name */
                    .week-button {
                        display: inline-block;
                        padding: 10px 20px;
                        background-color: #007bff; /* You can change the color to your preference */
                        color: #fff;
                        text-decoration: none;
                        border-radius: 5px;
                        margin: 5px;
                        font-weight: bold;
                    }
                </style>
                <body>
                    <center>
                        <h1 style="color: white;">SELECT WEEK</h1>
                        <div class="calendar">
                            <?php
                            $n = 1;
                            foreach ($weeks->result() as $row) {
                                // You may need to adjust the logic to display weeks in the calendar.
                                // For example, you can check the current day and highlight the current week.
                                echo '<a class="week-button" href="' . site_url() . '/Onlinecontroller/userViewSlots?week_id=' . $row->week_id . '&turf_id=' . $_GET['turf_id'] . '">' . $row->week_name . '</a>';
                                $n++;
                            }
                            ?>
                        </div>
                    </center>
                </body>
            </div>
        </div>
    </div>
</div>
<!-- //banner -->
</header>
<!-- next view slots -->
