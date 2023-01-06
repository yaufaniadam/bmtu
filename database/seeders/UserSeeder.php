<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory()
        //     ->has(
        //         Employee::factory()
        //             ->count(1)
        //             ->state(function (array $attributes, User $user) {
        //                 return ['email' => $user['email']];
        //             })
        //     )
        //     ->count(100)
        //     ->create();


        $users = [
            [
                'user_name' => 'uang.wari',
                'nama_lengkap' => 'Uang Wari, S.E., M.EK.',
                'alamat' => 'Mejing Lor Rt/Rw 004/001 Ambarketawang Gamping Sleman Yogyakarta',
                'tempat_lahir' => 'Kuningan',
                'tanggal_lahir' => date("Y/m/d", strtotime('22 january 1978')),
                'telepon' => '081904278277',
                'email' => 'uwangwari@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '1210 001',
                'role' => 4,
            ],
            [
                'user_name' => 'cahyo.halim',
                'nama_lengkap' => 'Cahyo Halim Istiqlal, SEI., M.EK',
                'alamat' => 'Pakem Rt/Rw 001/001 Tamanmartani Kalasan Sleman Yogyakarta',
                'tempat_lahir' => 'Gisting',
                'tanggal_lahir' => date("Y/m/d", strtotime('17 august 1986')),
                'telepon' => '085292197258',
                'email' => 'cahyohalimistiqlal@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0211 002',
                'role' => 4,
            ],
            [
                'user_name' => 'madlianti.siwi',
                'nama_lengkap' => 'Mardlianti Siwi Purnami, SEI',
                'alamat' => 'Kauman GM 1/321 Rt/Rw 046/012 Ngupasan Gondomanan Yogyakarta',
                'tempat_lahir' => 'Kulonprogo',
                'tanggal_lahir' => date("Y/m/d", strtotime('26 November 1982')),
                'telepon' => '0813126191354',
                'email' => 'siwiekalani_0909@yahoo.com',
                'jenis_kelamin' => 'P',
                'nip' => '0211 008',
                'role' => 4,
            ],
            [
                'user_name' => 'galuh.winatri',
                'nama_lengkap' => 'Galuh Winantri, S,Si',
                'alamat' => 'Jitengan Rt/Rw 007/050 Balecatur Gamping Sleman Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => date("Y/m/d", strtotime('22 December 1986')),
                'telepon' => '089669698221',
                'email' => 'belvashafwa@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '0712 021',
                'role' => 4,
            ],
            [
                'user_name' => 'fitri.nurhidayati',
                'nama_lengkap' => 'Fitri Nurhidayati.,S.E.',
                'alamat' => 'Parakan Kulon Rt/Rw 001/016 Sendangsari Minggir Sleman',
                'tempat_lahir' => 'Sleman',
                'tanggal_lahir' => date("Y/m/d", strtotime('6 August 1981')),
                'telepon' => '085743145046',
                'email' => 'phypyt383@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '0413 023',
                'role' => 4,
            ],
            [
                'user_name' => 'hasan.ismail',
                'nama_lengkap' => 'Hasan ismail, S.Pd',
                'alamat' => 'Perum GMA Mayungan Rt/Rw 007/000 Potorono Banguntapan Bantul ',
                'tempat_lahir' => 'Ciamis',
                'tanggal_lahir' => date("Y/m/d", strtotime('14 January 1992')),
                'telepon' => '082136470390',
                'email' => 'elhasan92@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0215 029',
                'role' => 4,
            ],
            [
                'user_name' => 'muhammad.itsnan',
                'nama_lengkap' => 'Muhammad Itsnan K, S.P',
                'alamat' => 'Trayeman Rt/Rw 002/000 Pleret Bantul',
                'tempat_lahir' => 'Bantul',
                'tanggal_lahir' => date("Y/m/d", strtotime('16 February 1990')),
                'telepon' => '085643998780',
                'email' => 'muhammaditsnan90@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0415 030',
                'role' => 4,
            ],
            [
                'user_name' => 'reza.hidha',
                'nama_lengkap' => 'Reza Hidha Taufiqurrahman, S.EI',
                'alamat' => 'Dukuh MJ 1/1631 Rt/Rw 082/018 Gedongkiwo Mantrijeron Yogyakarta',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => date("Y/m/d", strtotime('16 September 1993')),
                'telepon' => '089626365038',
                'email' => 'rezabmtumy@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '1017 037',
                'role' => 4,
            ],
            [
                'user_name' => 'rahmawan.dwi',
                'nama_lengkap' => 'Rahmawan Dwi Atmaja, S.Kom',
                'alamat' => 'Brayut Rt/Rw 003/029 Pandowoharjo Sleman ',
                'tempat_lahir' => 'Magelang',
                'tanggal_lahir' => date("Y/m/d", strtotime('17 September 1990')),
                'telepon' => '081327384300',
                'email' => 'rahmawan.bmtumy@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '1017 038',
                'role' => 4,
            ],
            [
                'user_name' => 'tiara.putri',
                'nama_lengkap' => 'Tiara Putri Fatmasari, S.Si',
                'alamat' => 'Selawen Rt/Rw 001/003 Kaibonpetangkuran Ambal Kebumen',
                'tempat_lahir' => 'Magelang',
                'tanggal_lahir' => date("Y/m/d", strtotime('15 July 1993')),
                'telepon' => '085326720369',
                'email' => 'tiara.fatmasari.tf@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '0418 040',
                'role' => 4,
            ],
            [
                'user_name' => 'novianto.dwi',
                'nama_lengkap' => 'R Novianto Dwi, A.Md.T',
                'alamat' => 'Siliran Lor 14 Rt/Rw 011/004 Panembahan Kraton Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => date("Y/m/d", strtotime('12 November 1987')),
                'telepon' => '081802780357',
                'email' => 'viandwi@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0218 039',
                'role' => 4,
            ],
            [
                'user_name' => 'fentha.lari',
                'nama_lengkap' => 'Fentha Lari Lesmana, S.Kom',
                'alamat' => 'Perum gejawan Indah blok J/153 Temuwuh Lor Rt/Rw 006/048 Balecatur Gamping Sleman Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => date("Y/m/d", strtotime('05 February 1992')),
                'telepon' => '085643661105',
                'email' => 'fenthalari@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0518 043',
                'role' => 4,
            ],
            [
                'user_name' => 'arma.wanto',
                'nama_lengkap' => 'Arma Wanto, S.H.I',
                'alamat' => 'Berjo Kidul Rt/Rw 003/006 Sidoluhur Godean Sleman',
                'tempat_lahir' => 'Sleman',
                'tanggal_lahir' => date("Y/m/d", strtotime('05 April 1987')),
                'telepon' => '083869758977',
                'email' => 'armaw302@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0219 045',
                'role' => 4,
            ],
            [
                'user_name' => 'khoirul.ummah',
                'nama_lengkap' => 'Khoirul Ummah, S.Kom.',
                'alamat' => 'Patemon Rt/Rw 002/002 Patemon Gombong Kebumen',
                'tempat_lahir' => 'Kebumen',
                'tanggal_lahir' => date("Y/m/d", strtotime('13 August 1990')),
                'telepon' => '085740043204',
                'email' => 'khoirulummah13@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '0519 047',
                'role' => 4,
            ],
            [
                'user_name' => 'mailul.hashfi',
                'nama_lengkap' => 'Mailul Hashfi, SE.',
                'alamat' => 'Burikan Rt/Rw 004/005 Burikan Kota Kudus',
                'tempat_lahir' => 'Kudus',
                'tanggal_lahir' => date("Y/m/d", strtotime('27 July 1988')),
                'telepon' => '082238840405',
                'email' => 'malhas25@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0719 048',
                'role' => 4,
            ],
            [
                'user_name' => 'anis.santosa',
                'nama_lengkap' => 'Anis Santosa.,S.E.',
                'alamat' => 'Kepuh Kulon Rt/Rw 006/000 Wirokerten Banguntapan Bantul',
                'tempat_lahir' => 'Temanggung',
                'tanggal_lahir' => date("Y/m/d", strtotime('19 November 1990')),
                'telepon' => '082220117114',
                'email' => 'asanta343@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '1119 050',
                'role' => 4,
            ],
            [
                'user_name' => 'jati.amstrong',
                'nama_lengkap' => 'Jati amstrong Habibi.,S.T.',
                'alamat' => 'Prum Kopri No 33 Rt/Rw 002/006 Cangkrep Lor Purworejo',
                'tempat_lahir' => 'Sukajadi',
                'tanggal_lahir' => date("Y/m/d", strtotime('24 July 1995')),
                'telepon' => '085374481377',
                'email' => 'habibistrong@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '1119 051',
                'role' => 4,
            ],
            [
                'user_name' => 'nur.wahyuni',
                'nama_lengkap' => 'Nur Wahyuni Purnamawati.,S.Hut',
                'alamat' => 'Podosari Rt/Rw 004/002 Podosari Cepiring Kendal',
                'tempat_lahir' => 'Kendal',
                'tanggal_lahir' => date("Y/m/d", strtotime('21 March 1992')),
                'telepon' => '085290084774',
                'email' => 'purnama.nur@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '1119 052',
                'role' => 4,
            ],
            [
                'user_name' => 'marliyantari',
                'nama_lengkap' => 'Marliyantari',
                'alamat' => 'Sonopakis Kidul  Rt/Rw 002/000 Ngestiharjo Kasihan Bantul',
                'tempat_lahir' => 'Bantul',
                'tanggal_lahir' => date("Y/m/d", strtotime('29 March 2001')),
                'telepon' => '087773391371',
                'email' => 'marliantari29@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '0320 053',
                'role' => 4,
            ],
            [
                'user_name' => 'nova.hakim',
                'nama_lengkap' => 'Muh Nova Hakim.,S.T.',
                'alamat' => 'Warungboto UH 4/998 Rt/Rw 037/009 Warungboto Umbulharjo Yogyakarta',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => date("Y/m/d", strtotime('1 November 1992')),
                'telepon' => '081229880703',
                'email' => 'muhnovahakim@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '0920 054',
                'role' => 4,
            ],
            [
                'user_name' => 'alamuddien.asyorzi',
                'nama_lengkap' => 'Alamuddien Asyrozi.,S.Pd',
                'alamat' => 'Tiwir Rt/Rw 003/019 Sumbersari Moyudan Sleman',
                'tempat_lahir' => 'Sleman',
                'tanggal_lahir' => date("Y/m/d", strtotime('04 May 1997')),
                'telepon' => '971568304474',
                'email' => 'asyrozimike@gmail.com',
                'jenis_kelamin' => 'L',
                'nip' => '1220 055',
                'role' => 4,
            ],
            [
                'user_name' => 'lutfiana.risti',
                'nama_lengkap' => 'Lutfiana Risti Hamami.,S.P.',
                'alamat' => 'Karanggayam Rt/Rw 001/000 Sitimulyo Piyungan  Bantul',
                'tempat_lahir' => 'Bantul',
                'tanggal_lahir' => date("Y/m/d", strtotime('25 Septmeber 1996')),
                'telepon' => '085802731254',
                'email' => 'luthfyar17@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '1220 056',
                'role' => 4,
            ],
            [
                'user_name' => 'novera.windiarti',
                'nama_lengkap' => 'Novera Windiarti Agastia,S.M.',
                'alamat' => 'Plosokuning 2 RT.09/RW.04 Minomartani Ngaglik Sleman Yogyakarta',
                'tempat_lahir' => 'Sleman',
                'tanggal_lahir' => date("Y/m/d", strtotime('13 November 1997')),
                'telepon' => '085643655159',
                'email' => 'novera104@gmail.com',
                'jenis_kelamin' => 'P',
                'nip' => '1121 057',
                'role' => 4,
            ],
        ];


        foreach ($users as $user) {
            User::factory()
                ->count(1)
                ->has(
                    Employee::factory()
                        ->count(1)
                        ->state(function () use ($user) {
                            return [
                                'nama_lengkap' => $user['nama_lengkap'],
                                'email' => $user['email'],
                                'telepon' => $user['telepon'],
                                'nip' => $user['nip'],
                                'alamat' => $user['alamat'],
                                'tempat_lahir' => $user['tempat_lahir'],
                                'tanggal_lahir' => $user['tanggal_lahir'],
                            ];
                        })
                )
                ->create(
                    [
                        'name' => $user['user_name'],
                        'email' => $user['email'],
                        'email_verified_at' => now(),
                        'password' => Hash::make('password'),
                        'role' => 4
                    ]
                );
        }
    }
}
