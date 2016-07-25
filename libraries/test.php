<?php
$mysqli = new mysqli("localhost", "root", "root", "HistoryResults");
if ($mysqli->connect_errno) {
    echo "Не удалось подключиться к MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//session_unset();
session_start();

//die;
//$_SESSION['test'] = [];die;

//array_push($_SESSION['test'], [
//    'number1' => rand(1, 9),
//    'number2' => rand(1, 9),
//    'answer' => rand(1, 9)
//]);
//
//if (isset($_SESSION['test'])) {
//    echo '<ul>';
//    foreach ($_SESSION['test'] as $data) {
//        echo '<li>' . $data['number1'] . ' + ' . $data['number2'] . '</li>';
//    }
//    echo '</ul>';
//}

//die;

//include __DIR__ . '/libraries/test.php';

session_start();


if (isset($_POST['submit'])) {
    answer();
}

function answer()
{
    $answ = $_POST['ok'];
    $_SESSION["answel"] = $answ;
    $numb3 = $_SESSION["numb"] * $_SESSION["numb2"];
    $_SESSION["numbul"] = $numb3;
//    if ($answ < $numb3) {
//        $atb = " neparezi, jabut lielak ";
//    } elseif ($answ > $numb3) {
//        $atb = " neparezi, jabut mazak ";
//    } else {
//        $atb = "ir pareiza";
//    }
//    $_SESSION["atb1"]=$atb;
}

if (!isset($_SESSION['test'])) {
    $_SESSION['test'] = [];
}


array_push($_SESSION['test'], [
    'bija' => $_SESSION["numb"] . '*' . $_SESSION["numb2"],
    'atbilde' => $_SESSION["numbul"],
    'jusu' => $_SESSION["answel"]
]);


if (isset($_SESSION['test'])) {
//    echo '<table border="1">
//   <caption>History</caption>
//   <tr>
//    <th>Example</th>
//    <th>Correct answer</th>
//    <th>Yourv answer</th>
//    <th> Comments</th>
//   </tr>';


    foreach ($_SESSION['test'] as $data) {
//        $atb1 = "q";
//        if ($data['jusu'] < $data['atbilde']) {
//            $atb1 = " Tas ir neparezi, jabut lielak ";
//        } elseif ($data['jusu'] > $data['atbilde']) {
//            $atb1 = " Tas ir neparezi , jabut mazak ";
//        } elseif ($data['jusu'] = $data['atbilde']) {
//            $atb1 = " Apsveicu tas ir pareizi";
//        } else {
//            $atb1 = "Atbilde nebija";
//        }
//        if (isset($_SESSION['test'])) {
            $query = "INSERT INTO list (example, correct_answer,your_answer) VALUES ({$data['bija']}, {$data['atbilde']}, {$data['jusu']})";
            $mysqli->query($query);
        };

//        echo
//            '<tr><td>' . $data['bija'] . '</td><td>' . $data['atbilde'] . '</td><td>' . $data['jusu'] . '</td><td>' . $atb1 . '</td></tr> ';
//    }
//    echo '</table>';
}


generateNumb();

function generateNumb()
{

    $number = rand(1, 9);
    $number2 = rand(1, 9);

    $_SESSION["numb"] = $number;
    $_SESSION["numb2"] = $number2;

} ?>

<form action="test.php" method="post">
    Cik bus <?php echo $_SESSION['numb'] ?>*<?php echo $_SESSION['numb2'] ?> =
    <input type="number" name="ok"/><br/>
    <input type="submit" name="submit" value="OK"/>
</form>
<hr>

