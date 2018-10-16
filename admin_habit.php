<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Habit tracker</title>
    <script src="scr/vendor/jquery-3.3.1.min.js"></script>
     <script src="scr/vendor/alertify.min.js"></script>

    <script src="scr/js/script.js"></script>
    <link rel="stylesheet" href="scr/css/style.css">
     <link rel="stylesheet" href="scr/vendor/alertify.core.css" />
    <link rel="stylesheet" href="scr/vendor/alertify.default.css" id="toggleCSS" />
    <link rel="stylesheet" href="scr/css/pure-min.css">
</head>

<body>
    <div class="container">
        <header class="header">
            <h3>Habit Tracker by Jarek &AMP 2018</h3>
        </header>
        <nav class="nav">
            <ul class="pure-menu-list">
                <li> <button id="show-data" class="pure-button pure-button-primary">Ostanie 14 dni</button></li>
                <li><button id="last_min_max_button" class="pure-button pure-button-primary">Roczne Min Max</button></li>
                <!--<li class="pure-button pure-button-warning"></li>-->
                <li></li>
                <li></li>
                </ul>
        </nav>
        <div id="data" class="content0">

        </div>
        <div id="last_30_days" class="content1">
            <h4>Ostatnie 30 dni</h4>
            <!--  <div id="l30data">

        </div>-->
        </div>
        <div id="last_min_max" class="content2">
           
        </div>
        <div id="last_min_max_year" class="content3">
            <h4>Min Max - ostatni rok</h4>
        </div>

        <div id="add_form" class="form">
            <form method="post" action="add1.php" id="form" class="1pure-form 1pure-form-stacked">
                <fieldset>
                    <!-- <legend></legend>-->
                    <label for="data">data</label>
                    <input type="date" id="learn_date" name="data">
                    <span class="pure-form-message"></span>
                    <label for="hour">godziny</label>
                    <input type="number" min="0" max="24" id="hours" value="0" name="hour">
                    <label for="minutes">minuty</label>
                    <input type="number" min="0" max="59" id="minutes" value="0" name="minutes">
                    <span class="pure-form-message"></span>
                    <input id="write" type="submit" value="zapisz" class="pure-button pure-button-primary">
                    <input id="cancel-write" type="button" value="anuluj" class="pure-button pure-button-primary">
                </fieldset>
            </form>


        </div>
        <div class="table" id="table"></div>
    </div>
</body>

</html>
