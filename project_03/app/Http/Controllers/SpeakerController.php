<?php

namespace App\Http\Controllers;

use App\Http\Requests\speaker\SpeakerStoreRequest;
use App\Http\Requests\speaker\SpeakerUpdateRequest;
use Illuminate\Http\Request;
use App\Models\Speaker;
use Exception;
use Illuminate\Support\Facades\Storage;

class SpeakerController extends Controller
{
   public function index () {
      $speakers = Speaker::paginate(10);

    return view('admin.speakers.speakers', compact('speakers'));
   }

   public function addSpeaker() {
    return view('admin.speakers.speaker-form');
   }

   public function editSpeaker($id) {
    $speaker = Speaker::findOrFail($id);

    return view('admin.speakers.edit-speaker', compact('speaker'));
   }


   public function storeSpeaker(SpeakerStoreRequest $request) {
      
      if ($request->hasFile('photo')) {
         $path = $request->file('photo')->store('images/speakers', 'public');

         Speaker::create([
            'name' => $request->name,
            'bio' => $request->bio,
            'photo' => $path
         ]);

         return redirect()->route('admin.speakers');
     }
   }

   public function updateSpeaker(SpeakerUpdateRequest $request, Speaker $speaker) {

      try {

         if ($request->hasFile('photo')) {
             $path = $request->file('photo')->store('images/speakers', 'public');
             
             if ($speaker->photo && Storage::disk('public')->exists($speaker->photo)) {
                 Storage::disk('public')->delete($speaker->photo);
             }
 
             $speaker->update([
                 'name' => $request->name,
                 'bio' => $request->bio,
                 'photo' => $path,
             ]);
         } else {

             $speaker->update([
                 'name' => $request->name,
                 'bio' => $request->bio,
             ]);
         } 

     
   }catch(\Exception $e) {
      $message = $e->getMessage();
   }
   return redirect()->route('admin.speakers');
}

   public function destroySpeaker($id) {
      $speaker = Speaker::findOrFail($id);

      if ($speaker->photo) {
         Storage::disk('public')->delete($speaker->photo);
     }

      $speaker->delete();

      return redirect()->route('admin.speakers');
    
   }
}
