<!-- Author: Sara María Castrillón Ríos -->

@extends('layouts.app') 
@section('title', __('purchase.purchase_completed_title')) 
@section('subtitle', $viewData["subtitle"]) 
@section('content') 
<div class="card"> 
  <div class="card-header"> 
    {{ __('purchase.purchase_completed_title') }} 
  </div> 
  <div class="card-body"> 
    <div class="alert alert-success" role="alert"> 
      {{ __('purchase.purchase_completed_message') }} <b>#{{ $viewData["order"]->getId() }}</b> 
    </div> 
  </div> 
</div> 
@endsection 
