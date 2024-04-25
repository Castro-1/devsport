<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.admin')
@section('title', __('admin.title'))
@section('content')
<div class="card">
  <div class="card-header">
    {{ __('admin.title') }}
  </div>
  <div class="card-body">
    {{ __('admin.content') }}
  </div>
</div>
@endsection
