<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "finalyearprojectcoordinationsystem";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET["id"];
$id2 = $id;

$sql = "SELECT * FROM appendix1 WHERE indexNo = '$id2'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if($row = $result->fetch_assoc()) {
        ?>


<html>
<meta charset="UTF-8" />

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body data-spy="scroll" data-target="#navbarResponsive">

<!--
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
        <a href="#" class="navbar-brand">
            <i class="fab fa-pied-piper-pp fa-2x  align-self-center"></i>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                <li class="navbar-item">
                    <a href="#home" class="nav-link">HOME</a>
                </li>
                <li class="navbar-item">
                    <a href="#form" class="nav-link">FORM</a>
                </li>
                <li class="navbar-item">
                    <a href="#features" class="nav-link">HELP</a>
                </li>
                <li class="navbar-item">
                    <a href="#student2" class="nav-link">SIGN OUT</a>
                </li>

            </ul>
        </div>

    </nav>
-->



    <br><br><br>

    <div id="form" class="offset"></div>

    <div class="col-lg-12 container">

        <form action="" method="POST">

            <fieldset class="outer">

                <fieldset class="inner">

                    <br>
                    <br>
                    <br>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <input type="text" id="name1" name="firstName" value="<?php echo $row["firstName"]; ?>" required/>
                            <label for="name1">First Name</label>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <input type="text" style = "pointer-events: none;" id="name2" name="lastName" value="<?php echo $row["lastName"]; ?>" required/>
                            <label for="name2">Last Name</label>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <input type="text" style = "pointer-events: none;" id="name3" name="email" value="<?php echo $row["email"]; ?>" required/>
                            <label for="name3">Email Address</label>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <input type="text" style = "pointer-events: none;" id="name4" name="contactNo" value="<?php echo $row["contactNo"]; ?>" required/>
                            <label for="name4">Contact No</label>

                        </div>
                    </div>


                </fieldset>

                <fieldset class="inner">

                    

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <input type="text" style = "pointer-events: none;" id="title1" name="title" value="<?php echo $row["title"]; ?>" required/>
                            <label for="title1">Title of the project</label>

                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <h1 style="font-size: 14px; color: #b1adad;">Problem in brief</h1>
                            <textarea name="problem" class="form-control" id="title2" style="border-color: blue; border-width: 1px; color:blue" rows=5 disabled><?php echo $row["problem"]; ?></textarea>

                        </div>
                    </div>

                    <br><br><br><br><br>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">

                            <h1 style="font-size: 14px; color: #b1adad;">Solution</h1>
                            <textarea name="solution" class="form-control" id="title2" style="border-color: blue; border-width: 1px; color:blue" rows=5 disabled><?php echo $row["solution"]; ?></textarea>

                        </div>
                    </div>
                    <br><br><br><br><br>

                    <div class="form-row">
                        <div class="col-lg-12 mb-3 one">
                            <h1 style="font-size: 14px; color: #b1adad;">Technologies</h1>
                            <textarea name="technology" class="form-control" id="title2" style="border-color: blue; border-width: 1px; color:blue" rows=5 disabled><?php echo $row["technologies"]; ?></textarea>

                        </div>
                    </div>

                    <br><br><br><br><br>

                    <div class="form-row">

                        <div class="col-lg-12 mb-3">

                            <h1 style="font-size: 14px; color: #b1adad;">Area of the research Project</h1>

                            <div class="dropdown">
                                <select class="custom-select" name="area" disabled>
                                    <option selected><?php echo $row["area"]; ?></option>
                                </select>
                            </div>
                        </div>
                    </div>



                </fieldset>
                <fieldset class="inner">

                   

                    <div class="form-row">

                        <div class="col-lg-4 mb-3">
                            <h1 style="font-size: 14px; color: #b1adad;">Supervisor 1</h1>

                            <div class="dropdown">
                                <select class="custom-select" name="supervisor1" disabled>
                                    <option selected><?php echo $row["supervisor1"]; ?></option>
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-4 mb-3">
                            <h1 style="font-size: 14px; color: #b1adad;">Supervisor 2</h1>

                            <div class="dropdown">
                                <select class="custom-select" name="supervisor2" disabled>
                                    <option selected><?php echo $row["supervisor2"]; ?></option>
                                </select>
                            </div>


                        </div>
                        <div class="col-lg-4 mb-3">
                            <h1 style="font-size: 14px; color: #b1adad;">Supervisor 3</h1>

                            <div class="dropdown">
                                <select class="custom-select" value="<?php echo $row["supervisor3"]; ?>" name="supervisor3" disabled>
                                    <option selected><?php echo $row["supervisor3"]; ?></option>
                                </select>
                            </div>


                        </div>
                    </div>

                    <br><br>
                    
                    <div class="row text-center">
                        <div class="col-md-4">
                            <button class="button button1"><span>Save and edit later</span></button>
                        </div>
                        <div class="col-md-4">
                            <button class="button button1"><span>Save and preview</span></button>
                        </div>
                        <div class="col-md-4">
                            <button class="button button1"><span>Save and send</span></button>
                        </div>
                    </div>
                    
                </fieldset>
                
            </fieldset>
            
        </form>
        
        
        <br><br><br>
        
        
    </div>
    <iframe src="test2.htm" style="height:100%;width:100%;"></iframe>
    <div class="bottom">
        <center>
            </center>
        </div>
        <script type="text/javascript" src="js/main.js"></script>
        <script src="https://use.fontawesome.com/releases/v5.5.0/js/all.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


</body>

</html>


            
<?php
    }

} else {
    echo "0 results";
    echo "<br>";
}

?>
