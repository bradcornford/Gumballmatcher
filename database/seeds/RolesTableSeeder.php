<?php

use App\Alliance;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();

        $roles = [
            [
                'name' => 'Admin',
                'key' => 'ADM',
            ],
            [
                'name' => 'Alliance Admin',
                'key' => 'AAD',
            ],
            [
                'name' => 'User',
                'key' => 'USE',
            ],
        ];

        foreach ($roles as $role) {
            Role::updateOrCreate(
                $role,
                array_merge(
                    $role,
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
        Role::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
