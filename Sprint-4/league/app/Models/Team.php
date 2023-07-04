<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [ 
        'name',
        'foundation_year',
        'stadium',
        'emblem_photo',
        'points',
        'num_games',
        'won',
        'draw',
        'lost',
        'goals',
        'against',
        'average'
    ];

    /**
     * The attributes that are ignored when mass assigning.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Method to get all the team's games
     *
     */
    // 
    public function games(){
        $games = Game::where('team_1_id', $this->id)->orWhere('team_2_id', $this->id)->get();
        return $games;
    }

    /**
     * Method to get the team's rank or position in the league
     *
     */
    // 
    public function position(){
        $teams = Team::orderBy('points', 'desc')->orderBy('name', 'asc')->get();
        $position = 1;
        foreach ($teams as $team) {
            if ($this->id == $team->id){
                break;
            } else {
                $position += 1;
            }
        }
        return $position;
    }
}
