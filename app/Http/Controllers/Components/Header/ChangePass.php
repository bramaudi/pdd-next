<?php

namespace App\Http\Controllers\Components\Header;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ChangePass extends Component
{
    public $changePassOld, $changePassNew, $changePassNew2;

    public function submitGantiSandi()
    {
        $this->validate([
            'changePassOld' => 'required|min:6',
            'changePassNew' => 'required|min:6',
            'changePassNew2' => 'required|same:changePassNew'
        ], [], [
            'changePassOld' => 'Kata Sandi',
            'changePassNew' => 'Kata Sandi Baru',
            'changePassNew2' => 'Konfirmasi Kata Sandi Baru',
        ]);

        $user = User::find(Auth::user()->id);

        // Periksa kecocokan sandi
        if (Hash::check($this->changePassOld, $user->password)) {
            $user->password = Hash::make($this->changePassNew);
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
