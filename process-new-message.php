<?php

    require_once 'common-functions.php';

    echo '<pre>';
    print_r( $_POST );
    echo '</pre>';

    // Get the form data from the POST array
    $messageAuthor = $_POST['author'];
    $messageTitle  = $_POST['title'];
    $messageBody   = $_POST['body'];

    echo '<h2>Posting message...</h2>';

    $sql = 'INSERT INTO messages (author, title, body) VALUES (?, ?, ?)';

    modifyRecords( $sql, 'sss', [$messageAuthor, $messageTitle, $messageBody] );

    header( 'location: index.php' );
?>