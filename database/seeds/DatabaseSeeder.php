<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);


        $admin = (new \App\Models\Auth\Administrator())->create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => Hash::make('admin'),
            'remember_token' => Str::random(10),
        ]);

        (new \App\Models\Auth\user())->create([
            'name' => 'User',
            'email' => 'user@user.com',
            'email_verified_at' => now(),
            'password' => Hash::make('user'),
            'remember_token' => Str::random(10),
        ]);

        foreach (['super_admin', 'administrator', 'moderator', 'company'] as $roles) {

            (new \App\Models\UserRoles())->create([
                'name' => $roles,
                'permissions' => []
            ]);
        }

        $role = (new \App\Models\UserRoles())->find(1);

        $admin->roles()->attach($role);



    }
}
