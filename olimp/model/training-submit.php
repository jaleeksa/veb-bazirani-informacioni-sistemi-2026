<?php
if ($_SESSION['loggedin'] != 1) {
    header('location: ./index.php?model=404');
    exit;
}

if ($_POST) {

    $training_title = trim(strip_tags($_POST['training_title']));
    $training_text  = trim(strip_tags($_POST['training_text']));
    $training_price = trim(strip_tags($_POST['training_price']));

    if (empty($training_title) || empty($training_text) || empty($training_price)) {
        header('location: ./index.php?model=training-submit&error=empty');
        exit;
    }

    // 1. INSERT FIRST (without image)
    $sql = "INSERT INTO `training`
            (`training_title`, `training_text`, `training_price`)
            VALUES
            ('$training_title', '$training_text', '$training_price')";

    $result = mysqli_query($db, $sql);

    if (!$result) {
        die("INSERT ERROR: " . mysqli_error($db));
    }

    $new_id = mysqli_insert_id($db);

    $image_path = '';

    // 3. HANDLE IMAGE USING NEW ID
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {

        $file_tmp  = $_FILES['image']['tmp_name'];
        $file_ext  = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if ($file_ext === 'webp') {

            $new_filename = $new_id . '.webp';
            $destination  = "./public/images/" . $new_filename;

            if (move_uploaded_file($file_tmp, $destination)) {
                $image_path = "/olimp/public/images/" . $new_filename;
            }
        }
    }

    // 4. UPDATE ROW WITH IMAGE
    if (!empty($image_path)) {
        $update_sql = "UPDATE training
               SET training_image = '$image_path'
               WHERE training_id = $new_id";

        $result = mysqli_query($db, $update_sql);
    }

    header('location: ./index.php?model=training');
    exit;
}

// Load the form view
$view_filename = './view/training-submit.php';
