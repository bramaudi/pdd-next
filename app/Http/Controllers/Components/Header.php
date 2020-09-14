<?php

namespace App\Http\Controllers\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Header extends Component
{
    public $gravatar;
    public $changePassOld, $changePassNew, $changePassNew2;

    public function mount()
    {
        if (Auth::user()) {
            $this->gravatar = 'https://www.gravatar.com/avatar/'. md5(Auth::user()->email);
        }
    }

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

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/login');
    }

    public function render()
    {
        return view('components.header');
    }
}
