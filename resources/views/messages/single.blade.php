@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Skelbimai</div>

                    <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-columns">{{ $message->subject}}</div>
                                    <div class="card-columns">{{ $message->message}}</div>
                                    <div class="card-columns">{{ $message->sender}}</div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
