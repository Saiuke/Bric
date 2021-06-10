@extends('layout')

@section('content')
<style>
   .uper {
      margin-top: 40px;
   }
</style>
<div class="uper">
   @if(session()->get('success'))
   <div class="alert alert-success">
      {{ session()->get('success') }}
   </div><br />
   @endif
   <table class="table table-striped">
      <thead>
         <tr>
            <td>ID</td>
            <td>Review Title</td>
            <td>Stars</td>
            <td>Description</td>
            <td colspan="2">Actions</td>
         </tr>
      </thead>
      <tbody>
         @foreach($reviews as $review)
         <tr>
            <td>{{$review->id}}</td>
            <td>{{$review->title}}</td>
            <td>{{$review->stars}}</td>
            <td>{{$review->description}}</td>
            <td><a href="{{ route('reviews.edit', $review->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
               <form action="{{ route('reviews.destroy', $review->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
               </form>
            </td>
         </tr>
         @endforeach
      </tbody>
   </table>
   <div>
      @endsection