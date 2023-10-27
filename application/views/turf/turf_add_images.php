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
        <h1>IMAGES</h1>
        <table>
            <form action="<?php echo site_url(); ?>/Onlinecontroller/turfAddImages" method="post"  enctype="multipart/form-data">
                <input type="text" name="id" id="id" hidden>
            <tr>
                <th>Upload Image</th>
                <td><input type="file" name="image"></td>
            </tr>
        </table>
        <div class="offset-md-4">
                <input class="btn btn-success" type="submit" name="btnsave" value="Save" id="btnsave">
                   
                   <input class="btn btn-warning" type="submit" name="btnclose" value="Close" id="btnclose" formaction="<?php echo base_url(); ?>index.php/Onlinecontrol/home">
            </div>
            </form>
        <h1>IMAGES</h1>
        <table id="dataTable">
            <thead>
            <tr>
                <th>Sno</th>
                <th>Image</th>
            </tr>
            </thead>
            <tbody id="myTable">
                <?php 
                    $n=1; 
                    foreach($images->result() as $row)
                    {?>
                        <tr>
                        <td><?php echo $row->image_id;?></td>
                        <td>
                            <?php

                            // Replace the local path with the web server URL
                            $localPath = $row->image_path;
                            $webServerUrl = 'http://localhost/';
                            $webPath = str_replace('C:/wamp64/www/', $webServerUrl, $localPath);
                            ?>

                            <img src="<?php echo $webPath; ?>" alt="Image" width="100" height="100">


                    </td>
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