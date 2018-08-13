<?php
/**
* handels CSV related all activities
* @lastUpdated Alauddin 2018-07-06
*/
class CSVHandler {
    
    /**
    * holds the file name
    */
    private $fileName = 'myDocuments.csv';

    /**
    * holds documents directory path
    */
    private $dir;

    /**
    * set the document directory
    * @param string $dir
    */
    public function setDir($dir)
    {
        if(!is_dir($dir)) {
            mkdir($dir);
        }

	    $this->dir = $dir;
    }

    /**
    * save the array data into a CSV file
    * @param array $data
    * @throws Exception
    */
    public function saveDataIntoCSV($data = array())
    {
        if(!is_array($data) || count($data) <= 0) {
            throw new Exception('Please input a valid array data set');
        }

        $fileNameWithPath = $this->dir . '/' . $this->fileName;

        if(false === $this->isFileExists()) {
            $headers = array_keys($data);
            $file = fopen($fileNameWithPath, 'a');
            fputcsv($file, $headers);
        } else {
            $file = fopen($fileNameWithPath, 'a');
        }

        $row = array_values($data);
        fputcsv($file, $row);
	fclose($file);
    }

    /**
    * check is the file exists or not
    * @return bool
    */
    public function isFileExists()
    {
        $fileNameWithPath = $this->dir . '/' . $this->fileName;
        if(!is_file($fileNameWithPath)) {
            return false;
        }

        return true;
    }

    /**
    * get the CSV data
    * @return array
    */
    public function getCSVData()
    {
        $headers = null;
        $data = null;
        $fileNameWithPath = $this->dir . '/' . $this->fileName;
        $file = fopen($fileNameWithPath, 'r');

        while($rows = fgetcsv($file, 1000, ',')) {
            if(!$headers) {
                $headers = $rows;
            } else {
                $data = $rows;
            }
        }

	fclose($file);
        $dataSet = array_combine($headers, $data);

        return $dataSet;
    }
}

