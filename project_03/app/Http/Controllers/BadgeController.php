<?php

namespace App\Http\Controllers;

use App\Http\Requests\badge\BadgeStoreRequest;
use Illuminate\Http\Request;
use App\Models\Badge;
use Illuminate\Support\Facades\Storage;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $badges = Badge::paginate(10);
        return view('admin.badges.badges', compact('badges'));
    }

    /**
     * 

     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.badges.badge-form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BadgeStoreRequest $request)
    {   

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('images/badges', 'public');
        }
            Badge::create([
                'name' => $request->name,
                'description' => $request->description,
                'photo' => $path
            ]);
         

         return redirect()->route('admin.badges');
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
        $badge = Badge::findOrFail($id);

        return view('admin.badges.badge-edit', compact('badge'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $badge = Badge::findOrFail($id);
        try {

            if ($request->hasFile('photo')) {
                $path = $request->file('photo')->store('images/speakers', 'public');
                
                if ($badge->photo && Storage::disk('public')->exists($badge->photo)) {
                    Storage::disk('public')->delete($badge->photo);
                }
    
                $badge->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'photo' => $path,
                ]);
            } else {
   
                $badge->update([
                    'name' => $request->name,
                    'description' => $request->description,
                ]);
            } 
   
        
      }catch(\Exception $e) {
         $message = $e->getMessage();
      }
      return redirect()->route('admin.badges');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $badge = Badge::findOrFail($id);
        $badge->delete();

        return redirect()->route('admin.badges');
    }
}
