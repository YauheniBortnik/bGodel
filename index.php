<?php
$file = fopen('template.tpl', 'r');
$file = file('template.tpl');
if (isset($_POST['change_btn'])) {
    require_once ('form.php');
    $userName = $_POST['name'];
    $number = $_POST['number'];
    $monthNum = $_POST['month'];
    if (empty($userName)) {
        echo '<script>alert("Please, enter NAME!!!");</script>';
    } elseif (!preg_match('/^([a-zA-Z]{1,16})$/', $userName)) {
        echo '<script>alert("Please, enter NAME only with LETTERS!!!");</script>';
    }
    elseif (empty($number)) {
        echo '<script>alert("Please, enter NUMBER!!!");</script>';
    }
    elseif (empty($monthNum)) {
        echo '<script>alert("Please, enter MONTH!!!");</script>';
    } else {
        $execDate = date('d.m.Y');
        $endDate = date_create();
        date_modify($endDate, $monthNum . "month");
        $endDate = date_format($endDate, "d.m.Y");
        $text = "";
            foreach ($file as $value) {
                $value = str_replace("%USERNAME%", "<span>" . $userName . "</span>", $value);
                $value = str_replace("%NUMBER%", "<span>" . $number . "</span>", $value);
                $value = str_replace("%EXECDATE%", "<span>" . $execDate . "</span>", $value);
                $value = str_replace("%MONTHNUM%", "<span>" . $monthNum . "</span>", $value);
                $value = str_replace("%ENDDATE%", "<span>" . $endDate . "</span>", $value);
                echo $text = $value . "<br>";
            }
    }
} elseif (isset($argv)) {
    if (!empty($argv[1]) && preg_match('/^([a-zA-Z]{1,16})$/', $argv[1]) && !empty($argv[2]) && !empty($argv[3])) {
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