<?php

session_start();
////session_unset();
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

echo "Vesture:";

if (isset($_SESSION['test'])) {
    echo '<ul>';



    foreach ($_SESSION['test'] as $data) {
        if ($data['jusu'] < $data['atbilde']) {
            $atb1 = " tas ir neparezi, jabut lielak ";
        } elseif ($data['jusu'] > $data['atbilde']) {
            $atb1 = " tas ir neparezi , jabut mazak ";
        } else {
            $atb1 = " apsveicu tas ir pareizi";
        }


        echo '<li>' . $data['bija'] . ' = ' . $data['atbilde'] . ' Jusu atbilde ir = '. $data['jusu'] . $atb1 . '</li>';
    }
    echo '</ul>';
}


generateNumb();

function generateNumb()
{

    $number = rand(1, 9);
    $number2 = rand(1, 9);

    $_SESSION["numb"] = $number;
    $_SESSION["numb2"] = $number2;

} ?>

<form action="index.php" method="post">
    Cik bus <?php echo $_SESSION['numb'] ?>*<?php echo $_SESSION['numb2'] ?> =
    <input type="number" name="ok"/><br/>
    <input type="submit" name="submit" value="OK"/>
</form>
<hr>

