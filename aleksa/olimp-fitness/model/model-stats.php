<?php

if (!auth_is_admin()) {
    core_redirect(FILE_ERROR404);
}

/* AJAX zahtev */
if ($_POST) {
    include_once(DIR_CORE . 'functions-db.php');   // sada bi trebalo da radi
    
    $_db = db_connect();

    $dateFrom = $_POST['dateFrom'] ?? date('Y-m-01');
    $dateTo   = $_POST['dateTo']   ?? date('Y-m-t');

    // BAR CHART
    $sql = "SELECT 
                DATE_FORMAT(m.start_date, '%Y-%m') AS mesec,
                COUNT(m.membership_id) AS broj_prodatih,
                SUM(t.price) AS ukupan_prihod
            FROM memberships m
            JOIN trainings t ON m.training_id = t.training_id
            WHERE m.start_date BETWEEN ? AND ?
            GROUP BY mesec
            ORDER BY mesec ASC";

    $stmt = mysqli_prepare($_db, $sql);

        // ✅ 2. NOVI UPIT (pie chart)
    $sqlPie = "SELECT 
                    t.title AS trening,
                    COUNT(m.membership_id) AS broj_clanarina
                FROM memberships m
                JOIN trainings t ON m.training_id = t.training_id
                WHERE m.start_date BETWEEN ? AND ?
                GROUP BY t.training_id
                ORDER BY broj_clanarina DESC";

    $stmtPie = mysqli_prepare($_db, $sqlPie);

    $sqlTable = "SELECT   
                    u.username,
                    t.title,
                    t.price,
                    t.deleted_at,
                    m.start_date
                FROM memberships m
                JOIN users u ON m.user_id = u.user_id
                JOIN trainings t ON m.training_id = t.training_id
                WHERE m.start_date BETWEEN ? AND ?
                ORDER BY m.start_date ASC";

    $stmtTable = mysqli_prepare($_db, $sqlTable);

    $pieLabels = [];
    $pieData = [];
    $tableData = [];

    if ($stmtPie) {
        mysqli_stmt_bind_param($stmtPie, "ss", $dateFrom, $dateTo);
        mysqli_stmt_execute($stmtPie);
        $resultPie = mysqli_stmt_get_result($stmtPie);

        while ($row = mysqli_fetch_assoc($resultPie)) {
            $pieLabels[] = $row['trening'];
            $pieData[]   = (int)$row['broj_clanarina'];
        }

        mysqli_stmt_close($stmtPie);
    }

    if ($stmtTable) {
        mysqli_stmt_bind_param($stmtTable, "ss", $dateFrom, $dateTo);
        mysqli_stmt_execute($stmtTable);
        $resultTable = mysqli_stmt_get_result($stmtTable);

        while ($row = mysqli_fetch_assoc($resultTable)) {
            $tableData[] = [
                
                'username' => $row['username'],
                'title' => $row['title'],
                'price' => $row['price'],
                'deleted_at' => $row['deleted_at'],
                'start_date' => date('d-m-Y', strtotime($row['start_date'])),
            ];
        }

        mysqli_stmt_close($stmtTable);
    }

    
    if ($stmt) {

        
        mysqli_stmt_bind_param($stmt, "ss", $dateFrom, $dateTo);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        $labels = [];
        $prodato = [];
        $prihod = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['mesec'];
            $prodato[] = (int)$row['broj_prodatih'];
            $prihod[]  = (int)$row['ukupan_prihod'];
        }

        mysqli_stmt_close($stmt);


        


        db_close($_db);

        header('Content-Type: application/json');
        echo json_encode([
            "labels"  => $labels,
            "prodato" => $prodato,
            "prihod"  => $prihod,
            "pieLabels" => $pieLabels,
            "pieData" => $pieData,
            "tableData" => $tableData
        ]);
    } else {
        header('Content-Type: application/json');
        echo json_encode(["error" => "Greška u SQL upitu"]);
    }
    
    exit;
}

/* Normalan prikaz */
$_output['page-title'] = 'STATISTIKA PRODAJE ČLANARINA';
$_output['model-name'] = 'stats';
$_output['view-name'] = 'view-stats.php';

?>