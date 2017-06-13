<?php

use App\Alliance;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AlliancesTableSeeder extends Seeder
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

        $alliances = [
            [
                'name' => 'Sky Pirates',
                'key' => 'SKYPR',
                'level' => 11,
            ]
        ];

        foreach ($alliances as $alliance) {
            Alliance::updateOrCreate(
                $alliance,
                array_merge(
                    $alliance,
                    []
                )
            );
        }
    }

    /**
     * Truncate the database table.
     *
     * @return void
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Alliance::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
