<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class UserPagination extends Component
{
    use WithPagination;
    public $searchTerm = '';
    
    public function search()
{
    
}
public function updatingSearchTerm()
{
 $this->resetPage();   
}
    public function render()
    {
        $users= User::where('name', 'like' , '%'. $this->searchTerm . '%' )
        ->orWhere('email', 'like', '%' . $this->searchTerm . '%')
        ->paginate();
        $roles= Role::all();
        $rolesWithCount = Role::leftJoin('model_has_roles', 'roles.id', '=', 'model_has_roles.role_id')
    ->select('roles.id', 'roles.name', DB::raw('COUNT(model_has_roles.model_id) as user_count'))
    ->groupBy('roles.id', 'roles.name')
    ->get();

        
        
         return view('livewire.user-pagination', compact('users','rolesWithCount'));
    }
}
