
<?php

// make index no unique -> delete the records

$countStudents;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fypcs";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<html>

    <head>

        <style>

            a{
                color:whiste!important;
            }

            a::hover{
                color:red!important;
            }

            body{
                background-color:#232b2b!important;
                font-family: "Roboto";
                font-weight: 400;
            }

            div.sticky {
                position: fixed!important;
                margin-left:57.5%
            }

            .modal {
                    display: none;
                    /* Hidden by default */
                    position: fixed;
                    /* Stay in place */
                    z-index: 1;
                    /* Sit on top */
                    padding-top: 100px;
                    /* Location of the box */
                    left: 0;
                    top: 0;
                    width: 100%;
                    /* Full width */
                    height: 100%;
                    /* Full height */
                    overflow: auto;
                    /* Enable scroll if needed */
                    background-color: rgb(0, 0, 0);
                    /* Fallback color */
                    background-color: rgba(0, 0, 0, 0.9);
                    /* Black w/ opacity */
                }
                /* Modal Content (image) */
                #caption {
                    margin: auto;
                    margin-top:-80px!important;
                    text-align: center;
                    color: #ccc;
                    height: 100px;
            }


                    .modal-content {
                        margin: auto;
                        margin-top: -80px;
                        display: block;
                        width: 45%!important;
                    }
                    /* Caption of Modal Image */

                    .modal-content,
                    #caption {
                        -webkit-animation-name: zoom;
                        -webkit-animation-duration: 0.6s;
                        animation-name: zoom;
                        animation-duration: 0.6s;
                    }

                    @-webkit-keyframes zoom {
                        from {
                            -webkit-transform: scale(0)
                        }
                        to {
                            -webkit-transform: scale(1)
                        }
                    }

                    @keyframes zoom {
                        from {
                            transform: scale(0)
                        }
                        to {
                            transform: scale(1)
                        }
                    }
                    /* The Close Button */

                    .close {
                        position: absolute;
                        top: 15px;
                        right: 35px;
                        color: #f1f1f1;
                        font-size: 40px;
                        font-weight: bold;
                        transition: 0.3s;
                    }

                    .close:hover,
                    .close:focus {
                        color: #bbb;
                        text-decoration: none;
                        cursor: pointer;
                    }
                    /* 100% Image Width on Smaller Screens */

                    @media only screen and (max-width: 100px) {
                        .modal-content {
                            width: 50%!important;
                        }
                    }


                    iframe.modal-content {
                            width: 800px!important;
                            height: 680px;
                    } }


        </style>


        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


        <link rel="stylesheet" type="text/css" href="../css/styleSort.css">


    </head>

    <body onload="calculate(),colorChange()" data-spy="scroll" data-target="#navbarResponsive">


    <div class="form-row"
        style="width: 100%; margin-top: 00px; backgrsound-color: rgb(159, 207, 174); padding-top: 10px; padding-bottom: 10px;padding-left: 10px;padding-right: 10px;">



        <div class="col-lg-7">

            <table style=" width: 100%!important; text-align: center;" border = "1" class=" table table-dark table-striped table-hover table-sortable">

                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Supervisor 1</th>
                        <th>Supervisor 2</th>
                        <th>Supervisor 3</th>
                    </tr>
                </thead>

            <tbody>

                    <?php

$sql = "SELECT count(distinct(area)) as areaCount FROM norm WHERE send ='1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $areaCount = $row["areaCount"];
    }

} else {
    echo "0 results";
    echo "<br>";
}

