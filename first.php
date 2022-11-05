<?php
include("php/dbconnect.php");
include("php/db.php");
include("check_login.php");
global $siteName;
$siteName = " SYGES - CLINIC ";

setlocale(LC_TIME, "fr_FR");

?>


    <!DOCTYPE html>
    <html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title><?= $siteName ?></title>

    <!--All modukes'Links-->
    <?php
    include("php/mainlinks.php");
    ?>

    <!--Functions-->
    <?php
    //    Function for date delais
    function dateDifference($start_date, $end_date)
    {
        // calulating the difference in timestamps
        $diff = strtotime($start_date) - strtotime($end_date);

        $start_y = date("Y", strtotime($start_date));
        $start_m = date("m", strtotime($start_date));
        $start_d = date("d", strtotime($start_date));

        $end_y = date("Y", strtotime($end_date));
        $end_m = date("m", strtotime($end_date));
        $end_d = date("d", strtotime($end_date));

        if ($start_y == $end_y and $start_m == $end_m and $start_d > $end_d) {
            return -1;
        }
        if ($start_y == $end_y and $start_m > $end_m) {
            return -1;
        }
        if ($start_y > $end_y) {
            return -1;
        }

        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return ceil(abs($diff / 86400));
    }

    //    Function which converts date from English to French

    function dateToFrench($date, $format)
    {
        $english_days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
        $french_days = array('Lundi', 'Mardi', 'Mercredi', 'jeudi', 'Vendredi', 'Samedi', 'Dimanche');
        $english_months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
        $french_months = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre');
        return str_replace($english_months, $french_months, str_replace($english_days, $french_days, date($format, strtotime($date))));
    }

    //  Password generator
    function password_generate($chars)
    {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
    }


    ?>


</head>

<style>
    .accord {
        background-color: gray;
        color: white;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .activ, .accord:hover {
        background-color: blue;
    }

    .accord:after {
        content: '\002B';
        color: white;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .activ:after {
        content: "\2212";
    }

    .panelle {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }
</style>

<?php
include('php/main_top_navbar.php');
?>