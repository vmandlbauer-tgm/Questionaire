<?php
require_once 'library.php';
if (chkLogin()) {
    $name = $_SESSION["uname"];
} else {
    header("Location: login.php");
}

if (isset($_POST['logout'])) {

    $var = removeall();
    if ($var) {
        header("Location:login.php");
    } else {
        echo "Error!";
    }

}
?>
<!DOCTYPE HTML>
<html>
<head>
    <!-- Bootstrap core CSS -->
    <link type="text/css" href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Costum Style CSS -->
    <link type="text/css" rel="stylesheet" href="css/costum.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <!-- Bootstrap core CSS -->
    <link type="text/css" href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Costum Style CSS -->
    <!-- <link type="text/css" rel="stylesheet" href="css/costum.css"> -->
    <link type="text/css" rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/jquery"></script>
    <script src="https://surveyjs.azureedge.net/1.0.82/survey.jquery.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
    <meta charset="UTF-8">
    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                animationEnabled: true,

                title:{
                    text:"Feedback Auswertung (1-5)"
                },
                axisX:{
                    interval: 1
                },
                axisY2:{
                    interlacedColor: "rgba(1,77,101,.2)",
                    gridColor: "rgba(1,77,101,.1)",
                    title: "1: Strongly Disagree, 2: Disagree, 3: Neutral, 4: Agree, 5: Strongly Agree"
                },
                data: [{
                    type: "bar",
                    name: "companies",
                    axisYType: "secondary",
                    color: "#014D65",
                    dataPoints: [
                        { y: 2, label: "Product is affordable" },
                        { y: 4, label: "Product does what it claims" },
                        { y: 3, label: "Product is better than other products on the market" },
                        { y: 3, label: "Product is easy to use" }
                    ]
                }]
            });
            chart.render();

        }
    </script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light border-bottom border-dark" style="background-color: white;">
    <a class="navbar-brand" href="home.php">Questionnaire</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown" style="right: 15%;">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo $name?>
                </a>
                <div class="dropdown-menu w-25" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="abstimmung.php">Abstimmung</a>
                    <a class="dropdown-item" href="feedback.php">Feedback</a>
                    <a class="dropdown-item" href="umfrage.php">Umfrage</a>
                </div>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.html">Logout <span class="sr-only">(current)</span></a>

            </li>
        </ul>
    </div>
</nav>
<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
<script src="../../canvasjs.min.js"></script>
</body>
</html>