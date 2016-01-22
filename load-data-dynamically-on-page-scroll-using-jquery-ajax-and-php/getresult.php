<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$perPage = 25;

$sql = "SELECT topic_id,category FROM topic ORDER BY views DESC ";
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$query =  $sql . " limit " . $start . "," . $perPage; 
$faq = $db_handle->runQuery($query);

if(empty($_GET["rowcount"])) {
$_GET["rowcount"] = $db_handle->numRows($sql);
}
$pages  = ceil($_GET["rowcount"]/$perPage);
$output = '';
if(!empty($faq)) {
$output .= '<input type="hidden" class="pagenum" value="' . $page . '" /><input type="hidden" class="total-page" value="' . $pages . '" />';
foreach($faq as $k=>$v) {
 $output .=  '<div class="question">' . $faq[$k]["question"] . '</div>';
 $output .= '<div class="answer">' . $faq[$k]["answer"] . '</div>';
}
}
print $output;
?>
