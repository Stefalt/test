<?php
echo "Hello";

session_start();
$mysqli = new mysqli("localhost", "root", "root", "HistoryResults");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

if (isset($_POST['submit'])) {
    $query = "INSERT INTO list (number, number2, answer) VALUES ({$_SESSION["number"]}, {$_SESSION["number2"]},{$_POST['answer']})";
    $mysqli->query($query);
}
$_SESSION["number"] = rand(1, 9);
$_SESSION["number2"] = rand(1, 9);


?>
    <form action="check.answer.php" method="post">
        Cik bus <?php echo $_SESSION["number"]; ?>*<?php echo $_SESSION["number2"]; ?> =
        <input type="number" name="answer"/><br/>
        <input type="submit" name="submit" value="OK"/>
    </form>

<?php
//$result = mysqli_query($mysqli, "SELECT * FROM list");
$result = $mysqli->query("SELECT * FROM list");
//$array = mysqli_fetch_array($result);
echo "<table border=\"5\"  >";
echo "<tr><td>Number</td><td>Number2</td><td>Your answer</td></tr>";
while ($array = $result->fetch_array()) {
    $diff = abs(($array['number'] * $array['number2']) - $array['answer']);
    $sign = (($array['number'] * $array['number2']) == $array['answer']) ? "" : (($array['number'] * $array['number2']) > $array['answer'] ? "+" : "-");
    echo "<tr><td>" . $array['number'] . "*" . $array['number2'] . "=</td><td>" . $array['number'] * $array['number2'] . "</td><td >" . $array['answer'] . "        (" . $sign . $diff . ")" . "</td></tr>";
}
echo "</table>";





