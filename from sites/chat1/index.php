<?php

include 'config.php';

$from_id = "student";
$to_id = "supervisor"

?>


<!doctype html>
<html lang="en">

<head>


  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style>
    html {
      scroll-behavior: smooth;
    }

    .dialog {
      padding: 6px 20px 6px 20px;
      color: white;
      max-width: 80%;
      /*box-shadow: 4px 4px 10px -1px rgba(0, 0, 0, 0.75);*/
    }

    .float-left {
      border-radius: 20px 20px 20px 0px;
      background-color: #cdd1d156;
      color: #5A6363;
    }

    .float-right {
      border-radius: 20px 20px 0px 20px;
      /*background: -webkit-linear-gradient(#6BA5F2, #0540F2);*/
      background-color: #1374F2;

    }


    .time-left {
      color: #B5BABA;
      font-size: 10px;
      text-align: end;
    }

    .time-right {
      color: #B9DADA;
      font-size: 10px;
      text-align: end;
    }

    .type {
      position: fixed;
      bottom: 10px;
    }

    .submit {
      position: fixed;
      bottom: 23px;
      margin-left: 66%;
      opacity: 0.9;
    }

    .down {
      position: fixed;
      bottom: 23px;
      margin-left: 71%;
      opacity: 0.9;
    }

    #note {
      width: 100%;
      max-width: 100%;
      padding: 15px;
      border-radius: 10px;
      border: 0px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      /*background: -webkit-linear-gradient(#F9EFAF, #F7E98D);*/
      opacity: 0.9;
      resize: none;
      outline: none;
    }

    body {
      font-family: Arial, sans-serif;
      padding: 0 20px;
    }

    .txta {
      min-height: 54px;
      max-height: 100px;
      background-color: #F2F2F2;
    }
  </style>

  <script type="text/javascript">
    function moveWin() {
      window.scroll(0, 10000);
      //setTimeout('moveWin();', 1000);
    }
  </script>

</head>

<body onLoad="moveWin();">

  <div class="container">

    <br>
    <br>


    <?php
    //$sql = "SELECT count(message) as count FROM chat WHERE from_id ='.$from_id.' and to_id = '.$to_id.' or from_id ='.$to_id.' and to_id = '.$from_id.'";
    $sql = "SELECT count(message) as count FROM chat WHERE from_id ='" . $from_id . "' and to_id = '" . $to_id . "' or from_id ='" . $to_id . "' and to_id = '" . $from_id . "'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

      if ($row = $result->fetch_assoc()) {
        $count = $row["count"];
      }
    } else {
      echo "0 results";
      echo "<br>";
    }

    for ($i = 0; $i < $count; $i++) {

      $i1 = $i + 1;

      $sql = "SELECT * FROM chat WHERE from_id ='" . $from_id . "' and to_id = '" . $to_id . "' or from_id ='" . $to_id . "' and to_id = '" . $from_id . "' order by time limit $i1 OFFSET $i";
      $result = $con->query($sql);

      if ($result->num_rows > 0) {

        if ($row = $result->fetch_assoc()) {
          $message = $row["message"];
          $from_id = $row["from_id"];
          $to_id = $row["to_id"];
          $time = $row["time"];

          $dt = new DateTime($time);
          $date = $dt->format('d-m-Y');
          $time = $dt->format('h:i A');
        }
      } else {
        echo "<br>";

        echo "0 results";
        echo "<br>";
      }
      # code...

      if ($from_id == "student") {

    ?>
        <div class="row">



          <div class="col-lg-12">
            <div class="float-left dialog">
              <?php echo $message ?>
              <div class="time-left">
                <?php echo $time ?>
              </div>
            </div>
          </div>
        </div>

        <br>

      <?php } else { ?>
        <div class="row">

          <div class="col-lg-12">
            <div class="float-right dialog">
              <?php echo $message ?>
              <div class="time-right">
                <?php echo $time ?>
              </div>
            </div>
          </div>
        </div>

        <br>


    <?php }
    } ?>

    <br>
    <br>
    <br>

    <form method="POST" action="chatDatabase.php">

      <div class="row" id="bottom">

        <div class="col-lg-8 type">
          <textarea class="txta" rows="1" id="note" name="note" placeholder="Text Message"></textarea>

          <input type="text" id="dateTime" name="dateTime" value="<?php
                                                                  date_default_timezone_set('Asia/Colombo');
                                                                  echo date('Y-m-d H:i:s'); ?>" hidden>
          <input type="text" id="from_id" name="from_id" value="<?php echo $from_id ?>" hidden>
          <input type="text" id="to_id" name="to_id" value="<?php echo $to_id ?>" hidden>

        </div>
        <div class="col-lg-4 submit">
          <input type="submit" type="button" class="btn btn-primary" value="send">
        </div>


      </div>

    </form>
    <input type="submit" type="button" class="btn btn-primary down" value="go down" onclick="moveWin();">

  </div>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script src='https://css-tricks.com/examples/TextareaTricks/js/autoresize.jquery.min.js' type="75171d61f06c8aed63b3e191-text/javascript"></script>

  <script>
    let textareas = document.querySelectorAll('.txta'),
      hiddenDiv = document.createElement('div'),
      content = null;

    for (let j of textareas) {
      j.classList.add('txtstuff');
    }

    hiddenDiv.classList.add('txta');

    hiddenDiv.style.display = 'none';
    hiddenDiv.style.whiteSpace = 'pre-wrap';
    hiddenDiv.style.wordWrap = 'break-word';

    for (let i of textareas) {
      (function(i) {
        i.addEventListener('input', function() {

          i.parentNode.appendChild(hiddenDiv);

          i.style.resize = 'none';

          i.style.overflow = 'hidden';

          content = i.value;

          content = content.replace(/\n/g, '<br>');

          hiddenDiv.innerHTML = content + '<br style="line-height: 3px;">';

          hiddenDiv.style.visibility = 'hidden';
          hiddenDiv.style.display = 'block';
          i.style.height = hiddenDiv.offsetHeight + 'px';

          hiddenDiv.style.visibility = 'visible';
          hiddenDiv.style.display = 'none';
        });
      })(i);
    }
  </script>
</body>

</html>