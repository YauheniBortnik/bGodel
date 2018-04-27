
<?php

?>
<html>

<head>
    <link rel="stylesheet" href="style.css" type="text/css"/>

</head>

<body>
    <div id="orig_text_block">
        <?php
            echo "Original text:<br>";
            echo file_get_contents('template.tpl');
        ?>
    </div>

    <div id="form_block">
        <form  id="main_form" method="POST" action="index.php">
            <p>Name:</p> <input type="text" name="name" class="input"/><br><br>
            <p>Number:</p> <input type="number" name="number" class="input"/><br><br>
            <p>Month:</p> <input type="number" name="month" class="input"/><br><br>
            <input type="submit" value="Enter" name="change_btn" id="change_btn">
        </form>
    </div>

    <div id="res_text_block">
        <?php
            echo "Result text:<br>";
            include ('check.php');
        ?>
    </div>
</body>

</html>
