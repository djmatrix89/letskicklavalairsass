<?php
function get_sql_type($type)
{
if($type == "mysqli"):
include("classes/class.mysqli.php");
else:
include("classes/class.mysql.php");
endif;
}
?>