<?php

namespace Backpack\Settings\database\seeds;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    private $settings;

    /**
     * SettingsTableSeeder constructor.
     * @param $settings
     */
    public function __construct($settings)
    {
        $this->settings = [
            [
                'key'           => 'motto',
                'name'          => 'Motto',
                'description'   => 'Website motto',
                'value'         => 'this is the value',
                'field'         => '{"name":"value","label":"Value", "title":"Motto value" ,"type":"textarea"}',
                'active'        => 1,

            ]
        ];
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $setting) {
            $exists = DB::table('settings')->where('key', $setting->key)->count();
            if($exists || !$setting['key']) // continue if setting already exists
                continue;
            DB::table('settings')->insert($setting);
        }
    }
}
