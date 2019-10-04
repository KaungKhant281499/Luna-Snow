<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            [
                ['id' => 1, 'name' => 'admin', 'guard_name' => 'web' ],
                ['id' => 2, 'name' => 'shop', 'guard_name' => 'web' ],
                ['id' => 3, 'name' => 'customer', 'guard_name' => 'web' ],
            ]
        );
    }
}
