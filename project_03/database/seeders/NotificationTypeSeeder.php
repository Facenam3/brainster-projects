<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NotificationType;
class NotificationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $notificationTypes = [
            1 => [ 'name' => 'email' ],
            2 => ['name' => 'platform' ],
            3 => ['name' => 'social_media' ],
        ];

        foreach($notificationTypes as $key => $value){
            NotificationType::create([
                'name' => $value['name']
            ]);
        }
    }
}
