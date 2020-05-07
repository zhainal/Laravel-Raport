<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function store(Request $request, $id)
    {
        // Validasi
        $validation = Validator::make($request->all(), [
            "username" => "required|min:5|max:100",
            "kata_sandi" => "required",
            "konfirmasi_kata_sandi" => "required|same:kata_sandi",
            "avatar" => "file|mimetypes:image/jpeg,image/png"
        ])->validate();

        // Simpan data
        $user = User::findOrFail($id);
        $user->username = $request->get('username');
        $user->password = Hash::make($request->get('kata_sandi'));

        // Cek user upload foto profil atau gak
        if ($request->file('avatar')) {
            // Cek sebelumnya user sudah punya foto profil atau gak
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                // Kalau punya, hapus foto profil sebelumnya
                Storage::delete('public/' . $user->avatar);
            }
            $file = $request->file('avatar')->store('avatars', 'public');
            $user->avatar = $file;
        }

        $user->save();

        return redirect()->route('profile.index');
    }
}
