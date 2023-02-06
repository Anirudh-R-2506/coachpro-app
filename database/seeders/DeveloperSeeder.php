<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Enums\UserRole;
use App\Enums\AccountStatus;

class DeveloperSeeder extends Seeder
{

    public function users(){
    
    return [
            [
                'name' => 'Anirudh R',
                'email' => 'anirudh@eduhunt.co',
                'password' => Hash::make('password'),
                'role' => UserRole::SUPER_ADMIN,
                'phone' => '9361956014',
                'account_status' => AccountStatus::VERIFIED,
                'admin_remarks' => 'Developer account. Do not delete.',
            ],
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = $this->users();

        foreach($users as $user) {
            \App\Models\User::updateOrCreate($user);
            $this->command->info('User created: ' . $user['name']);
        }
    }
}