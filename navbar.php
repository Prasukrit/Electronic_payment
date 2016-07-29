<?php $page = basename($_SERVER['SCRIPT_NAME']); ?>
<nav class="navbar navbar-default ">
    <div class="container">
        <div class="nav-header">
            <a class="navbar-brand" href="index.php"><span style="color: orangered;">จัดการบิลค่าไฟ</span><b s> [RO10]</b></a>
        </div>
        <ul class="nav navbar-nav">
            <li <?php if ($page == 'index.php' || $page =='' ) { ?>class="active"<?php } ?>>
                <a href="index.php"><i class="glyphicon glyphicon-list-alt"></i>จัดการบิลค่าไฟ</a>
            </li>
            <li <?php if ($page == 'manage_project.php' ) { ?>class="active"<?php } ?>>
                <a href="manage_project.php"><i class="glyphicon glyphicon-tasks"></i>จัดการโครงการ</a>
            </li>

        </ul>
    </div>
</nav>