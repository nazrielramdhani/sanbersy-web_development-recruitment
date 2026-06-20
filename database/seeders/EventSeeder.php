<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('events')->insert([
            ['title' => 'Workshop Laravel 2026', 'description' => 'Workshop pengenalan Laravel untuk pemula hingga menengah.', 'location' => 'Gedung Cyber 1, Lantai 3, Ruang Seminar A, Jl. Sudirman No.45, Jakarta Pusat', 'event_date' => '2026-07-10 09:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Seminar UI/UX Design', 'description' => 'Seminar desain antarmuka dan pengalaman pengguna modern.', 'location' => 'Aula Utama Universitas Bina Nusantara, Ruang 501, Jl. K.H. Syahdan No.9, Kemanggisan, Jakarta Barat', 'event_date' => '2026-07-15 13:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Hackathon Nasional 2026', 'description' => 'Kompetisi hackathon tingkat nasional untuk para developer.', 'location' => 'Jakarta Convention Center, Hall B, Jl. Gatot Subroto, Senayan, Jakarta Selatan', 'event_date' => '2026-07-20 08:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Talkshow Karir IT', 'description' => 'Diskusi karir di bidang teknologi bersama para praktisi.', 'location' => 'Co-Working Space GoWork, Lantai 2, Ruang Diskusi, Pacific Century Place, SCBD, Jakarta Selatan', 'event_date' => '2026-07-25 10:00:00', 'created_at' => now(), 'updated_at' => now()],
            ['title' => 'Bootcamp React Native', 'description' => 'Bootcamp intensif pengembangan aplikasi mobile dengan React Native.', 'location' => 'Cleancode Learning Center, Ruang Lab Komputer 2, Jl. TB Simatupang No.18, Cilandak, Jakarta Selatan', 'event_date' => '2026-08-01 09:00:00', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
