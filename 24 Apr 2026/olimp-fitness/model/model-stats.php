<?php

/* Provera prava pristupa */
if (!auth_is_admin()) {
    exit; 
}

/* Ako je AJAX zahtev (POST) */
if ($_POST) {
    // Preuzimanje datuma ili postavljanje podrazumevanih (tekući mesec)
    $dateFrom = $_POST['dateFrom'] ?? date('Y-m-01');
    $dateTo   = $_POST['dateTo'] ?? date('Y-m-t');

    // Upit koji broji članarine po datumima u zadatom opsegu
    $sql = "SELECT start_date AS oznaka, COUNT(membership_id) AS vrednost
            FROM memberships
            WHERE start_date BETWEEN '{$dateFrom}' AND '{$dateTo}'
            GROUP BY start_date
            ORDER BY start_date ASC";

    $result = mysqli_query($_db, $sql);
    
    $labels = [];
    $data   = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $labels[] = $row['oznaka'];
        $data[]   = (int)$row['vrednost'];
    }

    echo json_encode([
        "labels" => $labels,
        "data"   => $data
    ]);
    
    exit;
}

/* Inicijalni prikaz stranice */
$_output['model-name'] = 'stats';
$_output['view-name'] = 'view-stats.php';
?>