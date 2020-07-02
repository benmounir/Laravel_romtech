<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
            'name' => 'admin',
            'email' => 'admin@ex.com',
            'password' => bcrypt('password'),
            'admin' => 1
        ]);

        App\Profile::create([

            'user_id' => $user->id,
            'about' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore nobis in nulla reprehenderit natus ab corrupti debitis, magnam quas veritatis doloremque quo optio inventore voluptates autem officia soluta, quod commodi.',
            'facebook' => 'facebook.com',
            'avatar' => 'uploads/avatars/img1.jpg',
            'youtube' => 'youtube.com '
        ]);
    }
}
