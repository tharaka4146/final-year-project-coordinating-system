<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2-login.min.css" rel="stylesheet">

    <head>
        <title>Login page with jQuery and AJAX</title>
        <link href="style.css" rel="stylesheet" type="text/css">

        <script src="jquery-3.2.1.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function() {

                $("#but_submit").click(function() {

                    var username = $("#txt_uname").val().trim();
                    var password = $("#txt_pwd").val().trim();

                    if (username != "" && password != "") {
                        $.ajax({
                            url: 'fypcs/pages/checkUser.php',
                            type: 'post',
                            data: {
                                username: username,
                                password: password
                            },
                            success: function(response) {
                                var msg = "";
                                if (response == 1) {
                                    window.location = "fypcs/pages/homeStudent.php";
                                } else if (response == 2) {
                                    window.location = "fypcs/pages/homeCoordinator.php";
                                } else if (response == 3) {
                                    window.location = "fypcs/pages/homeSupervisor.php";
                                } else if (response == 0) {
                                    msg = "Invalid username and password !";
                                }
                                $("#message").html(msg);
                            }
                        });
                    } else {
                        msg = "Empty username and password!";
                        $("#message").html(msg);
                    }
                });

            });
        </script>
    </head>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-ldogin-image" style="background-color: rgb(153, 153, 250);">
                                <img src="../img/login.jpg" alt="" style="width: 103%;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome to<span style="color:rgb(50, 50, 218);"> Arc-hive<span></h1>
                                        <label>The final year project coordination system</label><br><br>
                                    </div>


                                    <form class="user">

                                        <div class="form-group">
                                            <input type="email" autocomplete="yes" id="txt_uname" name="txt_uname" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter KDU email">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" id="txt_pwd" name="txt_pwd" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" autocomplete="off">
                                        </div>

                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                            </div>
                                        </div>

                                        <input type="button" class="btn btn-primary btn-user btn-block" value="Login" name="but_submit" id="but_submit" style="font-size:15px;" />

                                        <br>

                                        <center>
                                            <div id="message"></div>
                                        </center>


                                    </form>

                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="fypcs/pages/resetPassword.php">Forgot Password?</a><br><br>
                                        <label>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut ut enim
                                            convallis lorem venenatis rhoncus ac euismod tellus</label><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>