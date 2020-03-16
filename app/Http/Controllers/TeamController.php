<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $teams = Team::paginate(20);
        return view('team.list')->with(compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate($this->rules());

        $team = new Team();
        $team->fill($data);

        $team->save();

        return redirect(route('team-show',['team'=>$team->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function show(Team $team)
    {
        //
        return view('team.edit')->with(compact('team'))->with('mode','show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function edit(Team $team)
    {
        //
        return view('team.edit')->with(compact('team'))->with('mode','edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Team $team)
    {
        //
        $data = $request->validate($this->rules($team->id));

        $team->fill($data);
        $team->save();

        return view('team.edit')->with(compact('team'))->with('mode','show');
    }

    public function volunteers(Request $request, Team $team)
    {
        $data = $request->validate([
            'volunteers' => 'required|array',
            'action' => 'required|in:add,remove'
        ]);

        if($data["action"] == 'add') {
            $team->volunteers()->attach($data["volunteers"]);
        } else {
            $team->volunteers()->detach($data["volunteers"]);
        }
        return redirect(route('team-show',['team'=>$team->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Team  $team
     * @return \Illuminate\Http\Response
     */
    public function destroy(Team $team)
    {
        //
    }

    private function rules($ignore = null)
    {
        $unique = Rule::unique('teams','name');

        if(isset($ignore))
        {
            $unique = $unique->ignore($ignore);
        }

        return [
            'name' => ['required',$unique],
            'lead_id' => 'required|exists:volunteers,id',
        ];
    }
}
