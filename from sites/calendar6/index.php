<?php
$home1 = "sunrise-sunset-day_" . $sun_value . "_";
//$bgcolor="#898989";
//$tablecolor = "#675645";
//$fontcolor = "#EE49DD";
//$tableborder = "458866";

//Edit the below three lines to change the colors (Look and Feel of the calander).
//The default values are shown in the above lines
$bgcolor = "#4B9E03";
$tablecolor = "#666645";
$fontcolor = "#E3F70A";
$tableborder = "#446655";
//echo date("Y-m-d");
//'dte' = Date posted from phpcalender
if ($_GET['dt']) {
    $postdate = $_GET['dt'];
    $today = explode("-", $postdate);
    $mon = $today['1']; // post-month
    $year = $today['0']; //post-year
    $day = $today['2']; //post-day

    if (strlen($day) == 1) {
        $day = "0" . $day;
    }

    if (strlen($mon) == 1) {
        $mon = "0" . $mon;
    }

    $monnn = date("F", mktime(0, 0, 0, $mon, $day, $year)); //month as string
} else {
    $today = getdate();
    $mon = $today['mon']; //month
    $year = $today['year']; //this year
    $day = $today['mday']; //this day
    $monnn = $today['month']; //month as string

    if (strlen($day) == 1) {
        $day = "0" . $day;
    }

    if (strlen($mon) == 1) {
        $mon = "0" . $mon;
    }

}

//used for assign links
$ddd1 = $year . "_" . $mon . "_";

$day1 = $day - 1;
$my_time = mktime(0, 0, 0, $mon, 1, $year);
$start_mon = date('d', $my_time); //Month starting date
$start_day = date('D', $my_time); //Month starting Day
//echo $start_mon;
//echo $start_day;
$start_daynum = date('w', $my_time);

$daysIM = DayInMonth($mon, $year); //Number of days in this month

function DayInMonth($month, $year)
{
    $daysInMonth = array(31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31);
    if ($month != 2) {
        return $daysInMonth[$month - 1];
    } else {
        return (checkdate($month, 29, $year)) ? 29 : 28;
    }
}

//'p1' =Previous year with same date
$p1 = ($year - 1) . "_" . $mon . "_" . $day;

//'p2' =Previous month with same date
$last_month_time = mktime(0, 0, 0, $mon - 1, $day, $year);
$last_month = date('m', $last_month_time);
$last_yr = $year;
if ($last_month == "12") {
    $last_yr = ($year - 1);
}

$p2 = $last_yr . "_" . $last_month . "_" . $day;

//'p3' =Next month with same date
$next_month_time = mktime(0, 0, 0, $mon + 1, $day, $year);
$next_month = date('m', $next_month_time);
$next_yr = $year;
if ($next_month == "1") {
    $next_yr = ($year + 1);
}

$p3 = $next_yr . "_" . $next_month . "_" . $day;

//'p4' =Next year with same date
$p4 = ($year + 1) . "_" . $mon . "_" . $day;

?>

<table width="200px" border="0" cellspacing="0" cellpadding="4">
    <tr class="calender-style_3">
        <td bgcolor="#c4b49e" class="calender-style"><a href="<?php echo $home1 . $p1 . ".html"; ?>"
                class="calstyle">&lt;&lt;</a></td>
        <td bgcolor="#c4b49e" class="calender-style"><a href="<?php echo $home1 . $p2 . ".html"; ?>"
                class="calstyle">&lt;</a></td>
        <!--<td bgcolor="#c4b49e" class="calender-style"><a href="#" class="calstyle">&lt;&lt;</a></td>
<td bgcolor="#c4b49e" class="calender-style"><a href="#" class="calstyle">&lt;</a></td>-->
        <td colspan="3" align="center" bgcolor="#c4b49e" class="calender-style">
            <?php
echo $monnn;
echo " , ";
echo $year;
?></td>
        <td bgcolor="#c4b49e" class="calender-style"><a href="<?php echo $home1 . $p3 . ".html"; ?>"
                class="calstyle">&gt;</a>
        </td>
        <td bgcolor="#c4b49e" class="calender-style"><a href="<?php echo $home1 . $p4 . ".html"; ?>"
                class="calstyle">&gt;&gt;</a>
        </td>
        <!--<td bgcolor="#c4b49e" class="calender-style"><a href="#" class="calstyle">&gt;</a></td>
<td bgcolor="#c4b49e" class="calender-style"><a href="#" class="calstyle">&gt;&gt;</a></td>-->
    </tr>

    <tr>
        <td style="background: #e3d9cc;"><span class="calender-style">Sun</span></td>
        <td style="background: #e3d9cc;"><span class="calender-style">Mon</span< /td>
        <td style="background: #e3d9cc;"><span class="calender-style">Tue</span></td>
        <td style="background: #e3d9cc;"><span class="calender-style">Wed</span></td>
        <td style="background: #e3d9cc;"><span class="calender-style">Thu</span></td>
        <td style="background: #e3d9cc;"><span class="calender-style">Fri</span></td>
        <td style="background: #e3d9cc;"><span class="calender-style">Sat</span></td>
    </tr>
    <?php
$dd = 0;
$daye = 1;
$curdate = date('Y-m-d');
$curdate = strtotime($curdate);
echo "<tr bgcolor=#f4f1ed>";
while ($dd < $start_daynum) {
    echo "<td></td>";
    $dd = $dd + 1;
}

while ($dd < 7) {
    $daye1 = $daye++;
    if (strlen($daye1) == 1) {$daye2 = "0" . $daye1;} else { $daye2 = $daye1;}

    $daye2 = $ddd1 . $daye2;

    if ($daye1 == $day) {
        echo "<td bgcolor=#ba5300 align=center><a href='" . $home1 . $daye2 . ".html' class='calstyle2'>" . $daye1 . "</a>
			   </td>";
        $dd++;
    } else {
        echo "<td align=center><a href='" . $home1 . $daye2 . ".html' class='calstyle'>" . $daye1 . "</a></td>";
        $dd++;
    }
}
echo "</tr>";

while ($daye < $daysIM) {
    echo "<tr bgcolor=#f4f1ed>";
    $dd = 0;
    while ($dd < 7) {
        if ($daye <= $daysIM) {
            $daye1 = $daye++;
            if (strlen($daye1) == 1) {$daye2 = "0" . $daye1;} else { $daye2 = $daye1;}

            $daye2 = $ddd1 . $daye2;

            if ($daye1 == $day) {
                echo "<td bgcolor=#ba5300 align=center><a href='" . $home1 . $daye2 . ".html'  class='calstyle2'>" .
                    $daye1 . "</a></span></td>";
                $dd++;
            } else {
                echo "<td align=center><a href='" . $home1 . $daye2 . ".html' class='calstyle'>" . $daye1 . "</a></td>";
                $dd++;
            }
        } else {
            echo "<td></td>";
            $dd++;
        }

    }
    echo "</tr>";
}

?>
</table>