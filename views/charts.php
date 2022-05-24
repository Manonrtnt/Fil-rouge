<!-- Header -->
<?php include('header.php'); ?>

    <!-- Section -->
    <main class="container rounded p-2 my-2 shadow-sm">
        <section class="row justify-content-around py-3">
            <div class="col-11 col-md-3 bg-white p-5 rounded-3">
                <a href="#">
                    <h3 class="pb-4 text-center"><i class="fa-thin fa-droplet-degree me-2"></i>
Humidity</h3>
                    <div    
                    style="
                        background-image: url('../assets/graphique.png'); 
                        background-position:center; 
                        background-size:contain;
                        background-repeat : no-repeat;
                        height: 400px;
                        ">
                    </div>
                </a>
            </div>
            <div class="col-11 my-5 m-md-0 col-md-3 bg-white p-5 rounded-3">
                <a href="temperature.php">
                    <h3 class="pb-4 text-center"><i class="fa-thin fa-temperature-high me-2"></i>
Temperature</h3>
                    <div    
                    style="
                        background-image: url('../assets/graphique.png'); 
                        background-position:center; 
                        background-size:contain;
                        background-repeat : no-repeat;
                        height: 400px;
                        ">
                    </div>
                </a>
            </div>
            <div class="col-11 col-md-3 bg-white p-5 rounded-3">
                <a href="#">
                    <h3 class="pb-4 text-center"><i class="fa-thin fa-lightbulb-on me-2"></i>
Luminosity</h3>
                    <div    
                    style="
                        background-image: url('../assets/graphique.png'); 
                        background-position:center; 
                        background-size:contain;
                        background-repeat : no-repeat;
                        height: 400px;
                        ">
                    </div>
                </a>
            </div>
        </section>
    </main>

<!-- Footer -->
<?php include('footer.php'); ?>