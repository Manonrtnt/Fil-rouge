<!-- Header -->
<?php include('header.php'); ?>

    <!-- Section -->
    <main class="container rounded p-2 my-2 shadow-sm">
        <section class="row justify-content-evenly py-3">
            <div class="col-11 col-md-5 bg-white p-5 rounded-3">
                <a href="identification.php">
                    <h3 class="pb-4 text-center"><i class="fa-thin fa-seedling me-2"></i>
Indentification</h3>
                    <div    
                    style="
                        background-image: url('../assets/identification.png'); 
                        background-position:center; 
                        background-size:contain;
                        background-repeat : no-repeat;
                        height: 400px;
                        ">
                    </div>
                </a>
            </div>
            <div class="col-11 my-5 m-md-0 col-md-5 bg-white p-5 rounded-3">
                <a href="maintenance.php">
                    <h3 class="pb-4 text-center"><i class="fa-light fa-hand-holding-seedling me-2"></i>
Maintenance</h3>
                    <div    
                    style="
                        background-image: url('../assets/entretien.png'); 
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