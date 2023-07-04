<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;

class ShowTeams extends Component
{

    // listeners
    protected $listeners = ['render'];

    public $search;
    
    public function render()
    {
        $teams =  Team::where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('stadium', 'like', '%'.$this->search.'%')
                        ->orWhere('foundation_year', 'like', '%'.$this->search.'%')
                        ->orderBy('name','asc')->get();

        return view('livewire.show-teams', compact('teams'));
    }
}
