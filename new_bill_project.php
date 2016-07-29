<?php
	include('classes/connection_mysqli.php');       
        $year = $_POST["year"];
        $month = $_POST["month_no"];
        
        if(isset($_POST["submit"])){
            // เพื่อที่จะเอาค่า meter_no จากเดือนที่แล้วมาใส่ previous_meter_no ในเดือนปัจจุบัน
            $month_previous = $_POST["month_no"]-1;
            $sql_previous = "select project_id from project where project_name like '%".$_POST["project_name"]."%' " ;
            $sql_previous = "SELECT
                                    e.electronic_bill_no,
                                    e.meter_no As meter_no,
                                    e.project_id AS project_id,
                                    p.project_name AS project_name
                            FROM
                                    electronic_bill e
                            JOIN project p ON p.project_id = e.project_id
                            WHERE
                                e.YEAR = '".$_POST["year"]."' 
                            AND e.month_no = '".$month_previous."' 
                            AND p.project_name = '".$_POST["project_name"]."' 
                            AND e.meter_no != '0' ";
            
        $query_previous = mysqli_query($conn, $sql_previous) ;
            $result_previous = mysqli_fetch_array($query_previous);
            echo "meter_no : ".$result_previous["meter_no"];
            echo "id : ".$result_previous["project_id"];
            echo "month : ".$month_previous;
        }

	$sql = "INSERT INTO electronic_bill (meter_no,previous_meter_no , fine_pay, addition_pay, maintence_pay, vat, amount, pr_no, document, period, remark,month_no, year, project_id) "
                . "VALUES('".$_POST["meter_no"]."', ".$result_previous["meter_no"].",'".$_POST["fine_pay"]."','".$_POST["addition_pay"]."','".$_POST["maintence_pay"]."','".$_POST["vat"]."','"
                .$_POST["amount"]."','".$_POST["pr_no"]."','".$_POST["document"]."','".$_POST["period"]."','"
                .$_POST["remark"]."' , '".$_POST["month_no"]."','".$_POST["year"]."', '".$result_previous["project_id"]."')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        header("Location: index.php?year=$year&month_start=$month");
?>