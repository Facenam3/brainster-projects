<?php

namespace App\Http\Controllers;

use App\Http\Requests\conference\ConferenceStoreRequest;
use App\Http\Requests\conference\ConferenceUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Conference;
use App\Models\Speaker;
use App\Models\Ticket;

class ConferenceController extends Controller
{
    public function index() {
        $conferences = Conference::with('speaker')->paginate(10);
        return view('admin.conference.conferences', compact('conferences'));
    }

    public function addConference() {
        $speakers = Speaker::all();
        $tickets = Ticket::all();
        return view('admin.conference.conference-form', compact(['speakers', 'tickets']));
    }

    public function editConference($id) {

        $conference = Conference::findOrFail($id);
        $speakers = Speaker::all();
        $tickets = Ticket::all();
        return view('admin.conference.edit-conference',compact(var_name: ['speakers', 'tickets', 'conference']));

    }

    public function storeConference(ConferenceStoreRequest $request) {

        Conference::create([
            'title' => $request->title,
            'theme' => $request->theme,
            'description' => $request->description,
            'objective' => $request->objective,
            'date' => $request->date,
            'status' => $request->status,
            'location' => $request->location,
            'speaker_id' => $request->speaker_id,
            'ticket_id' => $request->ticket_id
        ]);

        return redirect()->route('admin.conferences');
    }

    public function updateConference(ConferenceUpdateRequest $request, Conference $conference) {
        $conference->update($request->all());
        
        return redirect()->route('admin.conferences');
    }

    public function destroyConference($id) {
        $conference = Conference::findOrFail($id);

        $conference->delete();

        return redirect()->route('admin.conferences');
    }
}
