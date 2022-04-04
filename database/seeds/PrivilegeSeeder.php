<?php

use Illuminate\Database\Seeder;
use App\Models\Backend\Privilege;

class PrivilegeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data['privilege'] = 'Super-Admin';
        $data['status'] = 1;
        $data2['privilege'] = 'User';
        $data2['status'] = 1;

        Privilege::create($data);
        Privilege::create($data2);
    }
}
