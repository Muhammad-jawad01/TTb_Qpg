<?php

namespace App\Http\Livewire\Branch;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;





class Form extends Component
{

    public $model;
    public $branch_admin;
    public $type='create';

     
    public function render()
    {
        return view('livewire.branch.form');
    }
    
    public function mount()
    {
        if($this->type!='create'){
            $this->branch_admin=User::where("id",$this->model->user_id)->first();
        }
        $this->roles = Role::pluck('name', 'name')->all();

    }
}