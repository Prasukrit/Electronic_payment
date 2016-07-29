<style>
    .frmSearch {margin: 2px 0px;}
      #project-list{float:left;list-style:none;margin:0;padding:0;width:400px;}
      #project-list li{padding: 10px; background:#FAFAFA;border-bottom:#F0F0F0 1px solid;}
      #project-list li:hover{background:#F0F0F0;}
      #search-box{padding: 10px;border: #F0F0F0 1px solid;}

</style>
<?php
include ('./classes/connection_mysqli.php');

if (!empty($_POST["keyword"])) {
    $sql_project = "SELECT DISTINCT p.project_name as project_name, p.project_id as project_id FROM project p JOIN electronic_bill e ON e.project_id = p.project_id WHERE e.meter_no != '0' AND project_name like '" . $_POST["keyword"] . "%'  ORDER BY project_name LIMIT 0,7";
    $query_project = mysqli_query($conn,$sql_project);
    if (!empty($query_project)) {
        ?>
        <ul id="project-list">
            <?php
            while ($result_project = mysqli_fetch_array($query_project, MYSQLI_ASSOC)) {
                ?>
                <li onClick="selectProject('<?php echo $result_project["project_name"]; ?>');"><?php echo $result_project["project_name"]; ?></li>
                
            <?php } ?>
        </ul>
    <?php }
}
?>