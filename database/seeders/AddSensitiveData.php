<?php

namespace Database\Seeders;

use App\Imports\SensitiveDataImport;
use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;

class AddSensitiveData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Excel::import(new SensitiveDataImport(1703), storage_path('app/public/sensitive/andijan.xls'));
        Excel::import(new SensitiveDataImport(1706), storage_path('app/public/sensitive/bukhara.xls'));
        Excel::import(new SensitiveDataImport(1708), storage_path('app/public/sensitive/jizzakh.xls'));
        Excel::import(new SensitiveDataImport(1710), storage_path('app/public/sensitive/kashkadarya.xls'));
        Excel::import(new SensitiveDataImport(1733), storage_path('app/public/sensitive/khorezm.xls'));
        Excel::import(new SensitiveDataImport(1714), storage_path('app/public/sensitive/namangan.xls'));
        Excel::import(new SensitiveDataImport(1712), storage_path('app/public/sensitive/navoiy.xls'));
        Excel::import(new SensitiveDataImport(1718), storage_path('app/public/sensitive/samarkand.xls'));
        Excel::import(new SensitiveDataImport(1724), storage_path('app/public/sensitive/sirdarya.xls'));
        Excel::import(new SensitiveDataImport(1722), storage_path('app/public/sensitive/surkhandarya.xls'));
        Excel::import(new SensitiveDataImport(1726), storage_path('app/public/sensitive/tashkent_city.xls'));
        Excel::import(new SensitiveDataImport(1727), storage_path('app/public/sensitive/tashkent_region.xls'));
        Excel::import(new SensitiveDataImport(1700), storage_path('app/public/sensitive/Report.xlsx'));
    }
}
