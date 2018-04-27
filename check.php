<?php
    $USERNAME = $_POST['name'];
    $NUMBER = $_POST['number'];
    $MONTHNUM = $_POST['month'];

if(isset($_POST['change_btn'])) {
    if (empty($USERNAME)) {
        echo '<script>alert("Please, enter NAME!!!");</script>';
    }
    if (empty($NUMBER)) {
        echo '<script>alert("Please, enter NUMBER!!!");</script>';
    }
    if (empty($MONTHNUM)) {
        echo '<script>alert("Please, enter MONTH!!!");</script>';
    }
    else{

        $EXECDATE = date('d.m.Y');
        $ENDDATE = date_create();
        date_modify($ENDDATE, $MONTHNUM."month");
        $ENDDATE = date_format($ENDDATE, "d.m.Y");

        $file = file_get_contents('template.tpl');
        $file = str_replace("%USERNAME%", "<span>" . $USERNAME . "</span>", $file); echo "<br>";
        $file = str_replace("%NUMBER%", "<span>" . $NUMBER . "</span>", $file);
        $file = str_replace("%EXECDATE%", "<span>" . $EXECDATE . "</span>", $file);
        $file = str_replace("%MONTHNUM%", "<span>" . $MONTHNUM . "</span>", $file);
        $file = str_replace("%ENDDATE%", "<span>" .$ENDDATE . "</span>", $file);
        print_r($file);
    }
}