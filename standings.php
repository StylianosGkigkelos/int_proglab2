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
    <title>Standings</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>





<div class="container">
    <?php
    $races = $database->getRacesByYear(2019);
    $i = 1;

    echo '<div class="dropdown show " >';
    echo    '<a class="btn btn-secondary dropdown-toggle justify-content-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
    echo        'Choose standings';
    echo    '</a>';
    echo    '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">';
    echo        '<a id="'.$i.'" class="dropdown-item" href="?id='.$i.'">Upcoming Races</a>';
    $i++;
    echo        '<a class="dropdown-item" id="'.$i.'" href="?id='.$i.'">Constructor\'s Championship</a>';
    $i++;
    foreach ($races as $race) {

        echo        '<a id="'.$i.'" class="dropdown-item" href="?id='.$i.'">';
        echo            $race['name'].' '.$race['year'];
        echo        '</a>';
        $i++;
    }

    echo    '</div>';
    echo '</div>';


    if(isset($_GET['id'])){
        if($_GET['id'] == 1){
            $upcoming = $database->getUpcomingRaces();
            if (isset($upcoming)){
                echo '<div id="upcoming" class="container">';
                echo    '<h2 class="text-center">' . "Upcoming races" . "<br></h2>";
                // Standing for specific race
                echo    '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
                echo        '<thead class="thead-dark">';
                echo            '<tr>';
                echo                '<th scope="col">' . 'Name' . '</th>';
                echo                '<th scope="col">' . 'Year' . '</th>';
                echo            '</tr>';
                echo        '</thead>';
                echo    '<tbody>';
                foreach ($upcoming as $urace) {
                    echo '<tr>';
                    echo    '<td>'.$urace['name'].'</td>';
                    echo    '<td>'.$urace['year'].'</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
            }
            echo '</div>';
        }

        else if($_GET['id'] == 2){
            $champ = calculateChampionship(2019);
            $column = array_column($champ,1);
            array_multisort($column, SORT_DESC, $champ);
            echo '<div id="constructorCh" class="container">';
            echo    '<h2 class="text-center">' . "Constructor's Championship" . "<br></h2>";
            // Standing for specific race
            echo    '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
            echo        '<thead class="thead-dark">';
            echo            '<tr>';
            echo                '<th scope="col">' . 'Position' . '</th>';
            echo                '<th scope="col">' . 'Constructor' . '</th>';
            echo                '<th scope="col">' . 'Points' . '</th>';
            echo            '</tr>';
            echo        '</thead>';
            echo    '<tbody>';
            for ($j = 0; $j < count($champ); $j++) {
                echo '<tr>';
                echo    '<th scope="row">'.($j+1).".".'</th>';
                echo    '<td>'.$champ[$j][0].'</td>';
                echo    '<td>'.$champ[$j][1].'</td>';
                echo '</tr>';
            }

                echo '</tbody>';
                echo '</table>';
            echo '</div>';
        }

        else if($_GET['id'] <= $i ) {
            $race = $database->getRaceFromID($_GET['id'] - 2);

            echo '<h2 class="text-center">'.$race['name']. "<br></h2>";
            // Standing for specific race
            echo '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
            echo    '<thead class="thead-dark">';
            echo        '<tr>';
            echo            '<th scope="col">'.'Position'.'</th>';
            echo            '<th scope="col">'.'Driver'.'</th>';
            echo            '<th scope="col">'.'Nationality'.'</th>';
            echo            '<th scope="col">'.'Constructor'.'</th>';
            echo            '<th scope="col">'.'Points'.'</th>';
            echo        '</tr>';
            echo    '</thead>';
            echo    '<tbody>';

            $standings = $database->getStandingsFromRace($race['id']);
            if (isset($standings)) {
                foreach ($standings as $standing){
                    $driver = $database->getDriverById($standing['driverid']);

                    echo '<tr>';
                    echo    '<th scope="row">'.$standing['pos'].'</th>';
                    echo    '<td>'.$driver['name'].'</td>';
                    echo    '<td>'.$driver['nationality'].'</td>';
                    $constructor = $database->getConstructor($driver['constrID']);
                    echo    '<td>'.$constructor['name'].'</td>';
                    echo    '<td>'.getPoints($standing['pos']).'</td>';
                    echo '</tr>';
                }
            }
            echo    '</tbody>';
            echo '</table>';
        }

    }

//    foreach ($races as $race) {
//        echo '<h2 class="text-center">'.$race['name']. "<br></h2>";
//        // Standing for specific race
//        echo '<table class="table table-striped table-dark table-sm w-50 justify-content-center">';
//        echo    '<thead class="thead-dark">';
//        echo        '<tr>';
//        echo            '<th scope="col">'.'Position'.'</th>';
//        echo            '<th scope="col">'.'Driver'.'</th>';
//        echo            '<th scope="col">'.'Nationality'.'</th>';
//        echo            '<th scope="col">'.'Constructor'.'</th>';
//        echo            '<th scope="col">'.'Points'.'</th>';
//        echo        '</tr>';
//        echo    '</thead>';
//        echo    '<tbody>';
//
//        $standings = $database->getStandingsFromRace($race['id']);
//        if (isset($standings)) {
//            foreach ($standings as $standing){
//                $driver = $database->getDriverById($standing['driverid']);
//
//                echo '<tr>';
//                echo    '<th scope="row">'.$standing['pos'].'</th>';
//                echo    '<td>'.$driver['name'].'</td>';
//                echo    '<td>'.$driver['nationality'].'</td>';
//                $constructor = $database->getConstructor($driver['constrID']);
//                echo    '<td>'.$constructor['name'].'</td>';
//                echo    '<td>'.getPoints($standing['pos']).'</td>';
//                echo '</tr>';
//            }
//        }
//        echo    '</tbody>';
//        echo '</table>';
//
//    }



    ?>

</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>

<?php include 'footer.php'; ?>