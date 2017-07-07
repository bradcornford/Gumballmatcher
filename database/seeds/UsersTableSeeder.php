<?php

use App\Alliance;
use App\Role;
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
        if ((boolean) env('DB_TRUNCATE', false)) {
            $this->truncate();
        }

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@fatelinks.co.uk',
                'username' => 'admin',
                'password' => '$2y$10$kYnBpRxFRO3foq7NjkPLEOlj33zn7PoI2WsUege69ow.tutb1k9NO',
            ],
        ];

        $role = Role::where('key', '=', Role::KEY_ADMIN)->first();

        foreach ($users as $user) {
            User::updateOrCreate(
                $user,
                array_merge(
                    $user,
                    [
                        'role_id' => $role->id
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
