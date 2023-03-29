<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Applyoffer;
use App\Models\Listing;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Profile\Add_infoController;



Route::get('users', [UserController::class, 'index'])->name('users.index');

Route::get('/', [Controllers\ListingController::class, 'index'])
    ->name('listings.index');

Route::get('/new', [Controllers\ListingController::class, 'create'])
    ->name('listings.create');

Route::post('/new', [Controllers\ListingController::class, 'store'])
    ->name('listings.store');

    Route::get('/dashboard', function (\Illuminate\Http\Request $request) {
        $user = $request->user();
    
        if ($user->role == 'Human_Resource') {
            $listings = $user->listings;
        } else {
            $applyoffers = Applyoffer::where('user_id', $user->id)->get();
            $listings = collect();
            foreach ($applyoffers as $applyoffer) {
                $listing = Listing::find($applyoffer->offer_id);
                if ($listing) {
                    $listing->status = $applyoffer->status;
                    $listings->push($listing);
                }
            }
        }
        return view('dashboard', [
            'listings' => $listings
        ]);
    })->middleware(['auth'])->name('dashboard');
    


Route::get('/apply_offer/{id}', [Controllers\ApplyOfferController::class, 'show'])
    ->name('/apply_offer');

route::post('/apply/{id}',[Controllers\ApplyOfferController::class,'apply']);


Route::get('/treatment/{id}', [Controllers\ApplyOfferController::class, 'treatment'])
    ->name('/treatment');

Route::post('/update_status/{offer_id}/{email}', [Controllers\ApplyOfferController::class, 'update'])->name('update_status');

// Route::post('/update_status/{offer_id}', function(){
//     return view('/');
// });

   
Route::get('/detail/{id}', [Controllers\CommentController::class, 'index'])
    ->name('detail');

Route::post('/detail/{id}/comments', [Controllers\CommentController::class, 'store']);


Route::get('/edit/{id}', [Controllers\ListingController::class, 'edit'])
    ->name('listings.edit');
    
Route::put('/update-data/{id}', [Controllers\ListingController::class, 'update']);

Route::get('/delete/{id}', [Controllers\ListingController::class, 'delete'])
    ->name('listings.edit');

Route::get('/delete/{id}', [Controllers\ListingController::class, 'delete'])
    ->name('listings.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/add_info', [Add_infoController::class, 'update'])->name('profile.add_info');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/{listing}', [Controllers\ListingController::class, 'show'])
    ->name('listings.show');

Route::get('/{listing}/apply', [Controllers\ListingController::class, 'apply'])
    ->name('listings.apply');


