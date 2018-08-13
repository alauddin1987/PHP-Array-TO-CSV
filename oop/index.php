<?php
spl_autoload_register(function($className) {
    $classDir = "lib/classes/{$className}.php";
    if(is_file($classDir)) {
	    require_once($classDir);
    }
});

try {
    $csv = new CSVHandler();
    $data = array('name' => 'Alauddin', 'age' => '27', 'bg' => 'A');
    $csv->setDir('documents');
    $csv->saveDataIntoCSV($data);
    $data = $csv->getCSVData();
    $saveStatus = $csv->isFileExists();
    if($saveStatus) {
	echo "Data saved successfully!";
    } else {
	echo "Can not save Data";
    }
} catch(Exception $e) {
    echo $e->getMessage();
}

