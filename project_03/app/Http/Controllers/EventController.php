<?php

namespace App\Http\Controllers;

use App\Http\Requests\event\EventStoreRequest;
use App\Http\Requests\event\EventUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Speaker;
use App\Models\Ticket;

class EventController extends Controller
{
    public function index() {
        $events = Event::with('speaker')->paginate(10);
        return view('admin.events.events', compact('events'));
    }

    public function addEvent() {
        $speakers = Speaker::all();
        $tickets = Ticket::all();
        return view('admin.events.event-form' ,compact(['speakers', 'tickets']));
    }

    public function editEvent($id){
       $event = Event::findOrFail($id);
       $speakers = Speaker::all();
       $tickets = Ticket::all();
       return view('admin.events.edit-event', compact(['event', 'speakers', 'tickets']));
    } 

    public function eventStore(EventStoreRequest $request){

        Event::create([
            'title' => $request->title,
            'theme' => $request->theme,
            'objective' => $request->objective,
            'date' => $request->date,
            'location' => $request->location,
            'description' => $request->description,
            'ticket_id' => $request->ticket_id,
            'speaker_id' => $request->speaker_id
        ]);

        return redirect()->route('admin.events');
    }

    public function updateEvent(EventUpdateRequest $request, Event $event) {
        $event->update($request->all());

        return redirect()->route('admin.events');
    }

    public function destroyEvent($eventId) {
        $event = Event::findOrFail($eventId);

        $event->delete();
        return redirect()->route('admin.events');
    }
}
