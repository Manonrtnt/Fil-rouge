<?php include('header.php');?>
    <main class="container py-5">
        <section class="row justify-content-around text-center">
            <div class="col-11 col-md-4 py-3 bg-white rounded-3">
                <h3>Weather Toulouse <i class="fa-thin fa-sun-cloud ms-2"></i></h3>
                <div id= "meteoJ"></div>
            </div>
            <div class="col-11 col-md-4 py-3 bg-white rounded-3 mt-5 mt-md-0">
                <h3>Tomorrow</h3>
                <div id="displayMeteo"></div>
            </div>
        </section>
    </main>

    <!-- Script JS -->
    <script type="text/javascript" src="../script/api_meteo.js" defer></script>

<?php include('footer.php');?>