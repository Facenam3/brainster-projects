<?php

namespace App\Http\Controllers;

use App\Http\Requests\topics\TopicStoreRequest;
use App\Http\Requests\topics\TopicUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Topic;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $topics = Topic::paginate(10);

        return view('admin.topics.topics',compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.topics.topic-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TopicStoreRequest $request)
    {
        Topic::create([
            'name' => $request->name
        ]);

        return redirect()->route('admin.topics');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $topic = Topic::findOrFail($id);

       return view('admin.topics.topic-edit', compact('topic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TopicUpdateRequest $request, string $id)
    {
        $topic = Topic::findOrFail($id);
        $topic->update($request->all());

        return redirect()->route('admin.topics');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $topic = Topic::findOrFail($id);

        $topic->delete();

        return redirect()->route('admin.topics');
    }
}
