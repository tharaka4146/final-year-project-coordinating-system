<?php include 'config.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="datepicker/css/custom.css">
    <script src="datepicker/js/bootstrap-datepicker.min.js"></script>
</head>


<div class="form-group">
    <div class="row">
        <div class="col-md-4">
            <div id="datetimepicker2"></div>
        </div>
        <div class="col-md-8">

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

</html>