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
            <form class="form-row row" method="POST" action="{{ route('trainingcontext.save') }}" >
                @csrf
                <div class="form-group col-md-6">
                    <label for="time">Time:</label>
                    <br>
                    <input class="form-control"  type="text" id="time" name="time">
                </div>
                <div class="form-group col-md-6">
                    <label for="place">Place:</label>
                    <br>
                    <input class="form-control" type="text" id="place" name="place">
                </div>
                <div class="form-group col-md-6">
                    <label for="frequency">Frequency:</label>
                    <br>
                    <input class="form-control" type="text" id="frequency" name="frequency">
                </div>
                <div class="form-group col-md-6">
                    <label for="objectives">Objectives:</label>
                    <br>
                    <textarea class="form-control" id="objectives" name="objectives"></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="specifications">Specifications:</label>
                    <br>
                    <textarea class="form-control" id="specifications" name="specifications"></textarea>
                </div>
                <br>
                <div>
                    <button class="btn btn-outline-secondary mb-2" type="submit">Submit</button>
                </div>
            </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection 