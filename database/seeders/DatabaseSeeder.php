<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Apartment;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $file = public_path("/seeders/property-data".".csv");

        function import_CSV($filename, $delimiter = ','){

            if(!file_exists($filename) || !is_readable($filename))
              return false;
            $header = null;

            $data = array();
            if (($handle = fopen($filename, 'r')) !== false){
                while (($row = fgetcsv($handle, 1000, $delimiter)) !== false){
                  if(!$header)
                    $header = array_map('strtolower', $row);
                  else
                    $data[] = array_combine($header, $row);
                  }
                  fclose($handle);
                }
            return $data;
          }
          $records = import_CSV($file);
          
          $records = import_CSV($file);
          foreach ($records as $key => $record) {
            Apartment::create([
              'name' => $record['name'],
              'price' => $record['price'],
              'bedrooms' => $record['bedrooms'],
              'bathrooms' => $record['bathrooms'],
              'storeys' => $record['storeys'],
              'garages' => $record['garages'],
            ]);
          }
    }
}
