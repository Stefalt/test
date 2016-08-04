<?php

include 'Database.php';
include 'NumberGenerator.php';

session_start();

$db = new Database();

if (isset($_POST['submit'])) {
    $db->insertResult($_SESSION['number'], $_SESSION["number2"], $_POST['answer']);
}

$numberGen = new NumberGenerator();
$numberGen->generate();
$_SESSION["number"] = $numberGen->number1;
$_SESSION["number2"] = $numberGen->number2;
?>
    <form action="index.php" method="post">
        Cik bus <?php echo $_SESSION["number"]; ?>*<?php echo $_SESSION["number2"]; ?> =
        <input type="number" name="answer"/><br/>
        <input type="submit" name="submit" value="OK"/>
    </form>
<?php
$results = $db->getResults();

echo "<table border=\"5\"  >";
echo "<tr><td>Number</td><td>Number2</td><td>Your answer</td></tr>";
while ($array = $results->fetch_array()) {
    $diff = abs(($array['number'] * $array['number2']) - $array['answer']);
    $sign = (($array['number'] * $array['number2']) == $array['answer']) ? "" : (($array['number'] * $array['number2']) > $array['answer'] ? "+" : "-");
    echo "<tr><td>" . $array['number'] . "*" . $array['number2'] . "=</td><td>" . $array['number'] * $array['number2'] . "</td><td >" . $array['answer'] . "        (" . $sign . $diff . ")" . "</td></tr>";
}
echo "</table>";
