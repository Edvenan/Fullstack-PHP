<?php

namespace App\Http\Livewire;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;


class ShowGames extends Component
{
    use WithPagination;

    // vars to sort table by columns
    public $sort = 'date';
    public $direction = False;
    public $page = 1;
    
    // var to search games by teams
    public $search;

    // var to edit & delete games
    public $game, $locals, $visitors;

    // var to open modal
    public $open_edit = false;

    /**
     * Mount method to initialize vars used by view
     */
    public function mount()
    {
        $this->game = new Game();
        $this->locals = Team::all();
        $this->visitors = Team::all();
    }

    /**
     * Validation rules
     */
    protected $rules = [
        'game.team_1_id' => 'required|integer', // Add the validation rule here
        'game.team_2_id' => 'required|integer|different:game.team_1_id',
        'game.date' => 'required|date',
        'game.time' => 'required',
        'game.score_team_1' => 'integer|min:0',
        'game.score_team_2' => 'integer|min:0'
    ];

   /**
    * listeners
    */
    protected $listeners = ['render','delete'];
    
    /**
     * Dynamic input validation method
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules);
    }

    /**
     * ShowGames Component Render method
     */
    public function render()
    {

        // get teams based on search bar
        $searchedTeamIds = Team::where('name', 'like', '%'.$this->search.'%')->pluck('id');

        // sort searched teams based on user chosen sorting criteria
        $games =  Game::whereIn('team_1_id', $searchedTeamIds)
                        ->orWhereIn('team_2_id', $searchedTeamIds)->get()
                        ->sortBy($this->sort, SORT_REGULAR, $this->direction);
        
        // paginate sorted resutls                        
        $perPage = 5; // Number of items to display per page
        $currentPage = request()->get('page', 1); // Current page number
        $paginatedItems = $games->slice(($this->page - 1) * $perPage, $perPage);
        $pagination = new LengthAwarePaginator(
            $paginatedItems,
            $games->count(),
            $perPage,
            $this->page,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $games = $pagination;
        
        return view('livewire.show-games', compact('games'));
    }

    // Sort Game table by columns method
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

        $this->page = 1;
        $this->resetPage();
    }

    /**
     * Edit Game method
     */
    public function edit(Game $game)
    {
        $this->game = $game;
        $this->getLocals();
        $this->getVisitors();
        $this->open_edit = true;
    }

    /**
     * Update Edited Game method
     */
    public function update()
    {
        $this->validate();
        
        if($this->update_statistics('edit')){
         
            $this->game->save();

            $this->reset(['open_edit']);

            // Show alert
            $message = "Game (".$this->game->team_1->name." - ".$this->game->team_2->name.") updated successfully.";
            $this->emit('alert', 'Game updated!', $message, 'success');
        } else {
            // something went wrong -> no action taken
        }
    }

    /**
     * Destroy Game method
     */
    public function destroy(Game $game)
    {
        $this->game = $game;
        $this->emit('alert_delete', 'show-games');
    }

    /**
     * Delete Destroyed Game method
     */
    public function delete()
    {
        if($this->update_statistics('delete')){
            $this->game->delete();
            // Show alert
            $message = "Game (".$this->game->team_1->name." - ".$this->game->team_2->name.") deleted successfully.";
            $this->emit('alert', 'Game deleted!', $message, 'success');
        }
    }

    /**
     * Function to eliminate page # from search bar and
     * allow full search even when paginating
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }

    /**
     * functions to avoid duplicate teams selection
     * when using 'select' elements
     */
    public function updatedGameTeam1Id()
    {
        $this->getVisitors();
    }
    public function updatedGameTeam2Id()
    {
        $this->getLocals();
    }
    public function getVisitors()
    {
        if($this->game->team_1_id) {
            $this->visitors = Team::where('id', '!=', $this->game->team_1_id)->orderBy('name')->get();
        } else {
            $this->visitors = [];
        }

    }
    public function getLocals()
    {
        if($this->game->team_2_id) {
            $this->locals = Team::where('id', '!=', $this->game->team_2_id)->orderBy('name')->get();
        } else {
            $this->locals = [];
        }
    }

    /**
     * Team Statistics update after
     * teams deletion
     */
    public function update_statistics($action)
    {
        
        // Delete Game action
        if($action == 'delete'){

            // delete game with a score ( game was played )
            if(isset($this->game->score_team_1) && isset($this->game->score_team_2)){
               
                // undo original game statistics for old team_1 and old team_2
                $this->undo_old_game_statistics();
            }
            // else, delete game w/o score -> just delete game
        }
        // Edit Game with score action
        elseif ($action == 'edit' && isset($this->game->score_team_1) && isset($this->game->score_team_2)){

            //check wether there was a score or not before editing
            $original_game = Game::find($this->game->id);

            // there was a score before
            if(isset($original_game->score_team_1) && isset($original_game->score_team_2)){

                // undo original game statistics for old team_1 and old team_2
                $this->undo_old_game_statistics();
            }

            // apply new game statistics for new team_1 and new team_2
            $this->apply_new_game_statistics();
        }
        // Edit Game w/o score action
        elseif ($action == 'edit' && (is_null($this->game->score_team_1) || is_null($this->game->score_team_2))){
            // game not played yet -> no statistics update required -> just edit the game
        }
        // else, raise error
        else {
            $this->emit('alert', 'Update failed!', 'Statistics update failed. No action taken.', 'error');
            return false;
        }
        // if success, return true
        return true;
    }

