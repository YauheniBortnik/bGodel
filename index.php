<?php
$file = fopen('template.tpl', 'r');
$file = file('template.tpl');
if (isset($_POST['change_btn'])) {
    echo "<link rel='stylesheet' href='style.css'>";
    $userName = $_POST['name'];
    $number = $_POST['number'];
    $monthNum = $_POST['month'];
    if (empty($userName)) {
        require_once('form.php');
        echo '<script>alert("Please, enter NAME!!!");</script>';
    } elseif (preg_match('/^([0-9a-zA-Z-_.]{5,16})$/', $userName)) {
        require_once('form.php');
        echo '<script>alert("Please, enter NAME only with LETTERS!!!");</script>';
    }
    if (empty($number)) {
        echo '<script>alert("Please, enter NUMBER!!!");</script>';
        require_once('form.php');
    }
    if (empty($monthNum)) {
        echo '<script>alert("Please, enter MONTH!!!");</script>';
        require_once('form.php');
    } else {
        require_once('form.php');
        $execDate = date('d.m.Y');
        $endDate = date_create();
        date_modify($endDate, $monthNum . "month");
        $endDate = date_format($endDate, "d.m.Y");
        $text = "";
        ?>
        <div id="res_text_block">
            <?php
            foreach ($file as $value) {
                $value = str_replace("%USERNAME%", "<span>" . $userName . "</span>", $value);
                $value = str_replace("%NUMBER%", "<span>" . $number . "</span>", $value);
                $value = str_replace("%EXECDATE%", "<span>" . $execDate . "</span>", $value);
                $value = str_replace("%MONTHNUM%", "<span>" . $monthNum . "</span>", $value);
                $value = str_replace("%ENDDATE%", "<span>" . $endDate . "</span>", $value);
                echo $text = $value . "<br>";
            }
            ?>
        </div>
        <?php
    }
} elseif (isset($argv)) {
    if (!empty($argv[1]) && (preg_match('/^([0-9a-zA-Z-_.]{5,16})$/', $argv[1])) && !empty($argv[2]) && !empty($argv[3])) {
        $userName = $argv[1];
        $number = $argv[2];
        $monthNum = $argv[3];
        $execDate = date('d.m.Y H:i');
        $endDate = date_create();
        date_modify($endDate, $monthNum . "month");
        $endDate = date_format($endDate, "d.m.Y");
        $text = "";
        foreach ($file as $value) {
            $value = str_replace("%USERNAME%", $userName, $value);
            $value = str_replace("%NUMBER%", $number, $value);
            $value = str_replace("%MONTHNUM%", $monthNum, $value);
            $value = str_replace("%EXECDATE%", $execDate, $value);
            $value = str_replace("%ENDDATE%", $endDate, $value);
            echo $text = $value;
        }
    } else {
        echo $text = "Please, fill ALL fields or(and) fill firs arg in LETTERS!\n";
    }
} else {
    require_once('form.php');
}