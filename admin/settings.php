<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script src="https://cdn.socket.io/4.5.3/socket.io.min.js" integrity="sha384-WPFUvHkB1aHA5TDSZi6xtDgkF0wXJcIIxXhC6h8OT8EH3fC5PWro5pWJ1THjcfEi" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>

</head>

<body>
    <main class="container">
        <div class="mt-5 row">
            <div class="col text-center">
                <h1 class="text-center text-light"><?= ($_SERVER['SERVER_NAME'] == 'goemms.com') ? 'PRODUCCION' : 'Ambiente de TEST' ?></h1>
            </div>
        </div>
        <div class="mt-5 row">
            <div class="col-3">
                <a class=" btn btn-primary mt-2" href="/admin/index.php?token=<?= $_GET['token'] ?>"> Menu Principal</a>
            </div>

            <div class="col text-center">
                <div id="refresh-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> refreshed browser
                </div>
                <a id="refreshBrowsers" class=" btn btn-warning mt-2 btn-lg" href="#"> Refresh All Browsers</a>
            </div>
            <div class="col-3">

            </div>

        </div>
        <div class="mt-5 row uno">
            <div class="col">
                <div id="current-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> Fase Updated
                </div>
                <div class="mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Current Phase</h3>
                        </div>
                        <div class="card-body">
                            <form id="current_phase" method="post">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="phase" id="pre">
                                    <label class="form-check-label" for="pre">
                                        PRE
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="phase" id="during">
                                    <label class="form-check-label" for="during">
                                        DURING
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="phase" id="post">
                                    <label class="form-check-label" for="post">
                                        POST
                                    </label>
                                </div>
                                <div class="form-group mt-5">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div id="simulator-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> Simulator Updated .
                </div>
                <div class="mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Simulador Phase</h3>
                        </div>
                        <div class="card-body">
                            <form id="simulator" method="post">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="simulatorEnabled" name="enabled">
                                    <label class="form-check-label" for="simulatorEnabled">
                                        ENABLED </label>

                                    <label><small class="text-muted">(Only VPN users will see the simulated phase.)</small></label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="simulator_phase" id="simulator_pre">
                                    <label class="form-check-label" for="simulator_pre">
                                        PRE
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="simulator_phase" id="simulator_during">
                                    <label class="form-check-label" for="simulator_during">
                                        DURING
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="simulator_phase" id="simulator_post">
                                    <label class="form-check-label" for="simulator_post">
                                        POST
                                    </label>
                                </div>
                                <div class="form-group mt-5">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col">
                <div id="transmission-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> Transmission Updated .
                </div>
                <div class="mx-auto">
                    <div class="card">
                        <div class="card-header">
                            <h3>Transmission</h3>
                        </div>
                        <div class="card-body">
                            <form id="transmission" method="post">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="transmissionProblems" name="problems">
                                    <label class="form-check-label" for="transmissionProblems">
                                        Technical Problems </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="sourceTransmission" id="youtube" checked>
                                    <label class="form-check-label" for="youtube">
                                        Youtube
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="sourceTransmission" id="twitch">
                                    <label class="form-check-label" for="twitch">
                                        Twitch
                                    </label>
                                </div>

                                <div class="form-group mt-5">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="mt-5 row dos">
            <div class="col">
                <div id="current-days-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> Current Days Updated .
                </div>
                <div id="cardCurrentDay" class="mx-auto d-none">
                    <div class="card">
                        <div class="card-header">
                            <h3>Current Days</h3>
                            <label>(Phase During)</label>
                        </div>
                        <div class="card-body">
                            <form id="duringCurrentDays">
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringCurrentDay" id="day1">
                                    <label class="form-check-label" for="day1">
                                        Martes 8
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day1Row" class="d-none row stateLive mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1Radios" id="day1Live" value="2">
                                            <label class="form-check-label" for="day1Live">
                                                Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1Radios" id="day1Transition" value="1">
                                            <label class="form-check-label" for="day1Transition">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1Radios" id="day1NoLive" value="0">
                                            <label class="form-check-label" for="day1NoLive">
                                                No Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringCurrentDay" id="day2">
                                    <label class="form-check-label" for="day2">
                                        Miercoles 9
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day2Row" class="d-none row stateLive mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2Radios" id="day2Live" value="2">
                                            <label class="form-check-label" for="day2Live">
                                                Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2Radios" id="day2Transition" value="1">
                                            <label class="form-check-label" for="day2Transition">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2Radios" id="day2NoLive" value="0">
                                            <label class="form-check-label" for="day2NoLive">
                                                No Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringCurrentDay" id="day3">
                                    <label class="form-check-label" for="day3">
                                        Jueves 10
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day3Row" class="d-none row stateLive mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day3Radios" id="day3Live" value="2">
                                            <label class="form-check-label" for="day3Live">
                                                Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day3Radios" id="day3Transition" value="1">
                                            <label class="form-check-label" for="day3Transition">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col d-none">
                                            <input class="form-check-input" type="radio" name="day3Radios" id="day3NoLive" value="0">
                                            <label class="form-check-label" for="day3NoLive">
                                                No Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div id="simulator-days-alert-success" class="alert alert-success" role="alert">
                    <strong>Success!</strong> Simulator Days Updated .
                </div>
                <div id="cardSimulatorDay" class="mx-auto d-none">
                    <div class="card">
                        <div class="card-header">
                            <h3>Simulator Days</h3>
                            <label>(Phase During)</label>
                        </div>
                        <div class="card-body">
                            <form id="duringSimulatorDays">
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringSimulatorDay" id="day1Simulator">
                                    <label class="form-check-label" for="day1Simulator">
                                        Martes 8
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day1RowSimulator" class="d-none row stateLiveSimulator mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1RadiosSimulator" id="day1NoLiveSimulator" value="0">
                                            <label class="form-check-label" for="day1NoLiveSimulator">
                                                No Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1RadiosSimulator" id="day1TransitionSimulator" value="1">
                                            <label class="form-check-label" for="day1TransitionSimulator">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day1RadiosSimulator" id="day1LiveSimulator" value="2">
                                            <label class="form-check-label" for="day1LiveSimulator">
                                                Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringSimulatorDay" id="day2Simulator">
                                    <label class="form-check-label" for="day2Simulator">
                                        Miercoles 9
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day2RowSimulator" class="d-none row stateLiveSimulator mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2RadiosSimulator" id="day2LiveSimulator" value="2">
                                            <label class="form-check-label" for="day2LiveSimulator">
                                                Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2RadiosSimulator" id="day2TransitionSimulator" value="1">
                                            <label class="form-check-label" for="day2TransitionSimulator">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day2RadiosSimulator" id="day2NoLiveSimulator" value="0">
                                            <label class="form-check-label" for="day2NoLiveSimulator">
                                                No Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <input class="form-check-input" type="radio" name="duringSimulatorDay" id="day3Simulator">
                                    <label class="form-check-label" for="day3Simulator">
                                        Jueves 10
                                    </label>
                                </div>
                                <div class="form-check mb-2 mx-3">
                                    <div id="day3RowSimulator" class="d-none row stateLiveSimulator mx-5">
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day3RadiosSimulator" id="day3LiveSimulator" value="2">
                                            <label class="form-check-label" for="day3LiveSimulator">
                                                Live
                                            </label>
                                        </div>
                                        <div class="col">
                                            <input class="form-check-input" type="radio" name="day3RadiosSimulator" id="day3TransitionSimulator" value="1">
                                            <label class="form-check-label" for="day3TransitionSimulator">
                                                Transition
                                            </label>
                                        </div>
                                        <div class="col d-none">
                                            <input class="form-check-input" type="radio" name="day3RadiosSimulator" id="day3NoLiveSimulator" value="0">
                                            <label class="form-check-label" for="day3NoLiveSimulator">
                                                No Live
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-5">
                                    <button class="btn btn-primary btn-block" type="submit">Save</button>
                                </div>
                            </form>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>

</html>
