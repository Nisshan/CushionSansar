<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $user_id;
    public  $name;
    public  $email;
    public  $password;
    public $status;
//    public bool $status;


    protected $rules = [
        'name' => 'required| min:6',
        'email' => 'required| email',
        'password' => 'sometimes|min:6',
        'status' => 'required |boolean'
    ];

    public function mount($id)
    {
        $user = User::find($id);
        $this->name = ucfirst($user->name);
        $this->email = $user->email;
        $this->user_id = $id;
        $this->status = $user->status;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName,[
            'password' => 'min:6',
            'name' => 'required| min:6',
        ]);
    }

    public function save()
    {
        $user = User::find($this->user_id);
        $user->name = $this->name;
        if(!is_null($this->password)){
            $user->password = $this->password;
        }
        $user->status = $this->status;
//        $user->is_Admin = true;
        $user->save();
        session()->flash('success','User Info Updated Success');
        return redirect()->route('create.user');
    }
    public function render()
    {
        return view('livewire.user.edit')
            ->extends('adminlte::page');
    }
}
