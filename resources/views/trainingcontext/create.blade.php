@extends('layouts.app')
@section("title", $viewData["title"])
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create trainingcontext</div>
          <div class="card-body">
            @if($errors->any())
            <ul id="errors" class="alert alert-danger list-unstyled">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif  
            <form method="POST" action="{{ route('trainingcontext.save') }}" >
                @csrf
                <div>
                    <label for="time">Time:</label>
                    <input type="text" id="time" name="time">
                </div>
                <div>
                    <label for="place">Place:</label>
                    <input type="text" id="place" name="place">
                </div>
                <div>
                    <label for="frequency">Frequency:</label>
                    <input type="text" id="frequency" name="frequency">
                </div>
                <div>
                    <label for="level">Level:</label>
                    <input type="text" id="level" name="level">
                </div>
                <div>
                    <label for="objectives">Objectives:</label>
                    <textarea id="objectives" name="objectives"></textarea>
                </div>
                <div>
                    <label for="specifications">Specifications:</label>
                    <textarea id="specifications" name="specifications"></textarea>
                </div>
                <div>
                    <button type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 