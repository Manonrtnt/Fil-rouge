<!-- Header -->
<?php include('header.php'); ?>

<!-- Section -->
<main class="container rounded p-2 my-2 shadow-sm">
    <section class="row justify-content-around py-3">
        <div class="col-12 col-md-5">
            <div class="bg-white p-4 rounded-3 mb-3">
                <a href="monsteraDeliciosa.php">
                    <h2 class="pb-4 text-center">Monstera Deliciosa</h2>
                    <div 
                        class="transform-scale"
                        style="
                            background-image: url('../assets/monsteraDeliciosa.png'); 
                            background-position:center; 
                            background-size:contain;
                            background-repeat : no-repeat;
                            height: 150px;
                            ">
                    </div>
                </a>
            </div>
            <div class="bg-white p-4 rounded-3">
                <a href="charts.php">
                    <h2 class="pb-4 text-center">Charts</h2>
                    <div
                        class="transform-scale" 
                        style="
                            background-image: url('../assets/graphique.png'); 
                            background-position:center; 
                            background-size:contain;
                            background-repeat : no-repeat;
                            height: 150px;
                            ">
                    </div>
                </a>
            </div>
        </div>
        <div class="col-11 col-md-5 m-3 m-md-0 bg-white py-3 px-5 rounded-3">
            <h2 class="pb-3">Information</h2>
            <div class="list-group">
                <a href="temperature.php" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h3 class="mb-1 h5">Temperature <i class="fa-thin fa-temperature-high ms-2"></i></h3>
                        <small>°C</small>
                    </div>
                    <small class="text-muted">Live with DHT11 Sensor</small>
                </a>
                <a href="humidity.php" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h3 class="mb-1 h5">Humidity <i class="fa-thin fa-droplet-degree ms-2"></i></h3>
                        <small class="text-muted">%</small>
                    </div>
                    <small class="text-muted">Live with YL-19 Sensor</small>
                </a>
                <a href="luminosity.php" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h3 class="mb-1 h5">Luminosity<i class="fa-thin fa-lightbulb-on ms-2"></i></h3>
                        <small class="text-muted">Lux</small>
                    </div>
                    <small class="text-muted">Live with Exposure Sensor</small>
                </a>
            </div>
            <a href="alerts.php">
                <h2 class="py-3 text-center">Alerts</h2>
                <div
                    class="transform-scale"
                    style="
                        background-image: url('../assets/alert.png'); 
                        background-position:center; 
                        background-size:contain;
                        background-repeat : no-repeat;
                        height: 120px;
                        ">
                </div>
            </a>
        </div>
    </section>
</main>

<!-- Footer -->
<?php include('footer.php'); ?>