<!DOCTYPE html>
<html>

<head>
    <script src="jquery-1.11.1.min.js"></script>
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

    </div>


</body>

</html>