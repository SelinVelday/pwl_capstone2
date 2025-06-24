<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Event;
use App\Models\Registration;
use App\Models\SessionRegistration;
use Illuminate\Support\Str;

class RegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data lama
        Registration::truncate();
        SessionRegistration::truncate();

        // Ambil data user dan event
        $budi = User::where('email', 'budi@papilaya.com')->first();
        $siti = User::where('email', 'siti@papilaya.com')->first();
        $charlie = User::where('email', 'charlie@papilaya.com')->first();
        
        $seminarAI = Event::where('name', 'Seminar Nasional AI 2025')->first();
        $workshopPS = Event::where('name', 'Workshop Public Speaking')->first();

        // Skenario 1: Budi mendaftar Seminar AI, sudah bayar, hadir, dan dapat sertifikat
        $regBudi = Registration::create([
            'user_id' => $budi->id,
            'event_id' => $seminarAI->id,
            'registration_code' => Str::upper(Str::random(10)),
            'payment_status' => 'paid',
            'payment_proof_path' => 'payment_proofs/dummy_proof_budi.jpg', // path contoh
            'attended' => true,
            'certificate_path' => 'certificates/dummy_cert_budi.pdf' // path contoh
        ]);
        
        // Budi juga mendaftar ke Sesi 1
        SessionRegistration::create([
            'registration_id' => $regBudi->id,
            'sub_event_id' => $seminarAI->subEvents()->first()->id, // ambil sesi pertama dari seminar AI
            'attended_session' => true
        ]);

        // Skenario 2: Siti mendaftar Seminar AI, sudah upload bukti, menunggu verifikasi
        Registration::create([
            'user_id' => $siti->id,
            'event_id' => $seminarAI->id,
            'registration_code' => Str::upper(Str::random(10)),
            'payment_status' => 'pending',
            'payment_proof_path' => 'payment_proofs/dummy_proof_siti.jpg', // path contoh
            'attended' => false,
            'certificate_path' => null
        ]);

        // Skenario 3: Charlie mendaftar Workshop Public Speaking, belum bayar
        Registration::create([
            'user_id' => $charlie->id,
            'event_id' => $workshopPS->id,
            'registration_code' => Str::upper(Str::random(10)),
            'payment_status' => 'pending',
            'payment_proof_path' => null,
            'attended' => false,
            'certificate_path' => null
        ]);
    }
}