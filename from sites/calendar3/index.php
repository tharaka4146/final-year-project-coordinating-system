<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <script src="jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="datepicker/css/custom.css">
    <script src="bootstrap-datepicker.min.js"></script>
</head>

<body>

    <div class="row">

        <div class="form-group">

            <div class="row">
                <div class="col-md-4">
                    <div id="datetimepicker2"></div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $.get("server/adapter.php", function (data) {
                disabledDates = data.split(',');
                $('#datetimepicker2').datepicker({
                    format: 'yyyy-mm-dd',
                    datesDisabled: disabledDates,
                });
            });
        </script>

        <?php
                

                    $sql = "SELECT count(details) as count from calendar";
                    $result = $con->query($sql);

                    if ($result->num_rows > 0) {
                        if ($row = $result->fetch_assoc()) {
                            $count = $row['count'];
                        }
                    }

                  
                
                ?>

        <div>
            <?php for($i = 0; $i < $count; $i++){

                        $i1 = $i +1;

                        $sql = "SELECT * from calendar limit $i1 OFFSET $i";
                        $result = $con->query($sql);

                        if ($result->num_rows > 0) {
                            if ($row = $result->fetch_assoc()) {
                                $details = $row['details'];
                                $date = $row['date'];
                            }
                        }
                    
                        $dt = new DateTime($date);
                        $date = $dt->format('d-M');
                        $time = $dt->format('H:i:s');

                    ?>
            <h5><?php echo $date ?> <?php echo $details ?></h5>
            <?php } ?>

        </div>

    </div>


</body>

</html>