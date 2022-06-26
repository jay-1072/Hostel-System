<?php include "./auth.php" ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel Portal</title>
    <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
</head>

<body>
    <?php
    include("header.php");
    include("utilities/navbar.php");
    ?>

    <div class="row justify-content-center mx-auto mt-4">
        <div class="card mx-5 mb-4 border border-dark" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Release Student</h5>
                <p class="card-text"></p>
            </div>
            <ul class="list-group list-group-flush">
                <a href="../details/hostelwiserelease.php?name=BH-1" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 1</a>
                <a href="../details/hostelwiserelease.php?name=BH-2" class="list-group-item list-group-item-action list-group-item-info">Boys Hostel 2</a>
                <a href="../details/hostelwiserelease.php?name=GH" class="list-group-item list-group-item-action list-group-item-info">Girls Hostel</a>
            </ul>
        </div>
    </div>

    <?php
    include("footer.php");
    ?>
</body>

</html>