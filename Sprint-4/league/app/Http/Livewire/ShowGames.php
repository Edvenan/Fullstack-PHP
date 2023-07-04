<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;


class ShowGames extends Component
{
    use WithPagination;

    // vars to sort table by columns
    public $sort = 'date';
    public $direction = False;
    
    // var to search games by teams
    public $search;

    // listeners
    protected $listeners = ['render'];
    
    public function render()
    {
        $searchedTeamIds = Team::where('name', 'like', '%'.$this->search.'%')->pluck('id');

        $games =  Game::whereIn('team_1_id', $searchedTeamIds)
                        ->orWhereIn('team_2_id', $searchedTeamIds)->paginate(5);
                        /* ->sortBy($this->sort, SORT_REGULAR, $this->direction); */
        
        /* if ($this->direction) {
            $this->direction = 'asc';
        } else {
            $this->direction = 'desc';
        }
        $games =  Game::whereIn('team_1_id', $searchedTeamIds)
                        ->orWhereIn('team_2_id', $searchedTeamIds)
                        ->orderBy($this->sort, $this->direction)
                        ->paginate(10); */
        
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

    public function edit($game)
    {
        echo $game;
    }

    /**
     * Function to eliminate page # from search bar and allow full search
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }
}
