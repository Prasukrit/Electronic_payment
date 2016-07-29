<?php
    session_start();
    
    include('./Classes/connection_mysqli.php');
    //--Important--//
    // include ('./session_validate.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>นำเข้าไฟล์ Excel</title>

    <!--CSS PACKS-->
    <?php include('./css_packs.html') ?>

    <!--SCRIPT PACKS-->
    <?php include('./script_packs.html') ?>
  <style>
    .box{
      margin: 15px;
      background-color: #fff;
      border: 1px solid #e1e1e8;
      border-width: 1px;
      border-radius: 4px 4px 0 0;
    }
  </style>
</head>
<body>
	<div class="container">
    <br>
    <div class="panel panel-primary animated fadeIn">
        <form action="uploadfileexcel.php" type="post">
      <div class="panel-heading">
        <h3>อัพโหลดโครงการ</h3>
      </div>
      <div class="panel-body">
        <input type="file" name="fileToUpload" id="fileToUpload" class="filestyle" data-size="nr" data-buttonText="Import Excel" data-iconName="glyphicon glyphicon-folder-open" data-placeholder="ไม่มีไฟล์" data-buttonName="btn-info" data-icon="false" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" >
      </div>
      <div class="panel-footer">
        <div class="form-group">
          <input name="submit" class="btn btn-primary" type="submit" value="Upload">
        </div>
      </div>
      
    </form>
  </div>
	</div>
  
</body>
</html>