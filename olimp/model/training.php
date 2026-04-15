<?php

$training = [];

$sql = "SELECT * 
        FROM `training` 
        ORDER BY `training_id` ASC";     
$result = mysqli_query($db, $sql);

if (!$result) {
    echo "Query error: " . mysqli_error($db);   // Temporary - remove later
    exit;
}

while ($row = mysqli_fetch_assoc($result)) { 
    // Use the path we are now storing in the database
    if (!empty($row['training_image'])) {
        $row['thumb_filename'] = $row['training_image'];        // already has /olimp/public/images/...
    } 
    else {
        $row['thumb_filename'] = '/olimp/public/images/no-thumb.webp';   // fallback
    }
    $training[] = $row;
}
$view_filename = './view/training.php';

?>