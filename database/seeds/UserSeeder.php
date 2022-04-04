<?php

use Illuminate\Database\Seeder;
use App\Models\Backend\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['privilege'] = 1;
        $data['first_name'] = 'admin';
        $data['username'] = 'admin';
        $data['email'] = 'admin@admin.com';
        $data['password'] = bcrypt('admin002');
        $data['image'] = 'userseed.png';

        $data2['privilege'] = 2;
        $data2['first_name'] = 'User';
        $data2['username'] = 'user';
        $data2['email'] = 'User@user.com';
        $data2['password'] = bcrypt('user002');
        $data2['image'] = 'userseed.png';
        User::create($data);
        User::create($data2);

        \Illuminate\Support\Facades\DB::table('privilege_user')->insert([

            'user_id' => 1,
            'privilege_id' => 1,
            'created_at' => \Illuminate\Support\Carbon::now()->toDateTimeString(),
            'updated_at' => \Illuminate\Support\Carbon::now()->toDateTimeString()
        ]);
        \Illuminate\Support\Facades\DB::table('privilege_user')->insert([

            'user_id' => 2,
            'privilege_id' => 2,
            'created_at' => \Illuminate\Support\Carbon::now()->toDateTimeString(),
            'updated_at' => \Illuminate\Support\Carbon::now()->toDateTimeString()
        ]);

    }
}
