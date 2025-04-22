<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUser;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\UserResource;
use Nnjeim\World\Facades\World;
use Nnjeim\World\Models\Country;
use Nnjeim\World\WorldHelper;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
   public function index() {
    $users = User::all();
    return view('admin.dashboard', compact('users'));
   }

   public function users() {
      $users = User::paginate(10);
      return view('users.users', compact('users'));
   }

   public function addUserForm(WorldHelper $world) {
      $countries = $world->countries()->data;
      return view('users.form', compact('countries'));
   }

   public function editUser($userId){
      $user = User::findOrFail($userId);

      return view('users.edit', compact('user'));
   }



   public function storeUser(UserStoreRequest $request) {



            if ($request->hasFile('profile_picture')) {
               $path = $request->file('profile_picture')->store('images', 'public');
           }

            if ($request->hasFile('cv_upload')) {
               $cvPath = $request->file('cv_upload')->store('Cv', 'public');
           }

            User::create([
               'name' => $request->name,
               'surname' => $request->surname,
               'email' => $request->email,
               'password' =>Hash::make($request->password),
               'title' => $request->title,
               'phone' => $request->phone,
               'city' => $request->city,
               'country_id' => $request->country_id,
               'bio' => $request->bio,
               'userType' => $request->userType,
               'profile_picture' => $path,
               'cv_upload' => $cvPath
            ]);

            return redirect()->route('admin.users-form')->with('succes','Created');     

    
   }

   public function destroy($userId) {
      $user = User::findOrFail($userId);
      

      if (!$user) {
          return response()->json(['message' => 'User not found'], 404);
      }
  
      try {
         if ($user->profile_picture && Storage::disk('public')->exists($user->profile_picture)) {
            Storage::disk('public')->delete($user->profile_picture);
        }
          $user->delete();
          return redirect()->route('admin.users');
      } catch (\Exception $e) {
          return response()->json(['message' => 'Could not delete user', 'error' => $e->getMessage()], 500);
      }
  }

  public function update(UpdateUser $request, User $user)
  {
      $user->update($request->all());

      return redirect()->route('admin.users');
  }

}