for ($t = 0; $t < $areaCount; $t++) {

    $t1 = $t + 1;

    $sql = "SELECT distinct(area) as areas FROM norm WHERE send = '1' order by indexNo limit $t1 OFFSET $t";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $areas = $row["areas"];
            $areas2 = $areas;
        }

    } else {
        echo "<br>";

        echo "0 results";
        echo "<br>";
    }
    ?>

                <tr>
                    <td colspan="5" style = "color:#e7e7e7;"><?php echo $areas2 ?></td>
                </tr>

                <?php

    $sql = "SELECT count(indexNo) as countStudents FROM norm where send = '1' and area = '$areas2' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $countStudents = $row["countStudents"];
        }

    } else {
        echo "0 results";
        echo "<br>";
    }

    for ($a = 0; $a < $countStudents; $a++) {

        $a1 = $a + 1;

        $sql = "SELECT * FROM norm where area = '$areas2' and send = '1' order by indexNo limit $a1 OFFSET $a";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {
                $firstName = $row["firstName"];
                $lastName = $row["lastName"];
                $firstName2 = $firstName;
                $indexNo = $row["indexNo"];
                $indexNo2 = $indexNo;
                $admissionNo = $row["admissionNo"];
            }

        } else {
            echo "<br>";

            echo "0 results";
            echo "<br>";
        }

        ?>

                <tr>

                    <td  style="width:150px;">

                    <?php
//                          echo '<iframe id="$row["firstName"]" src="norm/index.php?id='.$row["firstName"].'" style="height:100%;width:100%;"  alt="Snow" ></iframe>';
        //                          echo '<iframe id='.$row["indexNo"].' src="norm/index.php?id='.$row["indexNo"].'" style="height:100%;width:100%;"  alt="Sncow" hidden></iframe>';
        echo '<a href="norm/index.php?id=' . $row["indexNo"] . '" data-toggle="tooltip" data-placement="right" title=' . $row["firstName"] . '&nbsp;' . $row["lastName"] . ' >' . $row["admissionNo"] . '</a>' . '<br>';
        ?>
<!--                        <button id="myImg" onclick = "view('<?php echo $row['indexNo']; ?>')" data-toggle="tooltip" title="Click here to see the full norm form" alt = "asd">
                            <?php echo $row["firstName"]; ?>
                        </button>
-->

                    </td>

                    <?php

        $supervisorList = array("supervisor1", "supervisor2", "supervisor3");

        for ($b = 0; $b < 3; $b++) {
            ?>

                                    <td>
                                    <!--here use admission number instead of firstName or indexNo-->
                                        <select class="custom-select custom-select-sm" onclick="calculate(), colorChange('<?php echo $admissionNo ?>','<?php echo $b ?>')" id="<?php echo $admissionNo . $b; ?>" style="width: 100%; color:#232b2b; background-color:	#f2f1e7" >
                                            <?php

            $sql = "SELECT * FROM norm  where area = '$areas2' and send = '1' order by indexNo limit $a1 OFFSET $a";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                if ($row = $result->fetch_assoc()) {
                    echo $row["$supervisorList[$b]"];
                }

            } else {
                echo "<br>";
                echo "0 results";
                echo "<br>";
            }

            ?>


                            <optgroup value = "0" label="requested">
                            <option value="<?php echo $row["$supervisorList[$b]"]; ?>" hidden>
                                    <?php echo $row["$supervisorList[$b]"]; ?></option>
                                <option value="<?php echo $row["$supervisorList[$b]"]; ?>" style = "background-color:lightgreen;">
                                    <?php echo $row["$supervisorList[$b]"]; ?></option>
                            </optgroup>

                            <optgroup value = "3" label="not assigned">
                            <option value="not assigned">Not assigned</option>
                            </optgroup>

                            <optgroup value = "1" label="same research area">

                                <?php

            $sql = "SELECT count(distinct(name)) as supervisorCountArea FROM supervisors where area = '$areas2'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                if ($row = $result->fetch_assoc()) {
                    $supervisorCountArea = $row["supervisorCountArea"];
                }

            } else {
                echo "<br>";
                echo "0 results";
                echo "<br>";
            }

            for ($c = 0; $c < $supervisorCountArea; $c++) {

                $c1 = $c + 1;

                $sql = "SELECT distinct(name) FROM supervisors where area = '$areas2' order by name limit $c1 OFFSET $c";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    if ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                    }

                } else {
                    echo "<br>";
                    echo "0 results";
                    echo "<br>";
                }
                ?>
                                <option value="<?php echo $name; ?>" style = "background-color:lightblue;"><?php echo $name; ?></option>
                                <?php
}
            ?>
                            </optgroup>

                            <optgroup value = "2" label="other research area">

                                <?php

            $sql = "SELECT count(distinct(name)) as supervisorCountArea FROM supervisors where area not in('$areas2')";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                if ($row = $result->fetch_assoc()) {
                    $supervisorCountArea = $row["supervisorCountArea"];
                }

            } else {
                echo "<br>";

                echo "0 results";
                echo "<br>";
            }

            for ($d = 0; $d < $supervisorCountArea; $d++) {

                $d1 = $d + 1;

                $sql = "SELECT distinct(name) FROM supervisors where area not in('$areas2') order by name limit $d1 OFFSET $d";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    if ($row = $result->fetch_assoc()) {
                        $name = $row["name"];
                    }

                } else {
                    echo "<br>";

                    echo "0 results";
                    echo "<br>";
                }
                ?>
                                <option value="<?php echo $row["name"]; ?>" style = "background-color:pink;"><?php echo $row["name"]; ?></option>
                                <?php
}
            ?>
                            </optgroup>

                        </select>
                    </td>
                    <?php
}

        ?>

                </tr>
                <?php
}
    ?>

