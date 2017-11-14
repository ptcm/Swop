<?php
$pageTitle = "Swop Match Handler | Home";
//include("inc/header.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Swop Match Handler!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
    <div class="container">
        <a class="navbar-brand order-1 mr-0" href="https://www.b.com" target="_blank">Presented by SwopMatch Handler Org</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link" href="Account_manage.php" target = "_blank">My Account</a>
                <a class="nav-item nav-link" href="reports.php" target = "_blank">Reports</a>
                <a class="nav-item nav-link" href="Contact.php" target = "_blank">Contact</a>
            </div>
        </div>
    </div>
</nav><!-- /navbar -->

<!-- jumbotron -->
<div class="jumbotron jumbotron-fluid bg-info text-white">
    <div class="container text-sm-center pt-5">
        <h1 class="display-2">SwopMatch Handler</h1>
        <p class="lead">Make life easy with Swop Match Handler! A place where we take care of you!</p>
        <div class="btn-group mt-4" role="group" aria-label="Callout buttons">
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#register">signup for SwopMatchHandler Now</button>
            <a class="btn btn-light btn-lg" href="#speakers">Help</a>
        </div>
    </div>
</div><!-- /jumbotron -->

<!-- callout button -->
<button type="button" class="btn btn-outline-info btn-lg d-block mx-auto my-5" data-toggle="modal" data-target="#register">Don't Be left Out, Signup Now</button>

<!-- signup form -->
<hr>
<div class="row py-4 text-muted">
    <div class="col-md col-xl-5">
        <p><strong>About Swop Match Handler</strong></p>
        <p>SwopMatch Handler brings affordable technology to people everywhere to help them achieve their dreams and change the Nation.</p>
    </div>
    <div class="col-md col-xl-5 ml-auto">
        <p><strong>Stay up-to-date on Swop Match Handler</strong></p>
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Email">
            <span class="input-group-btn">
			        <button class="btn btn-primary" type="button">Sign up</button>
			      </span>
        </div>
    </div>
</div>
<hr><!-- /signup form -->

<!--contact-->
<div class="card border-dark mb-3" style="max-width: 20rem;">
    <div class="card-header tn btn-primary">Contact</div>
    <div class="card-body text-info">
        <h4 class="card-title">Contact</h4>
        <p class="card-text">
        <p><strong>Email:</strong><a href="mailto:pchizema@gmail.com>?subject=if you have issues I  will be to assist you!">pchizema@gmail.com</a></p>
        <p><strong>Phone:</strong>+263 712549887</p>
        <p><strong>Email:</strong> <a href="mailto:maluwalovejoy2@gmail.com?subject=Hi There, you are free to ask anything!">maluwalovejoy2@gmail.com</a></p>
        <p><strong>Phone:</strong>+263 778846005</p>
        <p><strong>Address:</strong></p>
        <address>
            Education Solution<br>
            23 Harare Drive<br>
            Zimbabwe<br>
        </address>
        <footer>
            <p><small>&copy; 2017 SwopMatch Handler</small></p>
        </footer></p>


    </div><!-- /.container -->

    <!--=====================================
        FORM MODAL
       =====================================-->

    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="register form" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register for SwopMatchHandler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Form goes here...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
<?php //include("inc/footer.php"); ?>
