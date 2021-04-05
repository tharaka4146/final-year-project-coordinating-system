    <?php

    //load.php
    //$index = $_GET['index'];
    //$index2 = 3;

    $connect = new PDO('mysql:host=localhost;dbname=fypcs', 'root', '');

    $data = array();

    //$query = "SELECT * FROM events where id = $index";
    $query = 'SELECT * FROM events';

    $statement = $connect->prepare($query);

    $statement->execute();

    $result = $statement->fetchAll();

    foreach ($result as $row) {
        $data[] = array(
            'id'   => $row['id'],
            'title'   => $row['title'],
            'name'   => $row['name'],
            'start'   => $row['start_event'],
            'end'   => $row['end_event'],
            'coordinator'   => $row['coordinator'],
            'examiner1'   => $row['examiner1'],
            'examiner2'   => $row['examiner2']
        );
    }

    echo json_encode($data);
