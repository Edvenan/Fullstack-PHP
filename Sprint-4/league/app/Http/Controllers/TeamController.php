<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){

        // call the view 'home.php'
        return view('teams.index');
    }
 
    public function create() {
        
        // call the view 'home.php'
        return view('teams.create');
    }
 
    public function store(Request $request) {
        
        $team = new Team();

        $team->name = $request->name;
        $team->coach = $request->coach;
        $team->foundation_date = $request->date;

        $team->save();

        return redirect()->route('teams.show', $team);
    }

    public function show(Team $team) {

        $games = Game::all()->sortBy('date');

        // call the view 'home.php'
        return view('teams.show', compact('team','games'));
    }
    
    public function showAll() {
        
        // creata a TeamModel object containing all teams
        $teams = Team::orderBy('name','asc')->paginate(5);

        // call the view 'home.php'
        return view('teams.showAll', compact('teams'));
    }
    
    public function update(Team $team) {

        // call the view 'home.php'
        return view('teams.update', ['team' => $team]);
    }
    
    public function delete(Team $team) {

        // call the view 'home.php'
        return view('teams.delete', ['team' => $team]);
    }
}
