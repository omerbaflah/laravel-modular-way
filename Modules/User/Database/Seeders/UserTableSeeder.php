<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use Modules\User\Entities\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Log::alert('inside user table seeder');

        User::factory()->count(10)->create();

        User::factory()->create([
            'email' => 'admin@admin.com',
        ]);
    }
}
