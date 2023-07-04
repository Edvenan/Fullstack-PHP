<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRanking extends Component
{
    use WithPagination;

    // vars to sort table by columns
    public $sort = 'points';
    public $direction = 'desc';


    public function render()
    {
        $teams = Team::orderBy($this->sort, $this->direction)->orderBy('name', 'asc')->paginate(10);

        return view('livewire.show-ranking',compact('teams'));
    }

    // function to sort table by columns
    public function order($sort){

        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }

}