<?php
}
?>

</tbody>
            </table>

            <center>
            <button onclick="submit2();" type = "submit" class = "btn btn-primary" style = "width:100%" hidden>Submit</button>
            </center>

        </div>



        <div class="sticky col-lg-5">

            <table class="table-sortable table-dark table-hover" style="width: 100%!important; text-align: center;" cellpadding="4px" border="1">


                <thead>
                <tr>
                    <th style="width:60% ;">Supervisor's name</th>
                    <th style="width:10% ;">Total</th>
                    <th style="width:10% ;">s1</th>
                    <th style="width:10% ;">s2</th>
                    <th style="width:10% ;">s3</th>
                </tr>
                </thead>

                <?php

$sql = "SELECT count(distinct(name)) as countSupervisors FROM supervisors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $countSupervisors = $row["countSupervisors"];
    }

} else {
    echo "0 results";
    echo "<br>";
}

for ($e = 0; $e < $countSupervisors; $e++) {

    $e1 = $e + 1;

    $sql = "SELECT distinct(name) FROM supervisors order by name limit $e1 OFFSET $e";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
            $name = $row["name"];
        }

    } else {
        echo "<br>";

        echo "0 results";
        echo "<br>";
    }

    ?>

<tbody>
                    <tr>
                        <td><?php echo $row["name"]; ?></td>

                        <td id="<?php echo $row["name"] . "1"; ?>" style = "background-color:#414a4c;">0</td>
                        <td id="<?php echo $row["name"] . "2"; ?>">0</td>
                        <td id="<?php echo $row["name"] . "3"; ?>">0</td>
                        <td id="<?php echo $row["name"] . "4"; ?>">0</td>
                    </tr>
</tbody>
                    <?php
}
?>

            </table>

    <script src="../js/tablesort.js"></script>


        </div>

    </div>









<!-- The Modal -->
<div id="myModal" class="modal">

    <span class="close" style="font-size: 30px!important; color:white;">&times;</span>

    <div  id="caption"></div>

    <div class="form-row">
                    <div class="col-lg-12">
    <div  id="caption"></div>

    <iframe width="10px" height=85% class="modal-content" id="img01"></iframe>

</div>




<script>
    $(function () {
    $('[data-toggle="tooltip"]').tooltip()
    })
</script>






    <script >

    function view(a){
var modal = document.getElementById("myModal");

var img2 = document.getElementById(a);
var modalImg = document.getElementById("img01");
var captionText = document.getElementById(a);

    modal.style.display = "block";
    modalImg.src = img2.src;
    captionText.innerHTML = this.alt;


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
    }


