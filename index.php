<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ECB Rates Server Side fffff</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        hgrjewlek
        <?php
        echo "<br>";

        $ecbUrl = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($ecbUrl) or die("Error: Cannot create object");

        $date = $xml->Cube->Cube->attributes()[0];
        
        echo '<div class="row">';
        echo '<div class="col-md-3 col-md-offset-1">';
        echo "<h2>Курсы валют " . $date . "</h2>";

        echo '<table class="table table-striped">';
        echo "<tr><td>Валюта</td><td>Курс</td></tr>";
        foreach ($xml->Cube->Cube->Cube as $pair) {
            $attr = $pair->attributes();
            echo "<tr><td>" . $attr[0] . "</td><td>" . $attr[1] . "</td></tr>";
        }
        echo "</table>";
        echo '</div>';
        echo '</div>';
        ?>
    </body>
</html>
