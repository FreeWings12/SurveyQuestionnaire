@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $questionnaire->title }}</h1>

                <form action="/surveys/{{ $questionnaire->id }}-{{ Str::slug($questionnaire->title) }}" method="post">
                    @csrf
                    @foreach($questionnaire->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header"> <strong> {{ $key + 1 }} </strong> {{ $question->question }}</div>
                           
                            <div class="card-body">   
                                @error('responses.' .$key. '.answer_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror

                                <ul class="list-group">
                                    @foreach($question->answers as $answer)
                                        <label for="answer{{ $answer->id }}">
                                            <li class="list-group-item">

                                                <input class="form-control" type="hidden" 
                                                name="responses[{{ $key }}][question_id]" 
                                                value="{{ $question->id }}">

                                                <input type="radio" name="responses[{{ $key }}][answer_id]" 
                                                        id="answer{{ $answer->id }}"
                                                        {{ (old('responses.' .$key. '.answer_id') == $answer->id) ? 'checked' : '' }} 
                                                        class="mr-2" value="{{ $answer->id }}">
                                                        {{ $answer->answer }}
                                            </li>
                                        </label>
                                    @endforeach
                                </ul>
                            
                            </div>
                        </div>
                    @endforeach

                    <div class="card mt-4">
                        <div class="card-header">Your Information</div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" name="survey[name]"
                                        value = "{{old('survey.name') ?? ''}}" >

                                @error('survey.name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                
                            </div>
        
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="survey[email]"
                                        value = "{{old('survey.email') ?? ''}}" >

                                @error('survey.email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success d-block m-auto">Complete Survey</button>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
@endsection





    
