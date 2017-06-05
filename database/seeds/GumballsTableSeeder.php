<?php

use App\Gumball;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GumballsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();

        $this->call(GumballsTableAoluweisBladeFactionSeeder::class);
        $this->call(GumballsTableCanasEnlightenmentFactionSeeder::class);
        $this->call(GumballsTableAbyssRoarFactionSeeder::class);
        $this->call(GumballsTableRangersSongFactionSeeder::class);
    }

    /**
     * Truncate the database table.
     *
     * @return void
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Gumball::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
