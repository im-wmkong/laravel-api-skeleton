<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 10)->create();

        $user = User::find(1);
        $user->name = 'KongWeiMin';
        $user->password = 'kwm672225801';
        $user->email = 'kwm672225801@gmail.com';
        $user->save();
    }
}
