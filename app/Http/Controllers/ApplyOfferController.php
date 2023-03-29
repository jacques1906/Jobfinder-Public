<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Listing;
use App\Models\User;
use App\Models\Applyoffer;
use Illuminate\Support\Facades\Storage;

class ApplyOfferController extends Controller
{

    // 
    public function show($id){
        $listing_post = Listing::find($id);
        $user = auth()->user();

        // récupérer les informations de l'utilisateur
        $name = $user->name;
        $email = $user->email;

        // récupérer le CV de l'utilisateur
        $cv = null;
        $filename = null;
        if ($user->cv) {
            $cv = Storage::disk('public')->url($user->cv);
            $filename = $user->filename;
        }
        return view('listings.apply_offer',compact('listing_post')
        , [
            'name' => $name,
            'email' => $email,
            'cv' => $cv
        ]);

    }




    public function apply(Request $request, $id)
    {
        $user = auth()->user();

        $applyoffers = DB::table('applyoffers')
        ->where('offer_id', $id)
        ->where('user_id', $user->id)
        ->exists();

    // si l'utilisateur a déjà postulé, rediriger vers la page de l'offre avec un message d'erreur
    if ($applyoffers) {
        return redirect('/dashboard')->with('error', 'Vous avez déjà postulé à cette offre.');
    }

        $data = [
        'offer_id' => $id,
        'user_id' => $user->id,
        'name' => $user->name,
        'email'=>$user->email,
        'cv' => $user->cv,
        'status' => 'en cours',
        ];
        $application = Applyoffer::create($data);

        return redirect('/dashboard')->with('success', 'Votre candidature a été envoyée avec succès.');
    }

    public function treatment($id)
    {
        $show = DB::table('applyoffers')
        ->select('email', 'name', 'cv','offer_id','status')
        ->where('offer_id', $id)        
        ->get();


        return view('listings.treatment',compact('show'));
    }

    public function update(Request $request, $offer_id,$email)
    {

        DB::table('applyoffers')
        ->where('offer_id', $offer_id)
        ->where('email', $email)
        ->update(['status' => $request->status]);

    return redirect('/treatment/'.$offer_id);
    

    }
    

}



