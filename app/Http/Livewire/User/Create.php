<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\User;

class Create extends Component
{
    public User $user;

    protected $rules = [
        'user.name' => 'required|string|min:6',
        'user.email' => 'required| email',
        'user.password' => 'required| min:6'
    ];

    public function mount()
    {
        $this->user = new User();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'user.name' => 'required|min:6',
            'user.email' => 'required|email',
            'user.password' => 'required| min:6'
        ]);
    }

    public function save()
    {

        $this->validate();

        $this->user->create([
            'name' => ucfirst($this->user->name),
            'password' => bcrypt($this->user->password),
            'email' => $this->user->email
        ]);

        session()->flash('success', 'User successfully Created.');
        return redirect()->route('users.create');
    }

    public function render()
    {

        return view('livewire.user.create')
            ->extends('adminlte::page');
    }
}
