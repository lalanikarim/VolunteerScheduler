<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class VolunteerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $volunteers = Volunteer::paginate(20);
        return view('volunteer.list')->with(compact('volunteers'));
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

        $volunteer = new Volunteer($data);
        if($request->has('middle_name'))
        {
            $volunteer->middle_name = $request->input('middle_name');
        }
        $volunteer->save();

        return redirect(route('volunteer-show',['volunteer' => $volunteer->id]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function show(Volunteer $volunteer)
    {
        //
        return view('volunteer.edit')->with(compact('volunteer'))->with('mode','show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function edit(Volunteer $volunteer)
    {
        //
        return view('volunteer.edit')->with(compact('volunteer'))->with('mode','edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Volunteer $volunteer)
    {
        //
        $data = $request->validate($this->rules($volunteer->id));

        $volunteer->fill($data);
        if($request->has('middle_name'))
        {
            $volunteer->middle_name = $request->input('middle_name');
        }
        $volunteer->save();

        return redirect(route('volunteer-show',['volunteer' => $volunteer->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Volunteer  $volunteer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Volunteer $volunteer)
    {
        //
    }

    public function team(Request $request, Volunteer $volunteer)
    {
        $data = $request->validate([
            'team_id' => 'required|numeric|exists:teams,id',
            'action' => 'required|in:add,remove'
        ]);
        $team_id = $data["team_id"];

        $teamIds = $volunteer->teams->map(function($team){return $team->id;})->toArray();

        if($data["action"] == 'add') {
            if (! in_array($team_id, $teamIds)) {
                $volunteer->teams()->attach($team_id);
            }
        } else {
            if(in_array($team_id, $teamIds))
            {
                $volunteer->teams()->detach($team_id);
            }
        }
        return redirect(route('volunteer-show',['volunteer'=> $volunteer->id]));
    }

    public function removeteam(Volunteer $volunteer, Team $team)
    {
        if(contains($team, $volunteer->teams))
        {
            $volunteer->teams()->detach($team->id);
        }
        return redirect(route('volunteer-show',['volunteer'=> $volunteer->id]));

    }

    private function rules($ignore = null)
    {
        $unique = Rule::unique('volunteers','bar_code');

        if(isset($ignore))
        {
            $unique = $unique->ignore($ignore);
        }

        return [
            'bar_code' => ['required',$unique],
            'first_name' => 'required',
            'last_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required'
        ];
    }
}
