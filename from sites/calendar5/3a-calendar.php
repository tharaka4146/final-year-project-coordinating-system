<?php
// MONTHS
$months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];

// DEFAULT MONTH/YEAR = TODAY
$unix = strtotime("today");
$monthNow = date("M", $unix);
$yearNow = date("Y", $unix); ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Simple PHP Calendar</title>
    <script src="public/3b-calendar.js"></script>
    <link href="public/3c-theme.css" rel="stylesheet">
  </head>
  <body>
    <!-- [DATE SELECTOR] -->
    <div id="selector">
      <select id="month"><?php
        foreach ($months as $m) {
          printf("<option %svalue='%s'>%s</option>", 
            $m==$monthNow ? "selected='selected' " : "", $m, $m
          );
        }
      ?></select>
      <select id="year"><?php
        // 10 years range - change if not enough for you
        for ($y=$yearNow-10; $y<=$yearNow+10; $y++) {
          printf("<option %svalue='%s'>%s</option>",
            $y==$yearNow ? "selected='selected' " : "", $y, $y
          );
        }
      ?></select>
      <input type="button" value="SET" onclick="cal.list()"/>
    </div>

    <!-- [CALENDAR] -->
    <div id="container"></div>

    <!-- [EVENT] -->
    <div id="event"></div>
  </body>
</html>