<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->staffAccounts() as $account) {
            User::updateOrCreate(
                ['email' => $account['email']],
                $account['attributes']
            );
        }
    }

    /**
     * Daftar akun staf default (Administrator & Operator) untuk autentikasi
     * dan manajemen profil pada aplikasi KursusKu.
     *
     * @return array<int, array{email: string, attributes: array<string, mixed>}>
     */
    private function staffAccounts(): array
    {
        return [
            [
                'email' => 'rahmadillahi@example.com',
                'attributes' => [
                    'name'        => 'Rahmad Illahi',
                    'username'    => 'admin',
                    'password'    => Hash::make('Admin123!'),
                    'role'        => 'admin',
                    'status'      => 'aktif',
                    'phone'       => '081234567890',
                    'position'    => 'Administrator Sistem',
                    'institution' => 'KursusKu — UIN SMDD Bukittinggi',
                    'address'     => 'Jl. Gurun Aua, Kubang Putiah, Kec. Banuhampu, Kota Bukittinggi, Sumatera Barat 26181',
                ],
            ],
            [
                'email' => 'operator@kursusku.test',
                'attributes' => [
                    'name'        => 'Operator Akademik KursusKu',
                    'username'    => 'operator',
                    'password'    => Hash::make('Operator123!'),
                    'role'        => 'operator',
                    'status'      => 'aktif',
                    'phone'       => '081298765432',
                    'position'    => 'Operator Pendaftaran',
                    'institution' => 'KursusKu',
                    'address'     => 'Bukittinggi, Sumatera Barat',
                ],
            ],
        ];
    }
}