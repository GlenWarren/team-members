<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $url = 'https://dev.popcomms.com/recruitment/2024/core-fullstack/users.json';
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            foreach ($data as $user_data) {
                $user_data['image_url'] = $user_data['imageUrl'];
                unset($user_data['imageUrl']);
                $user = new User($user_data);
                $user->save();
            }
        }
    }
}
