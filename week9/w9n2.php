<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Shopping List</title>
</head>
<body>
<h1>Jacob's Shopping List</h1>
<form name="sourceForm" method="post" action="w9n2.php">
<p>Enter items to remember in the following format:<br>
<textarea name="source" rows="10" cols="40">
<?php
if(!empty($_POST['source'])) {
    $source = $_POST['source'];
    echo "$source";
}
else {
    defaultSource();
}
?>
</textarea>
</p>
<input type="submit" value="Enter Items">
</form>
<?php
$arr = explode("\n", $source);
$listing = array();
echo "<p>";
for ($i=0; $i<count($arr); $i++) {
    preg_match('/(\d+)\s(\w+)/', $arr[$i], $matches);
    $listing[] = sprintf("%3s %-10s %s\n",
             $matches[1], $matches[2], $matches[3]);
}
echo "</p>";
echo "<p>List</p>";
echo "<pre>";
foreach ($listing as $line) {
    echo "$line";
}
echo "</pre>";
?>
</body>
</html>
<?php
function defaultSource() {
    echo "12 Eggs\n";
    echo "3 Spaghetti\n";
    echo "2 Flour\n";
    echo "1 Coffee";
}
?>

