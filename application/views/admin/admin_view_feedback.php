
    <!-- banner -->
    <div class="banner layer" id="home">
        <div class="container">
            <div class="row banner-text">
                <div class="slider-info col-lg-8">
                    <h1>FEEDBACK</h1>
                    <style type="text/css">
                        th,td,h1{
                            color: white;
                            opacity: 0.7;
                        }
                    </style>
                   
            </div>
            </form>
        
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
                        <td>
                          <a href="<?php echo site_url(); ?>/Onlinecontroller/adminDeleteFeedback?feedback_id=<?php echo $row->feedback_id ?>" class="button">Delete</a>
                        </td>
                    </tr>
                <?php  $n++;}?>
            </tbody>
            <style type="text/css">
                .button {
  display: inline-block;
  padding: 10px 20px;
  background-color: #0074d9; /* Change the background color to your preferred color */
  color: #fff; /* Text color */
  border: 1px solid #0074d9; /* Border color, same as background color for a flat button */
  border-radius: 4px; /* Rounded corners */
  text-decoration: none; /* Remove underline */
  text-align: center;
  cursor: pointer;
}

            </style>
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