<?php
    include ('./classes/connection_mysqli.php');
    $location_district = $_POST["location_district"];
    $sql = "UPDATE project SET project_name = '".$_POST["project_name"]."', m = '".$_POST["m"]."', ro = '".$_POST["ro"]."', "
            . " phase = '".$_POST["phase"]."', lot = '".$_POST["lot"]."', "
            . "location_code = '".$_POST["location_code"]."', address = '".$_POST["address"]."', "
            . "contact = '".$_POST["contact"]."', tel = '".$_POST["tel"]."' , location_district = '".$_POST["location_district"]."' "
            . "WHERE project_id = '".$_POST["project_id"]."' ";
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully <br>".$sql;
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
    header("Location: manage_project.php?location_district=$location_district");
?>