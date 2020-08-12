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
        $user->password = '123456';
        $user->email = 'im.wmkong@gmail.com';
        $user->save();
    }
}
