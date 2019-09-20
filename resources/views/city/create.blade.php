@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <form method="post" action=" {{ route('city.store') }}">
                            @csrf
                            <input type="text" name="cityName" placeholder="Title" class="form-control mt-1">

                            <button class="btn alert-success mt-1">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
