<?php
	include('Classes/connection_pdo.php');
        
        $year = $_POST["year"];
        $month = $_POST["month_no"];
	$db = new DB();

	$sql = "UPDATE electronic_bill SET 
			meter_no = '".$_POST["meter_no"]."' ,
			previous_meter_no = '".$_POST["previous_meter_no"]."' ,
			fine_pay = '".$_POST["fine_pay"]."' ,
			addition_pay = '".$_POST["addition_pay"]."' ,
			maintence_pay = '".$_POST["maintence_pay"]."',
			vat = '".$_POST["vat"]."' ,
			amount = '".$_POST["amount"]."' ,
			period = '".$_POST["period"]."' ,
			pr_no = '".$_POST["pr_no"]."' ,
			document = '".$_POST["document"]."' ,
			remark = '".$_POST["remark"]."' 
                        WHERE electronic_bill_no = '".$_POST["bill_no"]."' AND month_no ='".$_POST["month_no"]."' AND year = '".$_POST["year"]."'";

	$query = $db->query($sql);
	$query = $db->execute();
        
        header("Location: index.php?year=$year&month_start=$month");
?>
