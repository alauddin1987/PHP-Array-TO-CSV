<?php
/**
 * save the arrady data to a CSV file
 * @param array $dataArray
 * @throws Exception
 */
function saveArrayToCSV($dataArray)
{
    if (!is_array($dataArray) || count($dataArray) < 1) {
        throw new Exception('The data seems to be not an valid array set');
    }

    if (!is_dir('documents')) {
        mkdir('documents');
    }

    $fileWithPath = 'documents/myCSVData.csv';

    if (!is_file($fileWithPath)) {
        $file = fopen($fileWithPath, 'a');
        $headers = array_keys($dataArray);
	//save the file header once
        fputcsv($file, $headers);
    } else {
        $file = fopen($fileWithPath, 'a');
    }

    $rows = array_values($dataArray);
    //save the file data
    fputcsv($file, $rows);
}

// use the functions
try {
    $dataSet = ['name' => 'Alauddin', 'age' => '32', 'bg' => 'A(+)'];
    saveArrayToCSV($dataSet);
} catch (Exception $e) {
    echo $e->getMessage();
}

