<?php


// if (!auth_is_admin())
// 	core_redirect(FILE_ERROR404);


// if ($_POST) {
//     $dateFrom = $_POST['dateFrom'] ?? date('Y-m-01');
//     $dateTo   = $_POST['dateTo'] ?? date('Y-m-t');

//     $start = strtotime($dateFrom);
//     $end   = strtotime($dateTo);

//     $labels = [];
//     $data   = [];

// 	$sql = "SELECT COUNT(`prodaja_id`) AS `data`, DATE_FORMAT(`prodaja_datum`,'%Y-%m') AS `mesec`
// 			FROM `wbis_sales` 
// 			WHERE `prodaja_datum` BETWEEN '{$dateFrom}' AND '{$dateTo}'
// 			GROUP BY `mesec`";
// 	$result = mysqli_query($_db, $sql);
// 	while ($row = mysqli_fetch_assoc($result)) {
// 		$labels[] = $row['mesec'];
// 		$data[] = $row['data'];
// 	}

//     $output = json_encode([
//         "labels" => $labels,
//         "data"   => $data
//     ]);

//     //OVO SAM KOMENTARISAO JER NE ZELIM DA MI DAJE IZVESTAJE, ALI JE POTREBNO
//     //file_put_contents(time().'.txt', "$sql\n\n$output");

//     header('Content-Type: application/json');
//     echo $output;
//     exit;

// }


// $_output['page-title'] = 'Statistika';
// $_output['breadcrumbs'] = [];
// $_output['_error'] = $_error;
// $_output['_message'] = $_message;
// $_output['model-name'] = 'stats';
// $_output['view-name'] = 'view-stats.php';

?>