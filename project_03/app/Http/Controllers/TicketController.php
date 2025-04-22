<?php

namespace App\Http\Controllers;

use App\Http\Requests\tickets\TicketStoreRequest;
use App\Http\Requests\tickets\TicketUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Conference;
use App\Models\Event;
class TicketController extends Controller
{
    public function index() {
        $tickets = Ticket::paginate(10);
        return view('admin.tickets.tickets', compact('tickets'));
    }

    public function form() {

        return view('admin.tickets.form');
    }

    public function edit($id) {
        $ticket = Ticket::findOrFail($id);

        return view('admin.tickets.edit-ticket', compact('ticket'));
    }

    public function store(TicketStoreRequest $request) {
        Ticket::create([
            'price' => $request->price
        ]);

        return redirect()->route('admin.tickets');
    }

    public function update(TicketUpdateRequest $request, Ticket $ticket) {
        $ticket->update($request->all());

        return redirect()->route('admin.tickets');
    }

    public function delete($id) {
        $ticket = Ticket::findOrFail($id);

        $ticket->delete();

        return redirect()->route('admin.tickets');
    }
}
