@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Inbox</div>
                @foreach($messages as $message)

                    <div class="card-body">
                        <div class="card">
                            @if($message->status != 0)
                                <a href="#" class="badge badge-success">New message</a>
                            @else
                                <a href="#" class="badge badge-light">Old message</a>
                            @endif
                                <div class="card-body">
                                <div class="card-columns">{{ $message->subject}}</div>
                                <div class="card-columns">{{ $message->message}}</div>
                                <div class="card-columns">{{ $message->sender}}</div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
