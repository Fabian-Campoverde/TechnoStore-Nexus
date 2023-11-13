<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

   
    public function render()
    {
        // $users= User::paginate(10);
       
         return view('livewire.admin.users-index', ['users' => User::paginate(10)]);
    }
}
