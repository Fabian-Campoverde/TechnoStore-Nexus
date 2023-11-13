<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserValidation extends Component
{
    public $name='';
    
    public $isNameAvailable;
    public $users;
    public $rolesList;

    public $image_url;
    public $email;
    public $password;
    public $roles = [];
    public $nickname;
    
    public $formIsValid;

    protected $rules = [
        'name' => 'required',
        'image_url' => 'image|required',
        'email' => 'email|required |unique:users',
        'password' => 'required',
        'roles' => 'required|array|min:1',
        'roles.*' => 'required|numeric',
        'nickname' => 'required|unique:users',
    ];

    public function search()
    {
        $this->validate();
    }
    public function submitForm()
    {
        $this->validate();

        // Lógica de procesamiento del formulario
    }
    public function render()
    {
        
        
        return view('livewire.user-validation',[
         'users'=>$this->users,
        'rolesList'=>$this->rolesList]);
    }
}