    /**
     * helper method to undo game statisitics
     * upon a game 'delete' or 'update' 
     */
    public function undo_old_game_statistics()
    {
        // undo old game statistics for old team_1 and old team_2
        
        //get original game object
        $original_game = Game::find($this->game->id);

        // get teams objects
        $team_1 = Team::find($original_game->team_1_id);
        $team_2 = Team::find($original_game->team_2_id);
       

        // original team_1 won before
        if($original_game->score_team_1 > $original_game->score_team_2){
            // original team_1 statistics
            $team_1->against -= $original_game->score_team_2;
            $team_1->goals -= $original_game->score_team_1 ;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost -= 0;
            $team_1->won -= 1;
            $team_1->draw -= 0;
            $team_1->num_games -= 1;
            $team_1->points -= 3;
            // team_2 statistics
            $team_2->against -= $original_game->score_team_1;
            $team_2->goals -= $original_game->score_team_2 ;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost -= 1;
            $team_2->won -= 0;
            $team_2->draw -= 0;
            $team_2->num_games -= 1;
            $team_2->points -= 0;
        }
        // original team_1 lost before
        elseif($original_game->score_team_1 < $original_game->score_team_2){
            // original team_1 statistics
            $team_1->against -= $original_game->score_team_2;
            $team_1->goals -= $original_game->score_team_1 ;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost -= 1;
            $team_1->won -= 0;
            $team_1->draw -= 0;
            $team_1->num_games -= 1;
            $team_1->points -= 0;
            // team_2 statistics
            $team_2->against -= $original_game->score_team_1;
            $team_2->goals -= $original_game->score_team_2 ;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost -= 0;
            $team_2->won -= 1;
            $team_2->draw -= 0;
            $team_2->num_games -= 1;
            $team_2->points -= 3;
        }
        // draw before
        elseif($original_game->score_team_1 == $original_game->score_team_2){
            // original team_1 statistics
            $team_1->against -= $original_game->score_team_2;
            $team_1->goals -= $original_game->score_team_1 ;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost -= 0;
            $team_1->won -= 0;
            $team_1->draw -= 1;
            $team_1->num_games -= 1;
            $team_1->points -= 1;
            // team_2 statistics
            $team_2->against -= $original_game->score_team_1;
            $team_2->goals -= $original_game->score_team_2 ;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost -= 0;
            $team_2->won -= 0;
            $team_2->draw -= 1;
            $team_2->num_games -= 1;
            $team_2->points -= 1;
        }
        // save updated teams statistics
        $team_1->save();
        $team_2->save();
    }

    /**
     * helper method to undo game statisitics
     * upon a game 'delete' or 'update' 
     */
    public function apply_new_game_statistics()
    {
        // apply new game statistics for new team_1 and new team_2
        
        //get original game object
        $new_game = $this->game;

        // get teams objects
        $team_1 = Team::find($new_game->team_1_id);
        $team_2 = Team::find($new_game->team_2_id);
       
         // new team_1 wins now
         if($new_game->score_team_1 > $new_game->score_team_2){
            // team_1 statistics
            $team_1->against += $new_game->score_team_2;
            $team_1->goals += $new_game->score_team_1;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost -= 0;
            $team_1->won += 1;
            $team_1->draw -= 0;
            $team_1->num_games += 1;
            $team_1->points += 3;
            // team_2 statistics
            $team_2->against += $new_game->score_team_1;
            $team_2->goals += $new_game->score_team_2;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost += 1;
            $team_2->won -= 0;
            $team_2->draw -= 0;
            $team_2->num_games += 1;
            $team_2->points -= 0;

        } 
        // team_1 loses now
        elseif($new_game->score_team_1 < $new_game->score_team_2){
            // team_1 statistics
            $team_1->against += $new_game->score_team_2;
            $team_1->goals += $new_game->score_team_1;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost += 1;
            $team_1->won += 0;
            $team_1->draw -= 0;
            $team_1->num_games += 1;
            $team_1->points += 0;
            // team_2 statistics
            $team_2->against += $new_game->score_team_1;
            $team_2->goals += $new_game->score_team_2;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost += 0;
            $team_2->won += 1;
            $team_2->draw -= 0;
            $team_2->num_games += 1;
            $team_2->points += 3;

        }
        // draw now
        elseif($new_game->score_team_1 == $new_game->score_team_2){
            // team_1 statistics
            $team_1->against += $new_game->score_team_2;
            $team_1->goals += $new_game->score_team_1;
            $team_1->average =  $team_1->goals - $team_1->against;
            $team_1->lost -= 0;
            $team_1->won += 0;
            $team_1->draw += 1;
            $team_1->num_games += 1;
            $team_1->points += 1;
            // team_2 statistics
            $team_2->against += $new_game->score_team_1;
            $team_2->goals += $new_game->score_team_2;
            $team_2->average =  $team_2->goals - $team_2->against;
            $team_2->lost += 0;
            $team_2->won -= 0;
            $team_2->draw += 1;
            $team_2->num_games += 1;
            $team_2->points += 1;

        }
        // save updated teams statistics
        $team_1->save();
        $team_2->save();
    }
}
