<?php

use Illuminate\Database\Seeder;

class EmployeeTableSeeder extends Seeder {
  /**
  * DB table name
  *
  * @var string
  */
  protected $table;

  /**
  * CSV filename
  *
  * @var string
  */
  protected $filename;
  public function __construct(){
    $this->table = 'employees';
    $this->filename = base_path('database/seeds/csv/employee_data.csv');
  }
  public function run(){
    $delete = DB::table($this->table)->delete();
    if(!file_exists($this->filename))
        {
            echo ('The Employee file dosmt not exists');
        }
        else{
            $seedData = $this->seedFromCSV($this->filename, ',');
            if($seedData){
                 DB::table($this->table)->insert($seedData);
            }
            else{
                echo 'No data available in file';
            }
        };
  }



  /**
   * Collect data from a given CSV file and return as array
   *
   * @param $filename
   * @param string $deliminator
   * @return array|bool
   */
  private function seedFromCSV($filename, $delimitor = ",")
  {
      if(!file_exists($filename) || !is_readable($filename))
      {
          return FALSE;
      }

      $header = NULL;
      $data = array();

      if(($handle = fopen($filename, 'r')) !== FALSE)
      {
          while(($row = fgetcsv($handle, 1000, $delimitor)) !== FALSE)
          {
              if(!$header) {
                  $header = $row;
              } else {
                  $data[] = array_combine($header, $row);
              }
          }
          fclose($handle);
      }

      return $data;
  }
}
