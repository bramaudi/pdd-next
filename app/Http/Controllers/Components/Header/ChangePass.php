<?php

namespace App\Http\Controllers\Components\Header;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePass extends Component
{
    public $pass_old, $pass_new, $pass_new2;

    public function submitGantiSandi()
    {
        $this->validate([
            'pass_old' => 'required|min:6',
            'pass_new' => 'required|min:6',
            'pass_new2' => 'required|same:pass_new'
        ], [], [
            'pass_old' => 'Kata Sandi',
            'pass_new' => 'Kata Sandi Baru',
            'pass_new2' => 'Konfirmasi Kata Sandi Baru',
        ]);

        $user = User::find(Auth::user()->id);

        // Periksa kecocokan sandi
        if (Hash::check($this->pass_old, $user->password)) {
            $user->password = Hash::make($this->pass_new);
            $user->save();
            session()->flash('success', 'Kata sandi berhasil diperbarui!');
        } else {
            session()->flash('failed', 'Kata sandi lama salah!');
            $this->render();
        }

    }

    public function render()
    {
        return view('components.header.change-pass');
    }
}
