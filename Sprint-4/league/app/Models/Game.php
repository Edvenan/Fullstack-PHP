<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'date',
        'time',
        'score_team_1',
        'score_team_2',
    ];

    /**
     * The attributes that are ignored when mass assigning.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * Method that retrieves team_1's data
     *
     */
    public function team_1(){
        // Teams table Class - Teams Foreign Key name - Games table foreign key
        return $this->hasOne('App\Models\Team', 'id', 'team_1_id');
    }

    /**
     * Method that retrieves team_2's data
     *
     */
    public function team_2(){
        // Teams table Class - Teams Foreign Key name - Games table foreign key
        return $this->hasOne('App\Models\Team', 'id', 'team_2_id');
    }

}
