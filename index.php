<?php
//    session_start();
//    $_SESSION["year"] = "2559" ;
    // $_SESSION['ro10app'] = "test@jasmine.com";

    include('classes/connection_pdo.php');
    //--Important--//
    // include ('./session_validate.php');
    
    $db = new DB();
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
</head>
<body>
  <?php 

if (isset($_GET["year"])) {
    $year = $_GET["year"];
}else {
    $year = '2559';
}

if(isset($_GET["month_start"])){
    $month_condition = $_GET["month_start"];
} else {

    $month_condition = '1';
}

?>
    <!--Navbar-->
    <?php include ('./navbar.php'); ?>
    <!--/Navbar-->
    
  <div class="container-fluid">
  <!--Fileter Search -->
  <div class="row">
        <div class="panel-group">
            <div class="panel panel-primary margin-side" style="min-width:840px">
<!--                <div class="panel-heading">ค้นหา</div>-->
                <div class="box-padding">
                    <form action="index.php" method="get">
                        <div class="col-md-offset-1 col-md-1">
                            <h4 style="margin-top: 28px;color: #004e8b;">ค้นหา</h4>
                        </div>
                        <div class=" col-md-3">
                            <div class="form-group">
                                <label>
                                    เลือกปี</label>
                                <select name="year" class="form-control">

                                    <option value="2559" <?=$year == "2559" ? ' selected="selected"' : ''?> >2559
                                    </option>
                                    <option value="2558" <?=$year == "2558" ? ' selected="selected"' : ''?> >2558
                                    </option>

                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>
                                    เลือกเดือน</label>
                                <select name="month_start" class="form-control">
                                    <option value="">--เลือกเดือน--</option>
                                    <option value="1" <?=$month_condition == "1" ? ' selected="selected"' : ''?> >มกราคม</option>
                                    <option value="2" <?=$month_condition == "2" ? ' selected="selected"' : ''?> >กุมภาพันธ์</option>
                                    <option value="3" <?=$month_condition == "3" ? ' selected="selected"' : ''?> >มีนาคม</option>
                                    <option value="4" <?=$month_condition == "4" ? ' selected="selected"' : ''?> >เมษายน</option>
                                    <option value="5" <?=$month_condition == "5" ? ' selected="selected"' : ''?> >พฤษภาคม</option>
                                    <option value="6" <?=$month_condition == "6" ? ' selected="selected"' : ''?> >มิถุนายน</option>
                                    <option value="7" <?=$month_condition == "7" ? ' selected="selected"' : ''?> >กรกฎาคม</option>
                                    <option value="8" <?=$month_condition == "8" ? ' selected="selected"' : ''?> >สิงหาคม</option>
                                    <option value="9" <?=$month_condition == "9" ? ' selected="selected"' : ''?> >กันยายน</option>
                                    <option value="10" <?=$month_condition == "10" ? ' selected="selected"' : ''?> >ตุลาคม</option>
                                    <option value="11" <?=$month_condition == "11" ? ' selected="selected"' : ''?> >พฤศจิกายน</option>
                                    <option value="12" <?=$month_condition == "12" ? ' selected="selected"' : ''?> >ธันวาคม</option>
                                </select>

                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-sm-2">
                                <input class="btn btn-success btn-md" style="margin-top:25px;width:100%;" type="submit" value="Search">
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
  </div>
  <!--/Filter Search -->
  
  <div class="row">
    <div class="panel-group " id="accordion" role="tablist" aria-multiselectable="true">
      <div class="panel panel-warning margin-side" >
        <div class="panel-heading" role="tab" id="headingOne">
          <h4 class="panel-title"> <strong>รายการข้อมูลโครงการ</strong>
            <!--Hide button -->
            <!--<a class="pull-right" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> <i class="glyphicon glyphicon-minus"></i>
          </a>-->
          </h4>
        </div><!--/panel header-->
        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
          <div class="panel-body">
              
          <!--TABLE-->
          <div class="row box" style="padding: 0px 5px 0px 5px;">
              <div class="col-sm-6 pull-left">
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#myModal">
                      <i class="glyphicon glyphicon-plus" ></i>&nbsp;เพิ่ม
                  </button>
              </div>
                <table id="example" class="display nowrap table table-striped table-hover table-bordered" cellspacing="0" width="100%">
                    
                    <?php
                    $sql = "SELECT e.electronic_bill_no as bill_no, e.project_id as id, p.project_name as project_name, p.location_code as location_code , "
                            . " e.meter_no as meter_no , e.previous_meter_no as previous_meter_no  , "
                            . " e.price_per_unit as price_per_unit, e.fine_pay as fine, e.addition_pay as addition , "
                            . " e.maintence_pay as maintence , e.vat as vat , e.amount as amount , e.period as period , "
                            . " e.pr_no as pr_no, e.document as document , e.remark as remark , "
                            . " e.actual_unit as actual_unit , m.month_name as month_name , m.month_no as month_no "
                            . " FROM electronic_bill e "
                            . " JOIN project p ON p.project_id = e.project_id "
                            . " JOIN months m ON e.month_no = m.month_no "
                            . "WHERE year = '" . $year . "' and e.month_no='" . $month_condition . "' and meter_no !='0' ";
                    $query = $db->query($sql);
                    $query = $db->execute();
                    $query = $db->fetch();
                    ?>
                  <thead>
                      <tr class="active">
                          <th align = "center" ><i class="glyphicon glyphicon-pencil"></i></th>
                          <th align="center" style="width: 50px;" >No</th>
                          <th align="center" style="width: 300px;">ชื่อโครงการ</th>
                          <th align="center" style="width: 100px;">Location_code</th>
                          <th align='center' style="width: 70px;">เลขมิเตอร์</th>
                          <th align='center' style="width: 70px;">ครั้งก่อน</th>
                          <th align='center' style="width: 70px;">ใช้จริง</th>
                          <th align='center' style="width: 80px;">อัตรา/หน่วย</th>       
                          <th align='center' style="width: 100px;">ค่าปรับ</th>
                          <th align='center' style="width: 100px;">จ่ายเพิ่ม</th>
                          <th align="center" style="width: 100px;">ค่าบำรุงมิเตอร์</th>
                          <th class="text-center" style="width: 60px;">vat7%</th>
                          <th align="center" style="width: 100px;">จำนวนเงิน</th>
                          <th align="center" style="width: 100px;">งวดการจ่ายเงิน</th>
                          <th align="center" style="width: 80px;">PR NO</th>
                          <th align="center" style="width: 80px;">เอกสาร</th>
                          <th align="center" style="width: 120px;">หมายเหตุ</th>
                          <th align="center" style="width: 100px;">เดือน</th>
                      </tr>
                  </thead>
                   
                  
                  
                  <tbody>
                    <?php
                      foreach ($query as $key => $result) {
                        $bill_no = $result["bill_no"];
                        $project_id = $result["id"];
                        $project_name = $result["project_name"];
                        $location_code = $result["location_code"];
                        $meter_no = $result["meter_no"];
                        $previous_meter_no =$result["previous_meter_no"];
                        $actual_unit = $result["actual_unit"];
                        $price_per_unit = $result["price_per_unit"];
                        $fine_pay = $result["fine"];
                        $addition_pay = $result["addition"];
                        $maintence_pay =  $result["maintence"];
                        $vat = $result["vat"];
                        $amount = $result["amount"];
                        $period = $result["period"];
                        $pr_no = $result["pr_no"];
                        $document = $result["document"];
                        $remark = $result["remark"];
                        $month_no = $result["month_no"];
                        $month = $result["month_name"];
                      ?>
                        <tr class="bg-white">
                            <td>
                                  <?php echo "<a><button type='button' class='btn btn-default btn-xs' data-toggle='modal' data-target='#myModal$project_id' value='$project_id'>
                                      <i class='glyphicon glyphicon-pencil'></i>
                                      </button></a>"; ?>
                            </td>
                            <td><?php echo $project_id; ?></td>
                            <td><?php echo $project_name; ?></td>
                            <td><?php echo $location_code; ?></td>
                            <td><?php echo $meter_no; ?></td>
                            <td><?php echo $previous_meter_no; ?></td>
                            <td><?php echo $actual_unit; ?></td>
                            <td><?php echo $price_per_unit; ?></td>
                            <td><?php echo $fine_pay; ?></td>
                            <td><?php echo $addition_pay; ?></td>
                            <td><?php echo $maintence_pay; ?></td>
                            <td><?php echo $vat; ?></td>
                            <td><?php echo $amount; ?></td>
                            <td><?php echo $period; ?></td>
                            <td><?php echo $pr_no; ?></td>
                            <td><?php echo $document; ?></td>
                            <td><?php echo $remark; ?></td>
                            <td><?php echo $month ; ?></td>
                            <!-- Modal Edit Bill Project -->
                            <?php include ('./modal_edit_bill_project.php'); ?>
                            <!--Modal-->
                        </tr>
                
                <?php } ?>

                </tbody>
                </form>

            </table>
                <!-- Modal New Project -->
                <?php include ('./modal_new_bill_project.php'); ?>
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