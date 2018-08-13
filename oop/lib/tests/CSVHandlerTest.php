<?php
/**
* handle CSV test related all activities
*/
class CSVHandlerTest {
    public function testSaveDataIntoCSV()
    {
	$data = array('name' => 'Alauddin', 'age' => '27', 'bg' => 'A');
	$saveStatus = $csv->setDir('documents')->saveDataIntoCSV($data)->isFileExists();
        if($saveStatus) {
	    echo "Data saving test ok";
        } else {
	    echo "Data saving test failed";
        }
    }
}

$csvTest = new CSVHandlerTest();
$csvTest->testSaveDataIntoCSV();
