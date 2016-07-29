<?php
//    session_start();
//    $_SESSION["year"] = "2559" ;
    // $_SESSION['ro10app'] = "test@jasmine.com";

    include('classes/connection_pdo.php');
    //--Important--//
    // include ('./session_validate.php');
    
    $db = new DB();
    
    $get_location_district = '';
    if (isset($_GET["location_district"])) {
        $get_location_district = $_GET["location_district"];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>โครงการจัดสรรค่าไฟ</title>

  <!--CSS PACKS-->
  <?php include('./css_packs.html') ?>

  <!--SCRIPT PACKS-->
  <?php include('./script_packs.html') ?>

  <script type="text/javascript">

    $(document).ready(function() {
      // English menu --> Thai menu เพิ่มส่วนนี้เข้าไปจะถือว่าเป็นการตั้งค่าให้ Datatable เป็น Default ใหม่เลย
        $.extend(true, $.fn.dataTable.defaults, {
            "language": {
              "sProcessing": "กำลังดำเนินการ...",
              "sLengthMenu": "แสดง_MENU_ แถว",
              "sZeroRecords": "ไม่พบข้อมูล",
              "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
              "sInfoEmpty": "แสดง 0 ถึง 0 จาก 0 แถว",
              "sInfoFiltered": "(กรองข้อมูล _MAX_ ทุกแถว)",
              "sInfoPostFix": "",
              "sSearch": "ค้นหา:",
              "sUrl": "",
              "oPaginate": {
                            "sFirst": "เิริ่มต้น",
                            "sPrevious": "ก่อนหน้า",
                            "sNext": "ถัดไป",
                            "sLast": "สุดท้าย"
              }
             }
        });

        // Data Table function
        var table = $('#example').DataTable( {
            "dom": "<'row box-padding'<'col-sm-6 pull-left'l><'col-sm-6 pull-right'f>>rt<'row'<'col-md-6'i><'col-md-6'p>>",
            //"fixedHeader": true,
            "stateSave": true,
            "iDisplayLength": 10,
            "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
            "orderCellsTop": true,
            scrollY:        400,
            scrollX:        true,
            scrollCollapse: true,
            paging:         true,
            fixedColumns:   {
                leftColumns: 4,
                heightMatch: 'none'
            },
            'columnDefs': [{
              'targets': 0,
              'orderable': false
            }],

            "order": [[ 1, "desc" ]]
        } );

    } );

  </script>
  <style>
      .margin-small-right{
          margin-right: 15px;
      }
      .box-padding{
          padding: 10px;
          margin-top: 15px;
      }
      
  </style>
  <script type="text/javascript">
      //Script สำหรับ เลือก dropdown menu แบบไม่ต้องกด submit จะเปลี่ยนข้อมูลแบบ " A U T O "
      function location_district_filter()
      {
          document.form_name.submit();
      };
  </script>
</head>
<body>
    <!--Navbar-->
    <?php include ('./navbar.php'); ?>
    <!--/Navbar-->
    
  <div class="container-fluid">
  <!--Fileter Search -->
  
  <!--/Filter Search -->
  
  <div class="row">
    <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-warning margin-side" >
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title"> <strong>รายชื่อโครงการ</strong>
            <!--Hide button -->
            <!--<a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="glyphicon glyphicon-minus"></i>
          </a>-->
          </h4>
        </div><!--/panel header-->
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
              
          <!--TABLE-->
          <div class="row box" style="padding: 0px 5px 0px 5px;">
              <div class="col-sm-6 pull-left form-inline">
                  <div class="row">
                      <div class="col-sm-2">
                          <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#newProject">
                              <i class="glyphicon glyphicon-plus" ></i>&nbsp;เพิ่ม
                          </button>             
                      </div>
                      <div class="col-sm-9">
                          <div class="form-group">
                        <form name="form_name" onchange="location_district_filter()" method="get">  
                        <?php 
                        $sql_district = " SELECT DISTINCT location_district FROM project "; 

                        $query_district = $db->query($sql_district);
                        $query_district = $db->execute();
                        $query_district = $db->fetch();
                        ?>
                        <label>เขต : </label>
                        <select class="form-control" name="location_district">
                            <?php foreach ($query_district as $result_district) { ?>
                            <option value="<?php echo $result_district["location_district"]; ?>"  <?php if($get_location_district == $result_district["location_district"]){ echo "selected" ; } ?> >
                                <?php if($result_district["location_district"] == '') { echo "--ไม่ระบุเขต--"; } echo $result_district["location_district"]; ?>
                            </option>
                            <?php } ?>
                        </select>
                      </form>
                    </div>
                      </div>
                  </div>
                     
                    
              </div>
                <table id="example" class="display nowrap table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                    
                    <?php
                    $sql = "SELECT * FROM project WHERE location_district = '".$get_location_district."' ";
                    $query = $db->query($sql);
                    $query = $db->execute();
                    $query = $db->fetch();
                    ?>
                  <thead>
                      <tr class="active">
                          <th align = "center" ><i class="glyphicon glyphicon-pencil"></i></th>
                          <th align="center" style="width: 50px;" >Project_ID</th>
                          <th align="center" >ชื่อโครงการ</th>
                          <th align="center" >M</th>
                          <th align='center' >RO</th>
                          <th align='center' >Phase</th>
                          <th align='center' >Lot</th>
                          <th align='center' >Location_code</th>       
                          <th align='center' >เขต</th>
                          <th align='center' >ที่อยู่</th>
                          <th align="center" >ผู้ติดต่อ</th>
                          <th class="text-center" >เบอร์โทร</th>
                      </tr>
                  </thead>

                  <tbody>
                    <?php
                      foreach ($query as $key => $result) {
                        $project_id = $result["project_id"];
                        $project_name = $result["project_name"];
                        $m = $result["m"];
                        $ro = $result["ro"];
                        $phase = $result["phase"];
                        $lot =$result["lot"];
                        $location_code = $result["location_code"];
                        $location_district = $result["location_district"];
                        $address = $result["address"];
                        $contact = $result["contact"];
                        $tel =  $result["tel"];

                      ?>
                        <tr class="bg-white">
                            <td>
                                  <?php echo "<a><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#editProject$project_id' value='$project_id'>
                                      <i class='glyphicon glyphicon-pencil'></i>
                                      </button></a>"; ?>
                            </td>
                            <td><?php echo $project_id; ?></td>
                            <td><?php echo $project_name; ?></td>
                            <td><?php echo $m; ?></td>
                            <td><?php echo $ro; ?></td>
                            <td><?php echo $phase; ?></td>
                            <td><?php echo $lot; ?></td>
                            <td><?php echo $location_code; ?></td>
                            <td><?php echo $location_district; ?></td>
                            <td><?php echo $address; ?></td>
                            <td><?php echo $contact; ?></td>
                            <td><?php echo $tel; ?></td>

                            <!-- Modal Edit Bill Project -->
                            <?php include ('./model_edit_project.php'); ?>
                            <!--Modal-->
                        </tr>
                
                <?php } ?>

                </tbody>
                </form>

            </table>
                <!-- Modal New Project -->
                <?php include ('./modal_new_project.php'); ?>
                <!--Modal-->          
            </div>
          </div><!--/panel body-->
        </div>
      </div>
    </div><!--/panel box-->
  </div><!--/row-->
</div><!-- /container-->
</body>
</html>