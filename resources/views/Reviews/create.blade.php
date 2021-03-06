@extends('layout')

@section('content')
<style>
   .uper {
      margin-top: 40px;
   }
</style>
<div class="card uper">
   <div class="card-header">
      Submit your review
   </div>
   <div class="card-body">
      @if ($errors->any())
      <div class="alert alert-danger">
         <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
         </ul>
      </div><br />
      @endif
      <form method="post" action="{{ route('reviews.store') }}">
         <div class="form-group">
            @csrf
            <label for="title">Title:</label>
            <input type="text" class="form-control" name="title" require/>
         </div>
         <div class="form-group">
            <label for="stars">How many stars:</label>
            <input type="number" min="0" max="5" class="form-control" name="stars" require />
         </div>
         <div class="form-group">
            <label for="description">Your review:</label>
            <input type="text" class="form-control" name="description" require/>
         </div>
         <button type="submit" class="btn btn-primary">Submit</button>
      </form>
   </div>
</div>
@endsection