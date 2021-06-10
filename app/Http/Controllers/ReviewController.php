<?php

namespace App\Http\Controllers;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\NotificationMail;

class ReviewController extends Controller
{

   private function sendNotification(string $messageToSend, string $toEmail){
      Mail::to($toEmail)->send(new NotificationMail($messageToSend));
   }

   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {

      $reviews = Review::all()->sortByDesc("updated_at");
      return view('reviews.index', compact('reviews'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      return view('Reviews.create');
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request)
   {
      $request->validate([
         'title' => 'required|max:255',
         'stars' => 'required|numeric|min:0|max:5',
         'description' => 'required',
      ]);

      $newReview = new Review([
         'title' => $request->get('title'),
         'stars' => $request->get('stars'),
         'description' => $request->get('description'),
      ]);
      $newReview->save();
      
      $this->sendNotification("A new review was submitted.", "ezequias@hotmail.com.br");
      return redirect('/reviews')->with('success', 'Review stored successfully');
   }

   /**
    * Display the specified resource.
    *
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
   public function show(Review $review)
   {
      //
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      $review = Review::find($id);
      return view('reviews.edit', compact('review'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      $request->validate([
         'title' => 'required|max:255',
         'stars' => 'required|numeric|min:0|max:5',
         'description' => 'required',
      ]);

      $currentReview = Review::find($id);
      $currentReview->title = $request->get('title');
      $currentReview->stars = $request->get('stars');
      $currentReview->description = $request->get('description');
      $currentReview->save();

      $this->sendNotification("A review was updated.", "ezequias@hotmail.com.br");
      return redirect('/reviews')->with('success', 'Review has been updated successfully');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Review  $review
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      $currentReview = Review::find($id);
      $currentReview->delete();
      $this->sendNotification("A review was deleted.", "ezequias@hotmail.com.br");
      return redirect('/reviews')->with('success', 'Review has been deleted successfully');
   }
}
