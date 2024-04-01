<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['username'])) {
    header("Location: index2.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User login system</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="css/fontsapi.css" rel="stylesheet">

    <!-- Vendor CSS Files -->

    <script type="text/javascript">
        function preventBack() {
            window.history.forward();
        }
        setTimeout("preventBack()", 0);
        window.onunload = function() {
            null
        };
    </script>
    <style>
        body {
            font-family: 'calibri';
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background: linear-gradient(to right, #003366 0%, #cc3399 100%);
            color: #FAEED1;
        }

        form {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            text-align: center;
            padding: 20px;
            width: 300px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);

        }

        h1 {
            margin-bottom: 20px;
            font-size: 2.5em;
        }

        label {
            display: block;
            margin: 10px 0 10px;
            font-weight: bold;
            font-size: 17px;
            color: #FEFAE0;
            float: left;
        }

       

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid white;
            border-radius: 4px;
            background: transparent;
            color:white;
            font-size: 17px;


        }
        

        input[type="submit"] {
            width: 100%;
            background-color: #213555;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 17px;
            font-weight: bold;


        }

        .message {
            color: red;
            /* Set the color to red */
            font-weight: bold;
            font-size: 18px;
        }

        .para {
            color: #FEFAE0;
            text-decoration: none;
            margin-left: 80%;
            margin-top: 5px;
            font-size: 18px;
            font-weight: bold;

        }
        img{
            float: left;
            width: 40%;
            height: 40%;
            margin-top: -0%;
        }

        @media (max-width: 600px) {
            form {
                width: 80%;
            }
        }
    </style>

    <head>
        <!-- Other head elements -->
        <script>
            function hideErrorMessage() {
                var errorMessage = document.querySelector('.message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }

            // Hide error message after 5 seconds
            setTimeout(hideErrorMessage, 5000);
        </script>
    </head>

</head>

<body>

    <form action="authenticate.php" method="post">
        <div class="float-end">
            <a href="../index.php">
                <p class="para"  data-dismiss="modal">Skip</p>
            </a>
        </div>
        <h1 class="h1">User Login</h1>
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required autofocus>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <?php
        if (isset($_SESSION['error_msg'])) {
            echo "<div class='message'>
                    <p>" . $_SESSION['error_msg'] . "</p>
                </div><br>";
            unset($_SESSION['error_msg']); // Clear the error message
        }
        ?>
        <input type="submit" value="Login" name="submit">
    </form>
</body>

</html>