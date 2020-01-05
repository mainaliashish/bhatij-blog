<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
        	'site_name'		=> '𝕭𝖍𝖆𝖙𝖎𝖏 𝕭𝖑𝖔𝖌',
        	'address'		=> 'Kathmandu, Nepal',
        	'contact_number' => '+977-9844639716',
            'contact_email'  => 'ashishmainalee@gmail.com',
            'facebook'  => 'fb.com/mainaleeashish',
            'instagram'  => 'instagram.com/mainaleeashish',
            'about'         => 'Lorem ipsum sunt excepteur minim eiusmod ad consectetur ut aliqua irure proident sed dolore dolore pariatur officia in ut id incididunt ea do.',
        ]);
    }
}
