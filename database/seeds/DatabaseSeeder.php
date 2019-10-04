<?php

use Illuminate\Database\Seeder;
use App\Bank;
use App\District;
use App\City;
use App\Township;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);
        $this->call([UsersTableSeeder::class]);

        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');
        $reader->setReadDataOnly(TRUE);
        $spreadsheet = $reader->load("SeedFile.xlsx");

        $worksheet = $spreadsheet->getActiveSheet();
        $highestRow = $worksheet->getHighestRow();
        $get_districts = array();
        $get_cities = array();
        $get_townships = array();

        $get_admjc = array();
        $get_admmc = array();
        $get_admvs = array();
        $get_admpp = array();

        for($row = 1; $row<=$highestRow;$row++){
            $get_districts[$row] = $worksheet->getCell('A'.$row)->getValue();

            $district_id= $worksheet->getCell('B'.$row)->getValue();
            $cityname = $worksheet->getCell('C'.$row)->getValue();
            $get_cities["$cityname"]=$district_id;

            $city_id = $worksheet->getCell('D'.$row)->getValue();
            $tspname= $worksheet->getCell('E'.$row)->getValue();
            $get_townships["$tspname"] = $city_id;

            $get_admjc[$row] = $worksheet->getCell('F'.$row)->getValue();
            $get_admmc[$row] = $worksheet->getCell('G'.$row)->getValue();
            $get_admvs[$row] = $worksheet->getCell('H'.$row)->getValue();
            $get_admpp[$row] = $worksheet->getCell('I'.$row)->getValue();
        }

        $banks = array(
            $get_admjc,
            $get_admmc,
            $get_admvs,
            $get_admpp,
        );

        foreach ($banks as $key => $bank){
            $Bank = new Bank();
            $Bank->cardno = $bank[1];
            $Bank->balance = $bank[2];
            $Bank->cvv = $bank[3];
            $Bank->exp = $bank[4];
            $Bank->type = $bank[5];
            $Bank->user_id = 1;
            $Bank->save();
        }

        $districts = array_unique($get_districts);
        foreach ($districts as $key => $district){
            $DBdistrict = new District();
            $DBdistrict->name = $district;
            $DBdistrict->save();
        }

        foreach($get_cities as $city => $dis_id){
            $DBcity = new City();
            $DBcity->name = $city;
            $DBcity->district_id = $dis_id;
            $DBcity->save();
        }
        
        foreach($get_townships as $township => $city_id){
            $DBtownship = new Township();
            $DBtownship->name = strtoupper($township);
            $DBtownship->city_id = $city_id;
            $DBtownship->save();
        }
    }
}
