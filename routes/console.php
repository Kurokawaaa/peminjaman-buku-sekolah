<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

use Illuminate\Support\Facades\Schedule;
use Illuminate\Support\Facades\Mail;
use App\Models\Peminjaman;

Schedule::call(function () {
    $lateBorrowings = Peminjaman::where('batas_waktu', '<', now())
        ->where('status', 'dipinjam')   // belum dikembalikan
        ->where('is_notified', false)   // belum dikirim email
        ->get();

    foreach ($lateBorrowings as $borrowing) {
        Mail::raw("Halo {$borrowing->nama_peminjam}, peminjaman buku '{$borrowing->nama_buku}' sudah melewati batas waktu {$borrowing->batas_waktu->format('d-m-Y H:i')}!", function ($message) use ($borrowing) {
            $message->to($borrowing->email)
                    ->subject('Peminjaman Buku Terlambat');
        });

        // update supaya email tidak terkirim berulang
        $borrowing->update(['is_notified' => true]);
    }
})->everyMinute();

