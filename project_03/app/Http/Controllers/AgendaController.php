<?php

namespace App\Http\Controllers;

use App\Http\Requests\agenda\AgendaStoreRequest;
use App\Http\Requests\agenda\AgendaUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Agenda;
use App\Models\Event;
use App\Models\Conference;
use App\Models\Speaker;
use Carbon\Carbon;

class AgendaController extends Controller
{
    public function index() {

        $agendas = Agenda::paginate(10);

        return view('admin.agendas.agenda',compact('agendas'));
    }

    public function addAgenda() {
        $events = Event::all();
        $conferences = Conference::all();
        $speakers = Speaker::all();
        return view('admin.agendas.agenda-form' , compact(['events', 'conferences', 'speakers']));
    }

    public function editAgenda($id) {
        $agenda = Agenda::findOrFail($id);
        $events = Event::all();
        $conferences = Conference::all();
        $speakers = Speaker::all();
        return view('admin.agendas.edit-agenda', compact(['agenda', 'events', 'conferences','speakers']));
    }

    public function storeAgenda(AgendaStoreRequest $request) {

        Agenda::create([
            'title' => $request->title,
            'description' => $request->description,
            'event_id' => $request->event_id,
            'start_time' => Carbon::createFromFormat('H:i',$request->start_time)->format('Y-m-d H:i:s'),
            "end_time" =>Carbon::createFromFormat('H:i',$request->end_time)->format('Y-m-d H:i:s'),
            'speaker_id' => $request->speaker_id,
        ]);

        return redirect()->route('admin.agendas');
    }

    public function updateAgenda(AgendaUpdateRequest $request, Agenda $agenda) {

        $currentDate = Carbon::today()->format('Y-m-d');

       $startTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate . ' ' . $request->start_time)
                        ->format('Y-m-d H:i:s');
    $endTime = Carbon::createFromFormat('Y-m-d H:i', $currentDate . ' ' . $request->end_time)
                      ->format('Y-m-d H:i:s');

        $agenda->update([
            'title' => $request->title,
            'description' => $request->description,
            'start_time' => $startTime,
            'end_time' => $endTime,
            'event_id' => $request->event_id,
            'conference_id' => $request->conference_id,
            'speakers_id' => $request->speakers_id
        ]);

        return redirect()->route('admin.agendas');
    }

    public function destroyAgenda($id) {
        $agenda = Agenda::findOrFail($id);

        $agenda->delete();
        return redirect()->route('admin.agendas');
    }
}
