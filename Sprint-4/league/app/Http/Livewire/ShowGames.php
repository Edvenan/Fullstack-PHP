<?php

namespace App\Http\Livewire;

use App\Models\Game;
use Livewire\Component;

class ShowGames extends Component
{

    // vars to sort table by columns
    public $sort = 'date';
    public $direction = False;
    
    // var to search games by teams
    public $search;
    
    public function render()
    {
        /* $games =  Game::orderBy($this->sort, $this->direction)->get(); */
        $games =  Game::all()->sortBy($this->sort, SORT_REGULAR, $this->direction);
        /* $games =  Game::where('team_1.name', 'like', '%'.$this->search.'%')->orWhere('team_2.name', 'like', '%'.$this->search.'%')->orderBy($this->sort, $this->direction)->get(); */
        
        return view('livewire.show-games', compact('games'));
    }

    // function to sort table by columns
    public function order($sort){

        if ($this->sort == $sort) {
            if ($this->direction == True) {
                $this->direction = False;
            } else {
                $this->direction = True;
            }
        } else {
            $this->sort = $sort;
            $this->direction = False;
        }
    }
}
