<?php

use Illuminate\Database\Seeder;
use SistemaVentasLinea\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = "admin";
        $role->save();

        $role = new Role();
        $role->name = "user";
        $role->save();
    }
}
