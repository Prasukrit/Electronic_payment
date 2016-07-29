<html>
<head>
	<title>Upload excel !!</title>
	<meta http-equiv="refresh" content="500;url=importfile.php">
</head>
	<body>
	<?php
	/* Connect DB */
	include('./classes/connection_mysqli.php');
	/** PHPExcel */
	require_once './classes/PHPExcel.php';

	/** PHPExcel_IOFactory - Reader */
	include './classes/PHPExcel/IOFactory.php';
	
	$target_dir = "uploads/";
	$target_file = $target_dir .date('Ymd-hs-').basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$file =basename($_FILES["fileToUpload"]["name"]);
	$inputFileName = $file;

	//กำหนดไฟล์ที่ต้องการดึงข้อมูล / จากโฟลเดอร์ที่เก็บหรืออัพโหลดมาเก็บไว้
	$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
	$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
	$objReader->setReadDataOnly(true);  
	$objPHPExcel = $objReader->load($inputFileName);  


	// ไม่เอา Header เริ่มอ่านข้อมูลที่แถวที่ 4

	$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
	$highestRow = $objWorksheet->getHighestRow();
	$highestColumn = $objWorksheet->getHighestColumn();

	$r = -1;
	$namedDataArray = array();
	for ($row = 4; $row<= $highestRow; ++$row) {
	$dataRow = $objWorksheet->
		rangeToArray('A'.$row.':'.$highestColumn.$row,null, true, true, true);
		if ((isset($dataRow[$row]['A'])) && ($dataRow[$row]['A'] != '')) {
		    ++$r;
		    $namedDataArray[$r] = $dataRow[$row];
		}
	}

	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	$excelFileType = pathinfo($target_file,PATHINFO_EXTENSION);
	// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
	    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
	    if($check !== false) {
	        echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 1;
	    } else {
	        echo "File is not an image.";
	        $uploadOk = 0;
	    }
	}
	// Check if file already exists
	if (file_exists($target_file)) {
	    echo "Sorry, file already exists.";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileToUpload"]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	    $uploadOk = 0;
	}

   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ".date('Ymd-hs-').basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
	

	/*
   Code :
	Insert to Database
	ดึงค่ามาบันทึกลงในฐานข้อมูลที่ออกแบบไว้ ตามฟิลด์ที่ต้องการเก็บข้อมูล อยู่ใน Loop Foreach
	*/

	if(COUNT($namedDataArray) >= 0){
		$i = 0;
		foreach ($namedDataArray as $result) {
			$i++;
			
			if(trim($result["A"]) !=""){

				$strSQL = "INSERT INTO project (project_id, m, ro, phase, lot, project_name, location_code, address, contact, tel, location_district) VALUES ('".$result["A"]."' , '".$result["B"]."' , '".$result["C"]."' , '".$result["D"]."' , '".$result["E"]."' , '".$result["F"]."' , '".$result["G"]."' , '".$result["H"]."' , '".$result["I"]."' , '".$result["J"]."' , '".$result["K"]."' )";
				
				//echo $strSQL;
				if (mysqli_query($conn, $strSQL)) {
					$newsuccess = "New record created successfully";
				} else {
					echo "Error: " . $strSQL . "<br>" . mysqli_error($conn);
				}

				
			}
				
		}
		echo "<br>Insert successfully!!" ;
	}
	?>
	</body>
</html>