<?php

namespace App\Http\Livewire;

use App\Models\Team;
use Livewire\Component;
use Illuminate\Validation\Rule;

class ShowTeams extends Component
{
    
    // listeners
    protected $listeners = ['render', 'delete'];
 
    // var to search teams
    public $search;
    
    // var to edit & delete teams
    public $team;

    // var to open modal
    public $open_edit = false;
    public $open_show = false;

    /**
     * Mount method to initialize vars used by view
     */
    public function mount()
    {
        $this->team = new Team();
    }

    /**
     * Validation rules method that takes into account
     * those fields with 'unique' property
     */
     protected function rules()
     {
         return [
             'team.name' => [
                 'required',
                 'string',
                 'min:2',
                 Rule::unique('teams', 'name')->ignore($this->team->id),
             ],
             'team.foundation_year' => 'required|integer|min:1850|max:2023',
             'team.stadium' => [
                 'required',
                 'string',
                 Rule::unique('teams', 'stadium')->ignore($this->team->id),
             ],
             'team.emblem_photo' => 'nullable|url',
         ];
     }

    /**
     * Dynamic input validation method
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->rules());
    }

    /**
     * ShowTeams Component Render method
     */
    public function render()
    {
        $teams =  Team::where('name', 'like', '%'.$this->search.'%')
                        ->orWhere('stadium', 'like', '%'.$this->search.'%')
                        ->orWhere('foundation_year', 'like', '%'.$this->search.'%')
                        ->orderBy('name','asc')->get();

        return view('livewire.show-teams', compact('teams'));
    }

    /**
     * Show Team method
     */
    public function show(Team $team)
    {
        $this->team = $team;

        $this->open_show = true;
    }

    /**
     * Edit Team method
     */
    public function edit(Team $team)
    {
        $this->reset(['open_show']);
        $this->team = $team;
        $this->open_edit = true;
    }

    /**
     * Update Edited Team method
     */
    public function update()
    {
        $this->validate();
        
        $this->team->save();

        $this->reset(['open_edit']);

        // Show alert
        $message = "Team (".$this->team->name.") updated successfully.";
        $this->emit('alert', 'Team updated!', $message, 'success');

        $this->open_show = true;
    }

    /**
     * Destroy Team method
     */
    public function destroy(Team $team)
    {
        $this->team = $team;
        $this->emit('alert_delete', 'show-teams');

    }

    /**
     * Delete Destroyed Game method
     */
    public function delete()
    {
        $this->update_statistics();

        $this->team->delete();
        
        $this->reset(['open_show']);

        // Show alert
        $message = "Team (".$this->team->name.") deleted successfully.";
        $this->emit('alert', 'Team deleted!', $message, 'success');
    }

    /**
     * Cancel Edit Team method
     */
    public function cancel()
    {
        $this->reset(['open_edit']);
        $this->open_show = true;
    }

    /**
     * Team Statistics update after
     * teams deletion
     */
    public function update_statistics()
    {
        foreach($this->team->games() as $game) {

            // determine rival's id
            if($game->team_1_id == $this->team->id) {
                $rival_id = $game->team_2_id;
                $rival_score = $game->score_team_2;
                $deleted_team_score = $game->score_team_1;
            } else{
                $rival_id = $game->team_1_id;
                $rival_score = $game->score_team_1;
                $deleted_team_score = $game->score_team_2;
            }
            // get rival's object
            $rival = Team::find($rival_id);

            if($game->score_team_1 && $game->score_team_2){
                // game was played and there is a score
                if($deleted_team_score > $rival_score){
                    // deleted team won
                    $rival->against -= $deleted_team_score;
                    $rival->goals -= $rival_score;
                    $rival->average =  $rival->goals - $rival->against;
                    $rival->lost -= 1;
                    $rival->won -= 0;
                    $rival->draw -= 0;
                    $rival->num_games -=1;
                    $rival->points += 0;
                }
                elseif($deleted_team_score < $rival_score){
                    // deleted team lost
                    $rival->against -= $deleted_team_score;
                    $rival->goals -= $rival_score;
                    $rival->average =  $rival->goals - $rival->against;
                    $rival->lost -= 0;
                    $rival->won -= 1;
                    $rival->draw -= 0;
                    $rival->num_games -=1;
                    $rival->points -= 3;
                }
                elseif($deleted_team_score == $rival_score){
                    // deleted team draw
                    $rival->against -= $deleted_team_score;
                    $rival->goals -= $rival_score;
                    $rival->average =  $rival->goals - $rival->against;
                    $rival->lost -= 0;
                    $rival->won -= 0;
                    $rival->draw -= 1;
                    $rival->num_games -=1;
                    $rival->points -= 1;
                }

                $rival->save();

            }
            else{
                // game not played yet -> just delete team
                continue;
            }
        }

    }
}
