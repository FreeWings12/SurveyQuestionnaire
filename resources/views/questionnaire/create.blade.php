@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crate New Questionnaire</div>

                <div class="card-body">
                
                    <form action="{{ route('questionnaire.store') }}" method="post">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                            <small id="titleHelp" class="form-text text-muted">Give your questionnaire a title that attracts attention.</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purpose">Purpose</label>
                            <input type="text" name="purpose" class="form-control" id="purpose" aria-describedby="purposeHelp" placeholder="Enter Purpose">
                            <small id="purposeHelp" class="form-text text-muted">Giving a purpose will increase response.</small>

                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Create New Questionnaire</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
