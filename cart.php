<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fabro Rooms</title>
</head>
<style>
    .room-card {
        border: 1px solid #ccc;
        border-radius: 8px;
        padding: 16px;
        margin-bottom: 5px;
        margin-top: 10px;
        justify-content: space-between;
        align-items: center;
        width: 200px;
        margin-left: -25px;
        background-color: rgb(242, 240, 240);

    }

    .room-details {
        flex: 1;
        color: white;
    }

    .room-details p {
        margin: 0;
    }

    .quitSymbol {
        cursor: pointer;
        color: red;
        font-size: 20px;
        float: right;
    }

    .breadcrumb-text {
        margin-left: 180px;
    }

    #selectedRoomDisplay {
        margin-top: 20px;
        display: flex;
        justify-content: center;
        text-align: center;
    }

    table {
        border-collapse: collapse;
        margin-top: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    th,
    td {
        padding: 12px;
        text-align: center;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    td button {
        padding: 6px 12px;
        background-color: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
</style>

<body>
    <?php
    include('header.php');
    ?>

    <div>
        <center>
            <div id="selectedRoomDisplay" style="width: 65%;"></div>
        </center>
        <button class="btn btn-success" id="reserveButton" onclick="onReserveButtonClick(event)" style="float: right; margin-right: 250px">Reserve Your Room</button>
        <div id="errorMessage" style="color: red; margin-top: 10px; text-align: right;"></div>

    </div>

    
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
   <script>
    
   </script>
</body>

</html>