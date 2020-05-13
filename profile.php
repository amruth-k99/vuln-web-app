<!doctype html>
<html lang="en">
<?php
include('./partials/login_check.php');
?>

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
        <?php
        include('./partials/header.php');
        $sql = "SELECT * FROM passwords where username='" . ($_GET['user']) .  "'";
        $result = mysqli_query($db, $sql);
        $count = mysqli_num_rows($result);
        echo ($count);



        ?>
        <div id="login">
            <h3 class="text-center text-white pt-5">Profile Data</h3>
            <div class="container">
                <div id="login-row" class="row justify-content-center align-items-center">
                    <div id="login-column" class="col-md-6">
                        <div id="login-box" class="col-md-12">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Pair</th>
                                        <th scope="col">Value</th>
                                    </tr>
                                </thead>
                                <?php
                                while ($row = mysqli_fetch_array($result)) {


                                    echo '<tbody>
                                    <tr>
                                        <td>Name</td>
                                        <td>' . ($row[0]) . '</td>
                                    </tr>
                                    <tr>
                                        <td>Id</td>
                                        <td>' . ($row[2]) . '</td>
                                    </tr>
                                    <tr>
                                        <td>Control</td>
                                        <td>' . ($row[3]) . '</td>
                                    </tr>
                                </tbody>';
                                } ?>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
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