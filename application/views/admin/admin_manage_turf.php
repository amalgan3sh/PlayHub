
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
                    <h1>ADMIN MANAGE PROPRIETOR</h1>
        <table class="table">
            <form action="<?php echo site_url(); ?>/Onlinecontroller/adminAddTurf" method="post">
                <input type="text" name="id" id="id" hidden>
            <tr>
                <th>Proprietor name</th>
                <td><input type="text" name="turf_name" id="turf_name"></td>
            </tr>
            <tr>
                <th>Location</th>
                <td><input type="text" name="location" id="location"></td>
            </tr>
            <tr>
                <th>Username</th>
                <td><input type="text" name="username" id="username"></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><input type="password" name="password" id="password"></td>
            </tr>
            
            
        </table>
        <div class="offset-md-4">
                <input class="btn btn-success" type="submit" name="btnsave" value="Save" id="btnsave">
                   <input class="btn btn-danger" type="submit" name="btndelete" value="Delete" id="btndelete" formaction="<?php echo site_url(); ?>/Onlinecontroller/adminDeleteTurf">
                   <input class="btn btn-info" type="submit" name="btnclear" value="Clear" id="btnclear">
                   <input class="btn btn-warning" type="submit" name="btnclose" value="Close" id="btnclose" formaction="<?php echo base_url(); ?>index.php/Onlinecontrol/home">
            </div>
            </form>
        <h1>PROPRIETOR</h1>
        <table id="dataTable" class="table">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Proprietor Name</th>
                <th>Location</th>
                <th>Username</th>
                <th>Password</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($turf->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $row->turf_id;?></td>
                        <td><?php echo $row->turf_name;?></td>
                        <td><?php echo $row->location;?></td>
                        <td><?php echo $row->username;?></td>
                        <td><?php echo $row->password;?></td>
                        <td><?php echo $row->status;?></td>
                        <td><?php echo $row->status;?></td>
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