<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class EditUser extends Component
{
    public User $user;

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function update()
    {
        $this->validate();
        $this->user->save();
        $this->closeModalWithEvents(
            // [IndexUser::getName()=>'userUpdated']
        );
    }

    public function render()
    {
        return view('livewire.edit-user');
    }

    protected function rules():array
    {
        return [
            'user.name'=>['required','string'],
            'user.email'=>['required','email','unique:users, email'],
        ];
    }

    
}
