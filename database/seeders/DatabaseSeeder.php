<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Pet;
use App\Models\Tutor;
use App\Models\VaccineRecord;
use App\Models\Vet;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $admin = Admin::factory(1)->create();
        Vet::factory(10)->create();
        Tutor::factory(5)
            ->hasPets(9)
            ->create();
        VaccineRecord::factory(50)
            ->create();
    }
}