// Get the image and insert it inside the modal - use its "alt" text as a caption

function colorChange(a,b){

    $('select').change(function () {
    var opt = $(this).find(':selected');
    var sel = opt.text();
    var og = opt.closest('optgroup').attr('value');
    /*
    window.alert(og);
    */

    //alert(sel);
    //alert(og);

    if(og == 0){
        $(this).css('backgroundColor','lightgreen');
    } else if (og == 1){
        $(this).css('backgroundColor','lightblue');
    } else{
        $(this).css('backgroundColor','pink');
    }


});

/*
    var selected = $('option:selected');
  alert(selected.closest('optgroup').attr('value'));
*/


    /*
    var selectedOption = $('#select option:selected');
    var label = selectedOption.closest('optgroup').attr('label');
    alert(label);
    */
   /*
   var i;
   var item = document.getElementById("two");
    var selected2 = $('select option:selected');
    var year=       $('option:selected', this).closest('optgroup').attr('label');
  alert           ($('select option:selected').closest('optgroup',item).attr('value'));



  var c = $('select option:selected').closest('optgroup').attr('value');
  var year=$('option:selected', this).closest('optgroup').attr('label');
*/
  /*
    if(selected.closest('optgroup').attr('value') == "2"){
        document.getElementById(a+b).style.backgroundColor = "lightblue";
    } else{
        document.getElementById(a+b).style.backgroundColor = "green";

    }
    */
}

        function calculate() {

            var supervisorsArray2 = [];

            var one =0;
            var two =0;
            var three =0;

            var oneArray = new Array();
            var twoArray = new Array();
            var threeArray = new Array();

            <?php

$sql = "SELECT count(indexNo) as countStudents2 FROM norm WHERE send = '1'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $countStudents2 = $row["countStudents2"];
    }

} else {
    echo "0 results";
    echo "<br>";
}

for ($e = 0; $e < $countStudents2; $e++) {
    for ($f = 0; $f < 3; $f++) {

        $e1 = $e + 1;

        $sql = "SELECT * FROM norm WHERE send = '1' order by indexNo limit $e1 OFFSET $e";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            if ($row = $result->fetch_assoc()) {
                $firstName = $row["firstName"];
                $indexNo = $row["indexNo"];
                $admissionNo = $row["admissionNo"];
            }

        } else {
            echo "<br>";
            echo "0 results";
            echo "<br>";
        }

        ?>

                    /*
                    document.getElementById("a1").innerHTML="2";
                    document.getElementById("h4").innerHTML="2";
                    */

                    var a = document.getElementById("<?php echo $admissionNo . $f; ?>").value;
                    //var a = "THARAKA3";
                    var b = <?php echo $indexNo ?>;
                    var c = <?php echo $f ?>;

                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            }
                        };

                    xmlhttp.open("GET","update.php?q="+a+    "&b="+b+     "&c="+c);
                    xmlhttp.send();

                    <?php

        /*
        $var = ?>"<script>document.write(a);</script>";<?php
        echo "alert('$var')";
         */

        //echo "alert(<script>document.writeln(a);</script>)";

        //$sql = "UPDATE norm SET supervisor1 = '."<script>document.writeln(a)</script>".' WHERE indexNo=11";
        /*
        $sql = "UPDATE norm SET supervisor1 = '$var' WHERE indexNo=11";

        if ( $conn->query( $sql ) === TRUE ) {
        //echo 'Record updated successfully';
        } else {
        echo 'Error updating record: ' . $conn->error;
        }

        $asd = "sewmi";
        echo "alert('$asd')";
         */

        ?>

                    /*
                    if(b==0){
                        oneArray[one] = a;
                        one++;
                    } else if(b==1){
                        twoArray[two] = a;
                        two++;
                    } else if(b==2){
                        threeArray[three] = a;
                        three++;
                    }
                    */

                    switch(<?php echo $f; ?>){

                        case 0:
                            // count the lecturer number
                            // for loop <-count

                            oneArray[one] = a;
                            one++;
                            break;
                        case 1:
                            twoArray[two] = a;
                            two++;
                            break;
                        case 2:
                            threeArray[three] = a;
                            three++;
                            break;
                    }

                    <?php
}
}
?>

            var result1  = {};
            oneArray.forEach(function(x) {result1[x] = (result1[x] || 0)+1; });

            var result2  = {};
            twoArray.forEach(function(x) {result2[x] = (result2[x] || 0)+1; });

            var result3  = {};
            threeArray.forEach(function(x) {result3[x] = (result3[x] || 0)+1; });




            <?php

