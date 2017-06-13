<?php

use App\Group;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GroupsTableSeeder extends Seeder
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

        $groups = [
            [
                'name' => 'Normal',
                'key' => 'NO',
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Intimacy',
                'key' => 'IN',
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Legacy',
                'key' => 'LE',
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'Arch Rival',
                'key' => 'AR',
                'description' => null,
                'image' => null,
            ],
            [
                'name' => 'The Lovers',
                'key' => 'TL',
                'description' => null,
                'image' => null,
            ],
        ];

        foreach ($groups as $group) {
            Group::updateOrCreate(
                $group,
                array_merge(
                    $group,
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
        Group::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
