<DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Jacob's Assembler</title>
</head>
<body>
<h1>Jacob's MUCPU 2017 PHP Assembler</h1>
<form name="sourceForm" method="post" action="w9asm.php">
<p>Enter source code here:<br>
<textarea name="source" rows="10" cols="40"><?php
if (!empty($_POST['source'])) {
    $source = $_POST['source'];
    echo "$source";
} else {
    defaultSource();
}
?></textarea>
</p>
<input type="submit" value="Run Assembler">
</form>
<?php
$arr = explode("\n", $source);
$listing = array();
$machineCode = array();
echo "<p>";
for ($i = 0; $i < count($arr); $i++) {
    echo "<br>$i: $arr[$i]<br>";
    preg_match('/((\w+):)?\s*(\w+)\s+(\w+)/', $arr[$i], $matches);
    print_r($matches);
    if (!empty($matches[2])) {
        echo "New label found: $matches[2]";
    }
    $listing[] = sprintf("%'.02X %3s %-10s %s\n", $i, $matches[3], $matches[4], $matches[0]);
    $machineCode[] = $matches[3];
    $machineCode[] = $matches[4];
}
echo "</p>";
echo "<h3>Listing</h3>";
echo "<pre>";
foreach ($listing as $line) {
    echo "$line";
}
echo "</pre>";
echo "<pre>";
foreach ($machineCode as $opcode) {
    echo "$opcode\n";
}
echo "</pre>";
?>
</body>
</html>

<?php
function defaultSource() {
    echo "LOOP1: LOD NUM1\n";
    echo "LOOP2: ADD NUM2\n";
    echo "       OUT 01\n";
    echo "       JNZ LOOP2\n";
    echo "       LOD NUM3\n";
    echo "       OUT 01\n";
    echo "       JMP LOOP1\n";
    echo "END:   HLT 80\n";
    echo "NUM1:  DB 0A\n";
    echo "NUM2:  DB FF\n";
    echo "NUM3:  DB 21\n";
    echo "NUM4:  DB 21\n";
    echo "NUM5:  DB 21\n";
    echo "NUM6:  DB 21\n";
    echo "NUM7:  DB 21\n";
    echo "NUM8:  DB 21\n";
    echo "NUM9:  DB 21\n";
}

