<html>
    <head>
        <title>Turf Home</title>
    </head>
    <body>
        <h1>WORKING DAYS</h1>
        <table>
            <form action="<?php echo site_url(); ?>/Onlinecontroller/turfAddWorkingDays" method="post">
                <input type="text" name="id" id="id" hidden>
            <tr>
                <th>Week Day</th>
                <td><select class="form-control" name="week_id" id="week_id">
                      <?php foreach($working_weeks->result() as $week){ ?>
                            <option value="<?php echo $week->working_day_id;?>"><?php echo $week->week_name;?></option>
                      <?php  } ?>
                      </select></td>
            </tr>
        </table>
        <div class="offset-md-4">
                <input class="btn btn-success" type="submit" name="btnsave" value="Save" id="btnsave">
                   <input class="btn btn-danger" type="submit" name="btndelete" value="Delete" id="btndelete" formaction="<?php echo site_url(); ?>/Onlinecontroller/turfDeleteWorkingWeek">
                   <input class="btn btn-info" type="submit" name="btnclear" value="Clear" id="btnclear">
                   <input class="btn btn-warning" type="submit" name="btnclose" value="Close" id="btnclose" formaction="<?php echo base_url(); ?>index.php/Onlinecontrol/home">
            </div>
            </form>
        <h1>TURFS</h1>
        <table id="dataTable">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Week Name</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($working_days->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $row->working_day_id;?></td>
                        <td><?php echo $row->week_name;?></td>
                    </tr>
                <?php  $n++;}?>
            </tbody>
        </table>
    </body>
</html>

<script type="text/javascript">
    
    var table = document.getElementById('dataTable');
                      
                      for(var i = 1; i < table.rows.length; i++)
                      {
                          table.rows[i].onclick = function()
                          {
                               document.getElementById("id").value = this.cells[0].innerHTML;
                               document.getElementById("week_id").value = this.cells[1].innerHTML;
                               document.getElementById("btnsave").value = "Update";
                                
                               
                          };
                      }
         var clear = document.getElementById('btnclear');   
        clear.onclick=function()
         {
                                document.getElementById("id").value = "";
                               document.getElementById("week_id").value = "";
                               document.getElementById("btnsave").value = "Save";
                              
         } 
</script>