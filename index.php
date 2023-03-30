<?php
    require_once 'common-functions.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        <h1>Message Board</h1>
    </header>

    <main>

        <section id="new-message">
            <h2>New Message...</h2>

            <form method="POST" action="process-new-message.php">
                <label>Your Name</label>
                <input name="author" type="text" required>

                <label>Message Title</label>
                <input name="title" type="text" required>

                <label>Message Body</label>
                <textarea name="body" required></textarea>

                <input type="submit" value="Post Message">
            </form>

        </section>


<?php

    $sql = 'SELECT *
            FROM messages
            ORDER BY datetime DESC';

    $messages = getRecords( $sql );

    echo '<section id="message-list">';

    echo '<h2>List of Messages...</h2>';

    foreach( $messages as $message ) {
        echo '<div class="message">';
        echo   '<header>';
        echo     '<h3>'.$message['title'].'</h3>';
        echo   '</header>';

        echo   '<p>'.$message['body'].'</p>';

        echo   '<footer>';
        echo     '<p>Posted by '.$message['author'];
        echo     ' on '.niceDate( $message['datetime'] );
        echo     ' at '.niceTime( $message['datetime'] ).'</p>';
        echo   '</footer>';
        echo '</div>';
    }

    echo '</section>';

?>

    </main>

</body>

</html>