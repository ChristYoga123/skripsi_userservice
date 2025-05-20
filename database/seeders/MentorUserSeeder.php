<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class MentorUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Dapatkan role mentor
        $mentorRole = Role::where('name', 'mentor')->first();

        if (!$mentorRole) {
            $this->command->error('Role mentor tidak ditemukan!');
            return;
        }

        // Buat 10 user dengan role mentor
        User::factory(10)->create()->each(function ($user) use ($mentorRole) {
            $user->roles()->attach($mentorRole->id);
        });

        $this->command->info('10 user mentor berhasil dibuat!');
    }
}
