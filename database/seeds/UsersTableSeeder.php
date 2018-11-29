<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $new = new User();
        $new->name = 'Admin';
        $new->email = 'admin@admin.com';
        $new->password = bcrypt('abc123');
        $new->save();

        factory(User::class, 30)->create();
    }
}
