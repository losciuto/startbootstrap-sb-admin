<?php include 'sec.php'; ?>
<?php
$dataarea = "";
if(isset($_GET['area'])) $dataarea = $_GET['area'];

include('include/functions.php');

get_header();
get_navbar();
get_sidebar();
get_breadcrumb($dataarea);
get_chartarea();
get_dataarea($dataarea);
get_footer();

?>
