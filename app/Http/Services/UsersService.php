<?php

namespace App\Http\Services;

use App\Exceptions\Pengecualian;
use App\Models\Users;
use Illuminate\Support\Facades\Auth;

class UsersService
{
    public function __construct()
    {
    }

    public function login(string $nik, string $dob): bool
    {
        $user = Users::where("nik", $nik)->first();

        if (!$user)
            Pengecualian::lempar("NIK belum terdaftar!", 1);

        if (!$this->compareDOB($nik, $dob))
            Pengecualian::lempar("Tanggal lahir atau NIK salah!", 2);

        // $attempt = Auth::guard('users')->attempt(['nik' => $nik]);
        $attempt = Auth::guard('users')->loginUsingId($nik);

        if (!$attempt)
            Pengecualian::lempar("Gagal login!", 3);

        return true;
    }

    public function logout(): bool
    {
        Auth::guard('users')->logout();

        session()->invalidate();
        session()->regenerate();

        return true;
    }

    public function register(string $nik): bool
    {
        $user = Users::where("nik", $nik)->first();

        if ($user)
            Pengecualian::lempar("User sudah terdaftar!", 4);

        $user = Users::create([
            "nik" => $nik,
        ]);

        return true;
    }

    public function compareDOB(string $nik, string $dob): bool
    {
        return $dob == $this->get_dob_from_nik($nik);
    }

    public function get_dob_from_nik(string $nik): string
    {
        $dob = substr($nik, 6, 6);

        $tanggal = substr($dob, 0, 2);
        if ($tanggal > 40) {
            $tanggal = $tanggal - 40;
        }
        $bulan = substr($dob, 2, 2);
        $tahun = substr($dob, 4, 2);

        return $tanggal . $bulan . $tahun;
    }
}
