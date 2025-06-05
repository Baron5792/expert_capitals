<?php
    // Connect to your database
    include __DIR__ . "/../database.php";

    // Get the search query
    $query = $_POST['query'];

    // Fetch related title names from the search table
    $sql = "SELECT title, link FROM search WHERE title LIKE '%$query%'";
    $result = mysqli_query($connection, $sql);

    // Display the search results
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
        echo '<a class="text-decoration-none small text-info" href="' . $row['link'] . '">' . $row['title'] . '</a><br>';
        }
    } else {
        echo 'No results found';
    }


