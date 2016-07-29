<?php
    include ('./classes/connection_mysqli.php');
    $location_district = $_POST["location_district"];
    $sql = "INSERT INTO project (project_id, m, ro, phase, lot, project_name, location_code, address, location_district, contact, tel) "
            . "VALUES ('".$_POST["project_id"]."', '".$_POST["m"]."', '".$_POST["ro"]."', '".$_POST["phase"]."', "
            . "'".$_POST["lot"]."','".$_POST["project_name"]."' , '".$_POST["location_code"]."', '".$_POST["address"]."', '".$_POST["location_district"]."', "
            . "'".$_POST["contact"]."', '".$_POST["tel"]."')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record successfully <br>".$sql;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    header("Location: manage_project.php?location_district=$location_district");
?>