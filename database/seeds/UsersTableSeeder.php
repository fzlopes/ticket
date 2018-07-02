<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->delete();

        $user = User::create([
            'name' => 'Marcos Echevarria',
            'email' => 'quinho@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => '1985-06-07',
            'first_access' => true,
            'is_active' => true
        ]);

        $user->roles()->attach(Role::all()->where('role', 'SUPER_ADMIN')->first()->value('id'));

        $this->command->info('The superadmin Marcos was created.');

        $user = User::create([
            'name' => 'Fábio Lopes',
            'email' => 'fzlopes1@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => '1980-10-22',
            'first_access' => true,
            'is_active' => true
        ]);

        $user->roles()->attach(Role::all()->where('role', 'SUPER_ADMIN')->first()->value('id'));

        $this->command->info('The superadmin Fábio was created.');

        $user = User::create([
            'name' => 'Augusto Muniz',
            'email' => 'augustomuniz@gmail.com',
            'password' => bcrypt('123456'),
            'birth_date' => '1985-09-30',
            'first_access' => true,
            'is_active' => true
        ]);

        $user->roles()->attach(Role::all()->where('role', 'SUPER_ADMIN')->first()->value('id'));

        $this->command->info('The superadmin Augusto was created.');

    }
}
