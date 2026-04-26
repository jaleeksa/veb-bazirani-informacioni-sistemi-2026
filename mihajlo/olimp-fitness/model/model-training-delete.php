<?php

if ($_POST) {
    $confirmation = $_POST['confirmation'] ?? 0;
    
    if ($confirmation == 1) {
        
        // SOFT DELETE umesto pravog brisanja
        $sql = "UPDATE `trainings` 
                SET `deleted_at` = NOW() 
                WHERE `training_id` = ? 
                LIMIT 1";
        
        $stmt = mysqli_prepare($_db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $_id);
        
        if (mysqli_stmt_execute($stmt)) {
            // Opciono: obriši sliku sa servera
            // $image_path = DIR_IMAGES . "{$_id}.webp";
            // if (file_exists($image_path)) {
            //     @unlink($image_path);
            // }
            
            $_message[] = 'Trening je uspešno obrisan (sakriven).';
            core_redirect(FILE_INDEX . '?page=training');
        } else {
            $_error[] = 'Došlo je do greške prilikom brisanja treninga.';
        }
        
        mysqli_stmt_close($stmt);
    } else {
        core_redirect(FILE_INDEX . '?page=training');
    }
}

$training_model_name = 'training-delete';
$training_view_name = 'view-training-delete.php';

?>