<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Logging</title>
</head>

<body>


    <body>
        <div id="login">
            <h3 class="text-center text-white pt-5">Only for Supers and Admins</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <form id="login-form" class="form" action="" method="post">
                                <h3 class="text-center text-info">Login</h3>
                                <div class="form-group">
                                    <label for="username" class="text-info">Username:</label><br>
                                    <input type="text" name="username" id="username" class="form-control" required>
                                </div> 
                                <div  class="form-group">
                                    <label for="password" class="text-info">Password:</label><br>
                                    <input type="text" name="password" id="password" class="form-control" required>
                                </div>

                                <div class="form-group m-1">
                                    <div style="color:#c40d00">
                                        <?php
                                        if (isset($_GET["error"])) {
                                            if ($_GET["error"] == 'ErrorLogin') {
                                                echo ('Your Login Name or Password is invalid');
                                            } else if ($_GET["error"] == 'LoginFirst') {
                                                echo ('Plese Login First!');
                                            } else {
                                                echo ('Please Login');
                                            }
                                        }


                                        ?></div>
                                    <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div clas="php_style" style="color:#17a2b8  ">
            <?php
            include("./partials/config.php");
            session_start();

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $myusername =  $_POST['username'];
                $mypassword = $_POST['password'];
                echo ($mypassword);
                $hash = password_hash($mypassword, PASSWORD_DEFAULT);
                echo $hash;
                $sql = "SELECT * FROM passwords where username='" . $myusername . "' and password ='" . $mypassword . "'";
                // Here is the trick for SQLi from username --->>>  admin'#'

                $result = mysqli_query($db, $sql);
                $count = mysqli_num_rows($result);
                if ($count) {
                    session_start();
                    $_SESSION["loggedin"] = true;
                    $_SESSION["username"] = $username;
                    header("location: home.php");
                } else {
                    header('location:index.php?error=ErrorLogin');
                }
            }
            ?>
        </div>
    </body>

    </div>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="index.css" rel="stylesheet" id="index-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
</body>

</html>