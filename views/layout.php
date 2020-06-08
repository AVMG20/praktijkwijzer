<?php
use Classes\Redirect;
use Classes\Auth;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo Redirect::route("public/css/bootstrap.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo Redirect::route("public/css/icons.min.css"); ?>">
    <link rel="stylesheet" href="<?php echo Redirect::route("public/css/app.min.css"); ?>">

    <!--data tables-->
    <link href="<?php echo Redirect::route("public/libs/datatables/select.bootstrap4.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo Redirect::route("public/libs/datatables/buttons.bootstrap4.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo Redirect::route("public/libs/datatables/responsive.bootstrap4.css"); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo Redirect::route("public/libs/datatables/dataTables.bootstrap4.css"); ?>" rel="stylesheet" type="text/css">

    <!-- Vector js -->
    <script src="<?php echo Redirect::route("public/js/vendor.min.js"); ?>"></script>

    <title>Praktijkwijzer</title>
    <head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <div class="container">
        <a href="<?php echo Redirect::route(); ?>" class="navbar-brand">Project</a>
        <ul class="navbar-nav ml-aut">
            <?php if (Auth::loggedIn()) { ?>
                <li class="nav-item <?php if (Redirect::getRoute() == Redirect::route("")) echo "active"; ?>"><a
                            class="nav-link" href="<?php echo Redirect::route("") ?>"><i class="fas fa-home"></i> Home</a>
                </li>
            <?php } ?>

            <?php if(!Auth::hasPermision(10)) { ?>
                <li class="nav-item <?php if (Redirect::getRoute() == Redirect::route("complaint-create")) echo "active"; ?>"><a
                            class="nav-link" href="<?php echo Redirect::route("complaint-create") ?>">Complaint</a>
                </li>
            <?php } else { ?>
                <li class="nav-item <?php if (Redirect::getRoute() == Redirect::route("complaint")) echo "active"; ?>"><a
                            class="nav-link" href="<?php echo Redirect::route("complaint") ?>">Complaint</a>
                </li>
            <?php } ?>

            <li class="nav-item <?php if (Redirect::getRoute() == Redirect::route("login")) echo "active"; ?>"><a
                        class="nav-link" href="<?php echo Redirect::route("login") ?>"><?php if (Auth::loggedIn()) echo "Logout"; else echo "Login"; ?></a>
            </li>

            <?php if (!Auth::loggedIn()) { ?>
            <li class="nav-item <?php if (Redirect::getRoute() == Redirect::route("register")) echo "active"; ?>"><a
                        class="nav-link" href="<?php echo Redirect::route("register") ?>">Register</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</nav>


<!-- Content -->
<div class="container mt-5">

    <?php //flash messages
    if (Redirect::checkFlashMessage()) {
        foreach (Redirect::getFlashMessage() as $key => $msg) { ?>
            <div class="alert alert-<?php echo $key; ?> alert-block mb-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong><?php echo $msg; ?></strong>
            </div>
            <?php
        }
    } ?>

    <?php require_once "{$view}.php"; ?>
</div>


</body>

<!-- App js -->
<script src="<?php echo Redirect::route("public/js/app.min.js"); ?>"></script>

<!--datatables-->
<script src="<?php echo Redirect::route("public/libs/datatables/jquery.dataTables.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/dataTables.bootstrap4.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/dataTables.responsive.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/responsive.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/dataTables.buttons.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/buttons.bootstrap4.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/buttons.html5.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/buttons.flash.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/buttons.print.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/dataTables.keyTable.min.js"); ?>"></script>
<script src="<?php echo Redirect::route("public/libs/datatables/dataTables.select.min.js"); ?>"></script>
</html>