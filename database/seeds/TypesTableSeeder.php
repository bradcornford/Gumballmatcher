<?php

use App\Group;
use App\Type;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TypesTableSeeder extends Seeder
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

        $types = [
            [
                'name' => 'Adventure',
                'key' => 'AD',
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/9/93/Adventure_Title.png/revision/latest',
            ],
            [
                'name' => 'Magic',
                'key' => 'MA',
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/c/c9/Magic_Title.png/revision/latest',
            ],
            [
                'name' => 'Melee',
                'key' => 'ME',
                'description' => null,
                'image' => 'https://vignette.wikia.nocookie.net/gdmaze/images/5/50/Melee_Title.png/revision/latest',
            ],
        ];

        foreach ($types as $type) {
            Type::updateOrCreate(
                $type,
                array_merge(
                    $type,
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
        Type::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
