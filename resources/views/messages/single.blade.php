@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        <div class="row justify-content-center pt-5 pb-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-inline text-white" style="background-color: rgba(18,18,18,0.82);">
                        <p class="ml-2 d-inline mr-2">Subject {{ucfirst($message->subject)}}</p>
                        <small class="d-inline ml-5 custom-margin-l">{{$message->created_at}}</small>
                    </div>
                    <div class="card-body">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-columns">{{ $message->message}}</div>
                                    <div class="card-columns mt-4">Sent by: {{ $message->userName->name}}</div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="form-response" class="w-50 mt-3 mr-auto ml-auto">
            <h5>Send your reply</h5>
        <form method="post" action=" {{ route('admin.store') }}" enctype="multipart/form-data">
            @csrf
            {{--            @method('POST')--}}
            <input type="text" name="subject" value="{{$message->subject . ' -reply'}}" class="form-control mt-1">
            <textarea name="message" id="message" class="form-control mt-1" placeholder="Enter message to user">
        </textarea>
            <input type="hidden" name="user" value="{{$message->recip_id}}">
            <input type="hidden" name="type" value="{{$message->type}}">
            <input type="hidden" name="advertId" value="{{$message->userName->name}}">
            <button class="btn alert-success mt-1">Send</button>
        </form>
        </div>
    </div>
@endsection