$sql = "SELECT count(distinct(name)) as countSupervisors FROM supervisors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $countSupervisors = $row["countSupervisors"];
    }

} else {
    echo "0 results";
    echo "<br>";
}

for ($g = 0; $g < $countSupervisors; $g++) {

    $g1 = $g + 1;

    $sql = "SELECT distinct(name) FROM supervisors order by name limit $g1 OFFSET $g";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($row = $result->fetch_assoc()) {
            $name = $row["name"];

        }

    } else {
        echo "<br>";
        echo "0 results";
        echo "<br>";
    }

    ?>
                supervisorsArray2[<?php echo $g ?>] = "<?php echo $row["name"] ?>";
                <?php

}

$sql = "SELECT count(distinct(name)) as countSupervisors FROM supervisors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    if ($row = $result->fetch_assoc()) {
        $countSupervisors = $row["countSupervisors"];
    }

} else {
    echo "0 results";
    echo "<br>";
}
?>

            for($g = 0; $g < <?php echo $countSupervisors ?>; $g++){
                    document.getElementById(supervisorsArray2[$g]+'2').innerHTML = (result1)[supervisorsArray2[$g]];
            }

            for($g = 0; $g < <?php echo $countSupervisors ?>; $g++){
                document.getElementById(supervisorsArray2[$g]+'3').innerHTML = result2[supervisorsArray2[$g]];
            }

            for($g = 0; $g < <?php echo $countSupervisors ?>; $g++){
                document.getElementById(supervisorsArray2[$g]+'4').innerHTML = result3[supervisorsArray2[$g]];
            }

            // if undefined then 0

            for($g = 0; $g < <?php echo $countSupervisors ?>; $g++){
                var x = document.getElementById(supervisorsArray2[$g]+'1').innerHTML;
                if(x == 'undefined'){
                    document.getElementById(supervisorsArray2[$g]+'1').innerHTML = 0;
                }
            }

            for($g = 0; $g < <?php echo $countSupervisors ?>; $g++){

                var x = document.getElementById(supervisorsArray2[$g]+'2').innerHTML;
                if(x == 'undefined'){
                    document.getElementById(supervisorsArray2[$g]+'2').innerHTML = 0;
                }
                var num1 = document.getElementById(supervisorsArray2[$g]+'2').innerHTML;

                var x = document.getElementById(supervisorsArray2[$g]+'3').innerHTML;
                if(x == 'undefined'){
                    document.getElementById(supervisorsArray2[$g]+'3').innerHTML = 0;
                }
                var num2 = document.getElementById(supervisorsArray2[$g]+'3').innerHTML;

                var x = document.getElementById(supervisorsArray2[$g]+'4').innerHTML;
                if(x == 'undefined'){
                    document.getElementById(supervisorsArray2[$g]+'4').innerHTML = 0;
                }
                var num3 = document.getElementById(supervisorsArray2[$g]+'4').innerHTML;


                var num12 = parseInt(num1, 10);
                var num22 = parseInt(num2, 10);
                var num32 = parseInt(num3, 10);

                document.getElementById(supervisorsArray2[$g]+'1').innerHTML = (num12+num22+num32);

            }





            var supervisorsArray = ("a","b","c","d","e","f");

            }





    </script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

</body>

</html>