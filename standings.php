<!DOCTYPE html>

<?php
session_start();
include 'database.php';
$database = new Database();

include 'header.php';
// If an error is executed we suppress every warning/error so the user doesn't know of backend info
//error_reporting(0);
// This function works only for the current system of points
// Legacy systems must have another function to get the result
// Also this function does not take into consideration fastest lap points
function getPoints($position)
{
    if ($position == 1) {
        return 25;
    } else if ($position == 2) {
        return 18;
    } else if ($position == 3) {
        return 15;
    } else if ($position == 4) {
        return 12;
    } else if ($position == 5) {
        return 10;
    } else if ($position == 6) {
        return 8;
    } else if ($position == 7) {
        return 6;
    } else if ($position == 8) {
        return 4;
    } else if ($position == 9) {
        return 2;
    } else if ($position == 10) {
        return 1;
    }
    return 0;
}



function calculateChampionship($year)
{
    $database = new Database();
    $constructors = [];
    $races = $database->getRacesByYear($year);

    foreach ($races as $race) {
        $standings = $database->getStandingsFromRace($race['id']);
        foreach ($standings as $standing) {
            $driver = $database->getDriverById($standing['driverid']);
            $constructor = $database->getConstructor($driver['constrID']);
            $index = -1;
            for ($i = 0; $i < count($constructors); $i++) {
                if ($constructors[$i][0] == $constructor['name']) {
                    $index = $i;
                    break;
                }
            }
            if ($index == -1) {
                $constructors[] = array($constructor['name'], getPoints($standing['pos']));
            } else {
                $constructors[$index][1] += getPoints($standing['pos']);
            }

        }
    }
    return $constructors;
}

?>


<head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">-->
<!--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
<!--    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>-->
<!--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>-->

<!--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="styles.css">
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
<!--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>-->

</head>





<container class="container">
    <?php

    $races = $database->getRacesByYear(2019);


    $i = 0;

    echo '<div class="dropdown show " >';
    echo    '<a class="btn btn-secondary dropdown-toggle justify-content-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    echo        'Choose standings';
    echo    '</a>';
    echo    '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
    echo        '<a id="'.$i.'" class="dropdown-item" href="#">Driver\'s Championship</a>';
    $i++;
    echo        '<a class="dropdown-item" id="'.$i.'" href="#">Constructor\'s Championship</a>';
    $i++;
    foreach ($races as $race) {

        echo        '<a id="'.$i.'" class="dropdown-item" href="#">';
        echo            $race['name'].' '.$race['year'];
        echo        '</a>';
        $i++;
    }

    echo    '</div>';
    echo '</div>';









//    $champ = calculateChampionship(2019);
//    $column = array_column($champ,1);
//    array_multisort($column, SORT_DESC, $champ);
//
//    echo '<h2 class="text-center">' . "Constructor's Championship" . "<br></h2>";
//    // Standing for specific race
//    echo '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
//    echo    '<thead class="thead-dark">';
//    echo        '<tr>';
//    echo            '<th scope="col">' . 'Position' . '</th>';
//    echo            '<th scope="col">' . 'Constructor' . '</th>';
//    echo            '<th scope="col">' . 'Points' . '</th>';
//    echo        '</tr>';
//    echo    '</thead>';
//    echo '<tbody>';
//    for ($i = 0; $i < count($champ); $i++) {
//                    echo '<tr>';
//                    echo    '<th scope="row">'.($i+1).".".'</th>';
//                    echo    '<td>'.$champ[$i][0].'</td>';
//                    echo    '<td>'.$champ[$i][1].'</td>';
//                    echo '</tr>';
//    }
//
//    echo '</tbody>';
//    echo '</table>';


    //foreach ($races as $race) {
    //    echo '<h2 class="text-center">'.$race['name']. "<br></h2>";
    //    // Standing for specific race
    //    echo '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
    //    echo    '<thead class="thead-dark">';
    //    echo        '<tr>';
    //    echo            '<th scope="col">'.'Position'.'</th>';
    //    echo            '<th scope="col">'.'Driver'.'</th>';
    //    echo            '<th scope="col">'.'Nationality'.'</th>';
    //    echo            '<th scope="col">'.'Constructor'.'</th>';
    //    echo            '<th scope="col">'.'Points'.'</th>';
    //    echo        '</tr>';
    //    echo    '</thead>';
    //    echo    '<tbody>';
    //
    //    $standings = $database->getStandingsFromRace($race['id']);
    //    if (isset($standings)) {
    //        foreach ($standings as $standing){
    //            $driver = $database->getDriverById($standing['driverid']);
    //
    //            echo '<tr>';
    //            echo    '<th scope="row">'.$standing['pos'].'</th>';
    //            echo    '<td>'.$driver['name'].'</td>';
    //            echo    '<td>'.$driver['nationality'].'</td>';
    //            $constructor = $database->getConstructor($driver['constrID']);
    //            echo    '<td>'.$constructor['name'].'</td>';
    //            echo    '<td>'.getPoints($standing['pos']).'</td>';
    //            echo '</tr>';
    //        }
    //    }
    //    echo    '</tbody>';
    //    echo '</table>';
    //
    //}


    ?>

</container>

<!--        //FIXME:add listeners-->
<script>
    $(document).ready(function () {
        <?php
//            for ($j=0; $j<$i; $j++){
//                echo 'hi';
//                echo '$(\'#'.$j.'\').click(function() {console.log('.$j.')})';
//            }
//            echo "$('#btn1').click(function() {      ";
//            echo "  // do stuff with button 1      ";
//            echo "   console.log('button 1 clicked');";
//            echo "});                                ";
//            echo "$('#btn2').click(function() {      ";
//            echo "        ";
//            echo "   console.log('button 2 clicked');";
//            echo "})";
//        for ($j=0; $j<$i; $j++) {
//            echo "$('#$j').click(function() {";
//            echo
//            echo " console.log('.$j.')";
//            echo "});";
//        }
        ?>

        // $('#getdata').click(function(){
        //
        //     $.ajax({
        //         url: 'getdata.php',
        //         type:'POST',
        //         dataType: 'json',
        //         success: function(output_string){
        //             $('#result_table').append(output_string);
        //         } // End of success function of ajax form
        //     }); // End of ajax call
        //
        // });
        //
        //
        // $('#1').click(function () {
        //     $.ajax({
        //
        //     })
        // })



    });</script>




<?php include 'footer.php'; ?>