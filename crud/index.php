<?php
#  STEP 1: WRITING A QUERY

// include "db_connect.php"; #gives a warning
require "db_connect.php"; #gives an error


$sql = "SELECT * FROM `products`";


#  STEP 2: RUNNING THE QUERY

#go btn to run the query - "go button in the browser!" - its bette to test it before in the browser, then using this syntax 
$result = mysqli_query($conn, $sql);

# both are for debugging only!
// echo "<pre>";
// var_dump($result);
// echo "</pre>";
// exit();

#  STEP 3: convert the result from mysqli_query to an associative array ... "fieldName" => actual value 
# -> AND THE PRINT IT
# after you run the query, you need to fetch it!

$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
// var_dump($rows);
// exit();

# you WRITE the query, you CLICK THE GO BUTTON and then you CONVERT


# if we have no results at all / no products in the database = "No products found"
# if I have a result = show them

$layout = "";

if (mysqli_num_rows($result) == 0) {
    $layout .= "<p>No results found</p>";
} else {
    foreach ($rows as $value) {
        $layout .= "<div class='card' style='width: 18rem;'>
                            <img src='$value[picture]' class='card-img-top' alt='...'>
                            <div class='card-body'>
                                <h5 class='card-title'>$value[name]</h5>
                                <a href='#' class='btn btn-primary'>Go somewhere</a>
                            </div>
                        </div>";
    }
}


# now we use a for each to print it:


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>



    <div class="container">
        <h1>All products</h1>
        <div class="row row-cols-3">
            <?= $layout ?>
        </div>
    </div>

</body>

</html>