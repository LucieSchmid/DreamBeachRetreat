<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/1456f04639.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="login.css">

</head>

<body>
    <div class="offcanvas offcanvas-start" id="demo">
        <div class="offcanvas-header">
            <h1 class="offcanvas-title">Heading</h1>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <p>Some text lorem ipsum.</p>
            <p>Some text lorem ipsum.</p>
            <p>Some text lorem ipsum.</p>
            <button class="btn btn-secondary" type="button">A Button</button>
        </div>
    </div>

    <div class="container-fluid mt-3">
        <h3>Offcanvas Sidebar</h3>
        <p>Offcanvas is similar to modals, except that it is often used as a sidebar.</p>
        <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#demo">
            Open Offcanvas Sidebar
        </button>
    </div>




    <div class="container mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
            Open modal
        </button>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    Modal body..
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>



</body>

</html>