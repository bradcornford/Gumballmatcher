<?php

use App\Alliance;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();

        $users = [
            [
                'name' => 'Brad',
                'email' => 'bradcornford@hotmail.co.uk',
                'username' => 'cornfordb69',
                'password' => bcrypt('P4ssw0rd!'),
            ],
        ];

        $alliance = Alliance::where('key', '=', 'SKYPR')->first();

        foreach ($users as $user) {
            User::updateOrCreate(
                $user,
                array_merge(
                    $user,
                    [
                        'alliance_id' => $alliance->id
                    ]
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
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
