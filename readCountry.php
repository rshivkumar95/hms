<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["keyword"])) {
$query ="SELECT * FROM customers WHERE cname like '" . $_POST["keyword"] . "%' ORDER BY cname LIMIT 0,6";
$result = $db_handle->runQuery($query);
if(!empty($result)) {
?>
<ul id="country-list">
<?php
foreach($result as $country) {
?>
<li onClick="selectCountry('<?php echo $country["cname"]; ?>');"><?php echo $country["cname"]; ?></li>
<?php } ?>
</ul>
<?php } } ?>