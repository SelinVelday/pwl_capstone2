<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\SubEvent;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data lama
        Event::truncate();
        SubEvent::truncate();

        // Cari user panitia
        $committee = User::where('role', 'committee')->first();

        // Buat Event 1 (dengan sub-event)
        $event1 = Event::create([
            'name' => 'Seminar Nasional AI 2025',
            'date' => '2025-08-10',
            'time' => '09:00:00',
            'location' => 'Gedung Serbaguna Papilaya',
            'speaker' => 'Dr. Elara Vance',
            'poster_path' => null,
            'registration_fee' => 150000.00,
            'max_participants' => 100,
            'description' => 'Seminar mendalam tentang masa depan Artificial Intelligence dan dampaknya pada industri.',
            'created_by' => $committee->id,
        ]);
        
        // Buat Sub-Event untuk Event 1
        SubEvent::create([
            'event_id' => $event1->id,
            'name' => 'Sesi 1: Pengenalan Deep Learning',
            'date' => '2025-08-10',
            'start_time' => '10:00:00',
            'end_time' => '12:00:00',
            'location' => 'Ruang A',
            'speaker' => 'Prof. Kael',
            'max_participants' => 50,
        ]);

        SubEvent::create([
            'event_id' => $event1->id,
            'name' => 'Sesi 2: Etika dalam AI',
            'date' => '2025-08-10',
            'start_time' => '13:00:00',
            'end_time' => '15:00:00',
            'location' => 'Ruang B',
            'speaker' => 'Dr. Lyra',
            'max_participants' => 50,
        ]);

        // Buat Event 2
        Event::create([
            'name' => 'Workshop Public Speaking',
            'date' => '2025-09-05',
            'time' => '13:00:00',
            'location' => 'Auditorium Papilaya',
            'speaker' => 'Aria Chen, M.I.Kom',
            'registration_fee' => 75000.00,
            'max_participants' => 50,
            'description' => 'Tingkatkan kepercayaan diri dan kemampuan berbicara di depan umum Anda.',
            'created_by' => $committee->id,
        ]);

        // Buat Event 3 (Gratis)
        Event::create([
            'name' => 'Bazaar & Pameran Karya Mahasiswa',
            'date' => '2025-09-20',
            'time' => '10:00:00',
            'location' => 'Lapangan Utama Kampus',
            'speaker' => 'Internal Mahasiswa',
            'registration_fee' => 0.00,
            'description' => 'Lihat dan beli karya-karya inovatif dari mahasiswa Papilaya University.',
            'created_by' => $committee->id,
        ]);
    }
}