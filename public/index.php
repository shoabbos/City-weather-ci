<?php
session_start();
ini_set('display_errors', true);
error_reporting(E_ALL);

require_once "../autoload.php";

$main = new \App\Main();
$main->run();
$presenter = $main->getPresenter();
?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-5 mx-auto">
                <form action="">
                    <div class="form-row">
                        <div class="col-auto">
                            <input type="text" name="city" class="form-control" placeholder="Напишите город">
                        </div>
                        <div class="col-auto">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-5 mx-auto">
                <div class="show-block">
                    <? if ($presenter->isCityCorrect()): ?>
                        <h2 id="<?= $presenter->cityId ?>">Погода в : <?= $presenter->city; ?> </h2>
                        <div class="time">
                            <div><?= date("l g:i a"); ?></div>
                            <div><?= date("jS F, Y"); ?></div>

                        </div>
                        <div class="weather-forecast">
                            <span><?= ucwords($presenter->description); ?></span>
                            <img src="http://openweathermap.org/img/w/<?= $presenter->icon ?>.png"
                                    class="weather-icon"/>
                            <span class="current-temp">Current: <?= $presenter->temp ?>°C</span>
                        </div>
                        <div class="time">
                            <div>Humidity: <?= $presenter->humidity ?> %</div>
                            <div>Wind: <?= $presenter->windSpeed ?> km/h</div>
                            <div>
                                Direction
                                <span class="wind-direction" data-degree="<?= $presenter->windDirection?>">&#8593;</span>
                            </div>
                        </div>
                    <? else: ?>
                        <h2>Узнайте о погоде своем городе</h2>
                    <? endif ?>
                </div>
            </div>
        </div>

       <div class="col-sm-12 save-block">
            <div class="col-sm-5 mx-auto">
                <form action="">
                    <div class="form-row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary" name="save" value="json">Сохранить в Json</button>
                        </div>
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary" name="save" value="xml">Сохранить в XML</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/custom.css">
<script>
    let wind = document.querySelector('.wind-direction');
    wind.style.transform = "rotate(" + wind.dataset.degree + "deg)";
</script>