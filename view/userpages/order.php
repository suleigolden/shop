<!DOCTYPE html>
<html lang="en">
<?php
include_once("headlinks.php");
?>
  <body>

    <div id="wrapper">
     <!-- Include navigation links -->
<?php
include_once("navigation.php");
?>

      <div id="page-wrapper">
      	<div class="row">
            <h2 class="page-header" style="text-align:center;">My Order</h2>

            <div class="col-lg-12" id="result_output">
                <div id="dataTables-example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
                                <div class="row">
                                <h4 id="requestSearch_status"></h4>
                                <div class="col-sm-12">
                                <table width="100%" class="table table-striped table-bordered table-hover dataTable no-footer dtr-inline collapsed" id="dataTables-example" role="grid" aria-describedby="dataTables-example_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="photo" style="width: 71px;">ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 90px;">User ID</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 81px;">Transaction name</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 60px;">Paymen Type</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 60px;">Address</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 60px;">Products</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="" style="width: 60px;">Order Date</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTables-example" rowspan="1" colspan="1" aria-label="Action" style="width: 60px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="result_output">
                                     <?php
                                     $uID = $_SESSION['userIdentificationNavi'];
                                      $querycheck= mysqli_query($connect,"SELECT * FROM ordercart WHERE UserID='$uID' ");
                                          while($revnt = mysqli_fetch_assoc($querycheck)){
                                            $tranID = $revnt['id'];
                                            $getUserID = $revnt['UserID'];
                                            $getcarts = $revnt['chart'];
                                            $getNameonCard = $revnt['NameonCard'];
                                            $getCardNumber = $revnt['CardNumber'];
                                            $getExpirationDate = $revnt['ExpirationDate'];
                                            $getSecurityCode = $revnt['SecurityCode'];
                                            $getHomeAddress = $revnt['HomeAddress'];
                                            $getPaymenType = $revnt['PaymenType'];
                                            $getcreated_at = $revnt['created_at'];

                                            echo '<tr>
                                                    <td>'.$tranID.'</td>
                                                    <td>'.$getUserID.'</td>
                                                    <td>'.$getNameonCard.'</td>
                                                    <td>'.$getPaymenType.'</td>
                                                    <td>'.$getHomeAddress.'</td>
                                                    <td>'.$getcarts.'</td>
                                                    <td>'.$getcreated_at.'</td>
                                                    <td><a href="?/&goto=orderdetails&cart='.$tranID.'" target="_blank">View Full Details</a></td>
                                                  </tr>';

                                          }
                                         
                                    ?>
                                    </tbody>
                                </table>
                                </div>
                                </div>
                                </div>
            </div>
            <div class="col-lg-3" style="border-left:3px #CCC solid;">
               
            </div>
          

        </div>
      </div>

    </div>
 
<?php
include_once("footer.php");
?>  
  </body>
</html>
