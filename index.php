<?php
$file = fopen('template.tpl', 'r');
$file = file('template.tpl');
if (isset($_POST['change_btn'])) {
    $USERNAME = $_POST['name'];
    $NUMBER = $_POST['number'];
    $MONTHNUM = $_POST['month'];
    if (empty($USERNAME)) {
        echo '<script>alert("Please, enter NAME!!!");</script>';
    }
    if (empty($NUMBER)) {
        echo '<script>alert("Please, enter NUMBER!!!");</script>';
    }
    if (empty($MONTHNUM)) {
        echo '<script>alert("Please, enter MONTH!!!");</script>';
    } else {
        echo "<link rel='stylesheet' href='style.css'>";
        $EXECDATE = date('d.m.Y');
        $ENDDATE = date_create();
        date_modify($ENDDATE, $MONTHNUM . "month");
        $ENDDATE = date_format($ENDDATE, "d.m.Y");
        $text = "";
        foreach ($file as $value) {
            $value = str_replace("%USERNAME%", "<span>" . $USERNAME . "</span>", $value);
            $value = str_replace("%NUMBER%", "<span>" . $NUMBER . "</span>", $value);
            $value = str_replace("%EXECDATE%", "<span>" . $EXECDATE . "</span>", $value);
            $value = str_replace("%MONTHNUM%", "<span>" . $MONTHNUM . "</span>", $value);
            $value = str_replace("%ENDDATE%", "<span>" . $ENDDATE . "</span>", $value);
            echo $text = $value . "<br>";
        }
    }
} elseif (isset($argv)) {
    if (!empty($argv[1]) && !empty($argv[2]) && !empty($argv[3])) {
        $USERNAME = $argv[1];
        $NUMBER = $argv[2];
        $MONTHNUM = $argv[3];
        $ENDDATE = date('d.m.Y H:i');
        $ENDDATE = date_create();
        date_modify($ENDDATE, $MONTHNUM . "month");
        $ENDDATE = date_format($ENDDATE, "d.m.Y");
        $text = "";
        foreach ($file as $value) {
            $value = str_replace("%USERNAME%", $USERNAME, $value);
            $value = str_replace("%NUMBER%", $NUMBER, $value);
            $value = str_replace("%MONTHNUM%", $MONTHNUM, $value);
            $value = str_replace("%EXECDATE%", $ENDDATE, $value);
            $value = str_replace("%ENDDATE%", $ENDDATE, $value);
            echo $text = $value;
        }
    } else {
        echo $text = "Please, fill all fields!\n";
    }
} else {
    require_once('form.php');
}