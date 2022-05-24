<!-- Header -->
<?php include('header.php'); ?>


<!-- Section -->
<main class="container rounded p-2 my-2 shadow-sm">
    <section class="row justify-content-around py-3">
        <div class="col-10 m-3 m-md-0 bg-white py-3 px-5 rounded-3">
            <h2>Chart temperature</h2>
            <canvas id="myChart" width="700" height="280"></canvas>
        </div>
    </section>
</main>

<!--   Script JS -->
<script type="text/javascript" src="../script/displayData.js" defer></script>

<!-- Footer -->
<?php include('footer.php'); ?>