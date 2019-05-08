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
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author"
          content="Viktor Mandlbauer (vmandlbauer@student.tgm.ac.at) & Semih Cakir (scakir@student.tgm.ac.at)">
    <title>Questionnaire</title>


    <!-- Bootstrap core CSS -->
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
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
    <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Costum Style CSS -->
    <!-- <link type="text/css" rel="stylesheet" href="css/costum.css"> -->
    <link type="text/css" rel="stylesheet" href="css/style.css">

    <script>
        $(document).ready(function () {
            $('.nav-link ').click(function () {
                $('.nav-link ').removeClass('active');
                $(this).closest('.nav-link ').addClass('active')
            });
        });

        function showstuff(boxid) {
            document.getElementById(boxid).style.visibility = "visible";
        }
    </script>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light border-bottom border-dark" style="background-color: white;">
    <a class="navbar-brand" href="#">Questionnaire</a>
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
                <a class="nav-link"  href="index.html">Logout <span class="sr-only">(current)</span></a>

            </li>
        </ul>
    </div>
</nav>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="d-block w-100" src="../images/abstimmung2.png">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="../images/feedback.png">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<ul class="nav nav-pills nav-justified" style="margin-top: 1%; margin-bottom: 2.5%">
    <li class="nav-item">
        <a class="nav-link" href="#!" onclick="showstuff('abstimmung');">Abstimmung-</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#!" onclick="showstuff('umfrage');">Umfrage</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#!" onclick="showstuff('feedback');">Feedback</a>
    </li>
</ul>

<!-- responsive equal width cols, can be sm, md, lg, or xl -->
<div class="container-fluid">
    <div class="row" style="margin: 1%;">
        <div class="col-sm">

            <div class="card">
                <img class="card-img-top" src="../images/abstimmungbg.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Abstimmung-Template</h4>
                    <p class="card-text">
                        Beschreibung der Abstimmung
                    </p>
                    <a href="umfragen-templates-default/abstimmung/abstimmung-default.html" class="btn btn-primary">Abstimmung
                        Teilnehmen</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>


        </div>
        <div class="col-sm">
            <div class="card">
                <img class="card-img-top" src="../images/abstimmung.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Umfrage-Template</h4>
                    <p class="card-text">
                        Beschreibung der Umfrage
                    </p>
                    <a href="umfragen-templates-default/feedback/feedback-default.html" class="btn btn-primary">Umfrage
                        Teilnehmen</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>


        </div>
        <div class="col-sm" style="padding-bottom: 2.5%;">
            <div class="card">
                <img class="card-img-top" src="../images/abstimmung.png" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title">Feedback-Template</h4>
                    <p class="card-text">
                        Beschreibung des Feedbacks
                    </p>
                    <a href="feedback.html" class="btn btn-primary">Feedback Teilnehmen</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Last updated 3 mins ago</small>
                </div>
            </div>


        </div>
    </div>
</div>


</body>
</html>
