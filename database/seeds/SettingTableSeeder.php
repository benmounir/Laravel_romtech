<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingTableSeeder extends Seeder
{
    public function __construct()
    {
        
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'site_name' => 'RomTech',
            'address' => 'Marrakech',
            'contact_number' => '+212 678 878 343',
            'contact_email' => 'example@site.come'
        ]);
    }
}
