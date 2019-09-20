@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">

        @foreach($messages as $message)
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="bg-info">{{$message->created_at}}</div>
                    <a href="{{route('message.show', $message->id)}}" class="card-header mark">{{ucfirst($message->messageType->type)}}</a>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-columns">{{ ucfirst($message->subject)}}</div>
                                <div class="card-columns">{{ ucfirst($message->message)}}</div>
                                <div class="card-columns">{{ ucfirst($message->sender)}}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
