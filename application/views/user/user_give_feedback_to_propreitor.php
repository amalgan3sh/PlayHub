
    <!-- banner -->
    <div class="banner layer" id="home">
        <div class="container">
            <div class="row banner-text">
                <div class="slider-info col-lg-8">
                    <style type="text/css">
                        th,td,h1{
                            color: white;
                            opacity: 0.7;
                        }
                    </style>
                    <h1>GIVE FEEDBACK</h1>
        <table class="table">
            <form action="<?php echo site_url(); ?>/Onlinecontroller/userAddFeedbackPropreitor" method="post">
                <input type="text" name="id" id="id" hidden>
            <tr>
                <th>Feedback</th>
                <td><textarea name="feedback"></textarea></td>
            </tr>
            <input type="text" hidden name="turf_id" id="turf_id" value="<?php echo isset($_GET['turf_id']) ? $_GET['turf_id'] : ''; ?>">

      
        </table>
        <div class="offset-md-4">
                <input class="btn btn-success" type="submit" name="btnsave" value="Post Feedback" id="btnsave">
                   
            </div>
            </form>
        <h1>FEEDBACK</h1>
        <table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Feedback</th>
                <th>Date Time</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($feedback->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $row->feedback_id;?></td>
                        <td><?php echo $row->description;?></td>
                        <td><?php echo $row->datetime;?></td>
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

<script type="text/javascript">
    
    var table = document.getElementById('dataTable');
                      
                      for(var i = 1; i < table.rows.length; i++)
                      {
                          table.rows[i].onclick = function()
                          {
                               document.getElementById("id").value = this.cells[0].innerHTML;
                               document.getElementById("turf_name").value = this.cells[1].innerHTML;
                               document.getElementById("location").value = this.cells[2].innerHTML;
                               document.getElementById("username").value = this.cells[3].innerHTML;
                               document.getElementById("password").value = this.cells[4].innerHTML;
                               document.getElementById("btnsave").value = "Update";
                                
                               
                          };
                      }
         var clear = document.getElementById('btnclear');   
        clear.onclick=function()
         {
                                document.getElementById("turf_name").value = "";
                               document.getElementById("location").value = "";
                               document.getElementById("username").value ="";
                               document.getElementById("password").value ="";
                               document.getElementById("btnsave").value = "Save";
                              
         } 
</script>