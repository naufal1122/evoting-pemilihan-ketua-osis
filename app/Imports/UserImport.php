<?php

namespace App\Imports;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
       /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        // Periksa apakah semua kolom yang diperlukan ada
        if (isset($row['username'], $row['nama_panjang'], $row['kelas'], $row['nis'])) {
            return new User([
                'username' => $row['username'],
                'nama_panjang' => $row['nama_panjang'],
                'kelas' => $row['kelas'],
                'password' => $row['nis'], // Pastikan ini sesuai
                'role' => 'siswa',
            ]);
        }
    }
}


