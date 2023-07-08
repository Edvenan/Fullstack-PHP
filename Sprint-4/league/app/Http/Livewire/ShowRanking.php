<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;
use Livewire\WithPagination;

class ShowRanking extends Component
{
    use WithPagination;

    // vars to sort table by columns
    public $sort = 'position';
    public $direction = 'asc';
    public $page = 1;

    // var to launch show modal
    public $open_show = false;

    // var to show team info
    public $team;

    public function mount()
    {
        $this->team = New Team();
    }


    public function render()
    {
        if($this->sort=='position'){
            if($this->direction == 'asc')
                $teams = Team::orderBy('points', 'desc')->orderBy('num_games', 'asc')->orderBy('average', 'desc')
                ->orderBy('against', 'asc')->select('*');
            else{
                $teams = Team::orderBy('points', 'asc')->orderBy('num_games', 'desc')->orderBy('average', 'asc')
                ->orderBy('against', 'desc')->select('*');
            }
        }
        else{
            $opposite_dir = $this->direction == 'asc' ? 'desc' : 'asc';
            $teams = Team::orderBy($this->sort, $this->direction)->orderBy('num_games',  $opposite_dir)
            ->orderBy('average', $this->direction )->orderBy('against', $opposite_dir)->select('*');
        }
        
                    
        $teams = $teams->paginate(5, ['*'], 'page', $this->page);

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
        $this->page = 1;
        $this->resetPage();
    }

    /**
     * Show Team method
     */
    public function show(Team $team)
    {
        $this->team = $team;

        $this->open_show = true;
    }

}
