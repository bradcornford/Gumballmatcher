<?php

use App\Fate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ((boolean) env('DB_TRUNCATE', false)) {
            $this->truncate();
        }

        $this->call(FatesTableNormalGroupSeeder::class);
        $this->call(FatesTableIntimacyGroupSeeder::class);
        $this->call(FatesTableLegacyGroupSeeder::class);
        $this->call(FatesTableArchRivalGroupSeeder::class);
        $this->call(FatesTableTheLoversGroupSeeder::class);
    }

    /**
     * Truncate the database table.
     *
     * @return void
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Fate::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
