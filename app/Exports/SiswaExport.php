<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return User::where('role', 'siswa')->get(['username', 'nama_panjang', 'kelas', 'nis']); // Sesuaikan kolom dengan yang ada di tabel
    }

    public function headings(): array
    {
        return [
            'Username',
            'Nama Panjang',
            'Kelas',
            'NIS', // Gantilah dengan label yang sesuai
        ];
    }
}
