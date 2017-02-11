<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>ECB Rates Server Side</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        $ecbUrl = 'http://www.ecb.europa.eu/stats/eurofxref/eurofxref-daily.xml';
        $xml = simplexml_load_file($ecbUrl) or die("Error: Cannot create object");
        $date = $xml->Cube->Cube->attributes()[0];
        ?>

        <div class="row">
            <div class="col-md-3 col-md-offset-1">
                <h2>Курсы на <?= $date; ?></h2>

                <table class="table table-striped">
                    <tr><td>Валюта</td><td>Курс</td></tr>
                    <?php
                    foreach ($xml->Cube->Cube->Cube as $pair) :
                        $attr = $pair->attributes();
                        ?>
                        <tr><td><?= $attr[0]; ?></td><td><?= $attr[1]; ?></td></tr>
                    <?php endforeach; ?>
                </table>
            </div>

            <div class="col-md-3 col-md-offset-1">
                <h2>Кроссвалютный калькулятор</h2>
                <form>
                    <div class="form-group">
                        <label>У меня есть </label>
                        <input type="text" class="form-control" id="haveCurrencyAmount">
                    </div>
                    <select class="form-control" id="needCurrencyName">
                        <option value="EUR">EUR</option>
                        <?php
                        foreach ($xml->Cube->Cube->Cube as $pair) :
                            $attr = $pair->attributes();
                            ?>
                            <option value="<?= $attr[0]; ?>"><?= $attr[0]; ?></option>  
                        <?php endforeach; ?>
                    </select>
                    <div class="form-group">
                        <label>Хочу получить</label>
                        <select class="form-control" id="needCurrencyName">
                            <option value="EUR">EUR</option>
                            <?php
                            foreach ($xml->Cube->Cube->Cube as $pair) :
                                $attr = $pair->attributes();
                                ?>
                                <option value="<?= $attr[0]; ?>"><?= $attr[0]; ?></option>  
                            <?php endforeach; ?>  
                        </select>
                    </div>

                    <div class="form-group">
                        <button type="button" class="btn btn-success">Done</button>
                    </div>
                    <div class="form-group">
                        <label>Вы получите:</label>
                        <input type="text" class="form-control" id="needCurrencyAmount" readonly>
                    </div>
                </form>
            </div>
        </div>  
    </body>
</html>
