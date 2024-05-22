{{-- Andrés Prada Rodriguez --}}

@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['title'])
@section('content')
    <h1>{{ __('trainingcontext.training_contexts') }}</h1>
    @if (is_null($viewData['user']->getAge()))
        <p>{{ __('trainingcontext.update_profile_message') }}</p>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form class="form-row row" action="{{ route('user.update', $viewData) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="age" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.age') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="age" id="age" class="form-control @error('age') is-invalid @enderror" value="{{ old('age', $viewData['user']->age) }}" required min="15" oninput="if(this.value<15)this.value='15';">
                                
                                <small class="form-text text-muted">{{ __('Years') }}</small>

                                @error('age')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="weight" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.weight') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="weight" id="weight" class="form-control @error('weight') is-invalid @enderror" value="{{ old('weight', $viewData['user']->weight) }}" step="any" required min="0" oninput="if(this.value<0)this.value='0';">
                                
                                <small class="form-text text-muted">{{ __('kg') }}</small>

                                @error('weight')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="height" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.height') }}</label>

                            <div class="col-md-6">
                                <input type="number" name="height" id="height" class="form-control @error('height') is-invalid @enderror" value="{{ old('height', $viewData['user']->height) }}" step="any" required min="0" oninput="if(this.value<0)this.value='0';">
                                
                                <small class="form-text text-muted">{{ __('m') }}</small>

                                @error('height')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('trainingcontext.gender') }}</label>

                            <div class="col-md-6">
                                <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror" required>
                                    <option value="male" {{ old('gender', $viewData['user']->gender) === 'male' ? 'selected' : '' }}>{{ __('trainingcontext.male') }}</option>
                                    <option value="female" {{ old('gender', $viewData['user']->gender) === 'female' ? 'selected' : '' }}>{{ __('trainingcontext.female') }}</option>
                                    <option value="other" {{ old('gender', $viewData['user']->gender) === 'other' ? 'selected' : '' }}>{{ __('trainingcontext.other') }}</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-secondary mb-2">
                                    {{ __('trainingcontext.update_button') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    @else
        @if ($viewData['trainingcontexts']->isEmpty())
            <p>{{ __('trainingcontext.no_training_contexts_found') }}</p>
            <a class="btn btn-outline-secondary mb-2" href="{{ route('trainingcontext.create') }}">{{ __('trainingcontext.create_new_context_button') }}</a>
        @else
            <ul>
                @foreach ($viewData['trainingcontexts'] as $trainingcontext)
                    <div class="mb-3">
                        <div class="card">
                            <div class="card-body d-flex justify-content-between">
                                <h5 class="card-title">{{ $trainingcontext->getName() }}</h5>
                                <a href="{{ route('trainingcontext.show', $trainingcontext->getId() ) }}" class="btn btn-outline-secondary">{{ __('trainingcontext.view_details_button') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </ul>
            <a class="btn btn-outline-secondary mb-2" href="{{ route('trainingcontext.create') }}">{{ __('trainingcontext.create_new_context_button') }}</a>
        @endif
    @endif
@endsection
