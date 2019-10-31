@extends('layouts.app')
{{----}}
@section('content')
    <div class="container pt-3">
        {{--Check for session messages--}}
        @if(session()->has('message'))
            <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
        @if(session()->has('message_wrong'))
            <div class="alert alert-danger w-25 d-block mr-auto ml-auto text-center" role="alert">
                {{session()->get('message_wrong')}}
            </div>
        @endif
        <div class="title text-center mb-3">
            <h5 class=" mb-3 bg-success p-2 rounded d-inline tex pr-5 pl-5">Message-center</h5>
        </div>
        @if (count($messages) < 1)
            <div class="alert alert-success w-75 d-block mr-auto ml-auto text-center m-5 resize-width" role="alert">
                <h5>No messages</h5>
            </div>
        @endif
        <!--Messages display-->
        <div class="accordion resize-width-40 mr-auto ml-auto" id="accordionExample">
            <?php $counter = 0;?>
            <h2 class="mb-3 mt-5 text-center">Messages</h2>
            @foreach($allUsers as $user)
                    @foreach($messages as $message)
                            <?php $counter++?>
                                @if ($user->id == $message->sender)
                                    <p>Email from: {{$user->name}}</p>
                            
                        @if($message->status == 0 && $message->parent_id != 0)
                            <div class="card border border-success">
                                <div class="card-header" id="heading<?php echo $counter?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter?>" aria-expanded="false" aria-controls="collapse<?php echo $counter?>">
                                            <i class="fi-xwsuxl-envelope-solid" style=""></i> {{$message->subject}} <small>{{$message->sender}} / {{$message->created_at}}</small>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapse<?php echo $counter?>" class="collapse" aria-labelledby="heading<?php echo $counter?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{{$message->message}}</p>
                                        <small class="">{{$message->userName->name}}</small>
                                        <a href="{{route('message.show', $message->id)}}" class="">Reply</a>
                                    </div>
                                </div>
                            </div>
                        @elseif ($message->status == 0 && $message->parent_id == 0)
                            <div class="card">
                                <div class="card-header" id="heading<?php echo $counter?>">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter?>" aria-expanded="false" aria-controls="collapse<?php echo $counter?>">
                                            {{$message->subject}} <small>{{$message->sender}} / {{$message->created_at}}</small>                                </button>
                                    </h2>
                                </div>
                                <div id="collapse<?php echo $counter?>" class="collapse" aria-labelledby="heading<?php echo $counter?>" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <p>{{$message->message}}</p>
                                        <small>Message from: {{$message->userName->name}}</small>
                                        <a href="{{route('message.show', $message->id)}}" class="">Reply</a>
                                    </div>
                                </div>

                            </div>

                        @endif
                                @endif
                    @endforeach

                @endforeach
                <h2 class="mt-3 pt-3 text-center">Replies</h2>
            @foreach($replies as $reply)
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $counter?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter?>" aria-expanded="false" aria-controls="collapse<?php echo $counter?>">
                                    {{$reply->subject}} <small>{{$reply->sender}} / {{$reply->created_at}}</small>                                </button>
                            </h2>
                        </div>
                        <div id="collapse<?php echo $counter?>" class="collapse" aria-labelledby="heading<?php echo $counter?>" data-parent="#accordionExample">
                            <div class="card-body">
                                <p>{{$reply->message}}</p>
                                <small>Message from: {{$reply->userName->name}}</small>
                                <a href="{{route('message.show', $reply->id)}}" class="">Reply</a>
                            </div>
                        </div>

                    </div>
                @endforeach
        </div>
    </div>
@endsection
