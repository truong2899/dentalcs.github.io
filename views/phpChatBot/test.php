<?php

require('../phpexcel/Classes/PHPExcel.php');
include('database.inc.php');
$tr = new getData();
$con = $tr->ketnoi_csdl();

if (isset($_POST['btnExport'])) {
    $objExcel = new PHPExcel;
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('10A1');

    $rowCount = 1;
    $sheet->setCellValue('A'.$rowCount, 'Họ tên');
    

    $result = mysqli_query($con, "SELECT *from user ");
    while ($row = mysqli_fetch_array($result)) {
        $rowCount++;
        $sheet->setCellValue('A'.$rowCount, $row['fullname']);
    }

    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $filename = 'DentalCS.xlsx';
    $objWriter->save($filename);

    header('Content-Disposition: attachment; filename="' . $filename . '"');
    header('Content-Type: application/vnd.openxmlformatsofficedocument.spreadsheetml.sheet');
    header('Content-Length: ' . filesize($filename));
    header('Content-Transfer-Encoding: binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($filename);
    return;
}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Export data</title>
	<link rel="stylesheet" href="">
</head>
<body>
	<form method="POST">
		<button name="btnExport" type="submit">Xuất file</button>
	</form>
</body>
</html>