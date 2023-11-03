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
                'password' => bcrypt('password'),
                'role' => UserRole::SUPER_ADMIN,
                'phone' => '0000000002',
                'account_status' => AccountStatus::VERIFIED,
                'admin_remarks' => 'Developer account. Do not delete.',
            ],
            [
                'name' => 'Edu Hunt',
                'email' => 'helpline@eduhunt.co',
                'password' => bcrypt('password'),
                'role' => UserRole::SUPER_ADMIN,
                'phone' => '0000000001',
                'account_status' => AccountStatus::VERIFIED,
                'admin_remarks' => 'Admin account. Do not delete.',
            ],
            [
                'name' => 'Edu Hunt - Sales Team',
                'email' => 'sales@eduhunt.co',
                'password' => bcrypt('password'),
                'role' => UserRole::ADMIN,
                'phone' => '0000000003',
                'account_status' => AccountStatus::VERIFIED,
                'admin_remarks' => 'Admin account. Do not delete.',
            ],
        ];
    }

    public function examinations()
    {
        return [
            [
                'name' => 'JEE',
            ],
            [
                'name' => 'NEET',
            ],
            [
                'name' => '12th Board',
            ],
            [
                'name' => '10th Board',
            ],
            [
                'name' => 'CAT',
            ],
            [
                'name' => 'CLAT',
            ],
            [
                'name' => 'UPSC',
            ],
            [
                'name' => 'NDA',
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
        $users = $this->users();

        foreach($users as $user) {
            \App\Models\User::updateOrCreate($user);
            $this->command->info('User created: ' . $user['name']);
        }

        $examinations = $this->examinations();
        foreach($examinations as $examination) {
            \App\Models\Examinations::updateOrCreate($examination);
            $this->command->info('Examination created: ' . $examination['name']);
        }
    }
}
