<?php

namespace Modules\User\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->getOutput()->title('User Module Seeding');
        $this->command->getOutput()->title('Seeding Users');
        $this->call(class: UserTableSeeder::class);
        $this->command->getOutput()->progressStart( 10);
    }
}
