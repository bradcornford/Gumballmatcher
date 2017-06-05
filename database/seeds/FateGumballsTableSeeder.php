<?php

use App\Fate;
use App\FateGumball;
use App\Gumball;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FateGumballsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();
    }

    /**
     * Truncate the database table.
     *
     * @return void
     */
    public function truncate()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        FateGumball::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    /**
     * Run a externally a database seed.
     *
     * @var string $fate
     * @var array  $gumballs
     *
     * @return void
     */
    public static function runExternally($fate, array $gumballs)
    {
        if (in_array(null, $gumballs)) {
            return;
        }

        $fate = Fate::where('key', '=', $fate)
            ->first();

        if (!$fate->count()
        ) {
            die('No fate found with the key "' . $fate . '".');
        }

        foreach ($gumballs as $gumball) {
            $gumball = Gumball::where('key', '=', $gumball)
                ->first();

            if (!$gumball->count()) {
                die('No gumball found with the key "' . $gumball . '".');
            }

            DB::table('fate_gumballs')->updateOrInsert(
                [
                    'fate_id' => $fate->id,
                    'gumball_id' => $gumball->id,
                ],
                array_merge(
                    [
                        'fate_id' => $fate->id,
                        'gumball_id' => $gumball->id,
                    ],
                    [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]
                )
            );
        }
    }
}
