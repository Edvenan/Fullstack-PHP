<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(){

        // call the view 'home.php'
        return view('games.index');
    }
 
    public function create() {
        // creata a GameModel object containing all games
        $teams = Team::all();

        // call the view 'home.php'
        return view('games.create', compact('teams'));
    }
 
    public function store(Request $request) {
        
        $game = new Game();

        $game->team_1 = Team::where('name', $request->team_1)->first()->id;
        $game->team_2 = Team::where('name', $request->team_2)->first()->id;
        $game->date = $request->date;
        $game->score_team_1 = $request->score_team_1; 
        $game->score_team_2 = $request->score_team_2; 

        $game->save();

        return redirect()->route('games.show', $game);
    }

    public function show(Game $game) {
        $name_team_1 = Team::where('id',$game->team_1)->first()->name;
        $name_team_2 = Team::where('id',$game->team_2)->first()->name;

        // call the view 'home.php'
        return view('games.show', compact('game','name_team_1', 'name_team_2'));
    }
    
    public function showAll() {

        // creata a GameModel object containing all games
        $games = Game::orderBy('date','asc')->paginate(5);
        $teams = Team::all();

        // call the view 'home.php' and pass $games to the view
        return view('games.showAll', compact('games', 'teams'));
    }
    
    public function update(Game $game) {

        $name_team_1 = Team::where('id',$game->team_1)->first()->name;
        $name_team_2 = Team::where('id',$game->team_2)->first()->name;
        $teams = Team::all();
        // call the view 'games/update.blade.php'
        return view('games.update', compact('game', 'name_team_1', 'name_team_2', 'teams'));
    }
    
    public function delete(Game $game) {

        // call the view 'home.php'
        return view('games.delete', ['game' => $game]);
    }
}


