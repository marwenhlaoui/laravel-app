<?php

use Illuminate\Database\Seeder;
use App\Model\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin= new User();
        $admin->first_name='yosra';
        $admin->last_name="mani";
        $admin->email="mani@yo.fr";
        $admin->password=bcrypt("123456");
        $admin->slug='yosraMn';
        $admin->role=true;
        $admin->phone="123456789";
        $admin->actif=true;
        $admin->save();



    }
}
