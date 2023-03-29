<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdd_infoRequest;
use Illuminate\Support\Facades\Storage;



class Add_infoController extends Controller
{
    //
    public function update(UpdateAdd_infoRequest $requests){

        $file = $requests->file('cv');
        $path = $file->store('cv', 'public');
        $filename = $file->getClientOriginalName();
    
        $data = [
            'cv' => $path,
            'formation' => request('formation'),
            'campus' => request('campus'),
            'filename' => $filename
        ];
        $path=Storage::disk('public')->put('cv',$requests->file('cv'));
        
        if($oldcv = $requests->user()->cv){
            Storage::disk('public')->delete($oldcv);
        }

        auth()->user()->update($data);
    
        return redirect(route('profile.edit'));
    }
}
