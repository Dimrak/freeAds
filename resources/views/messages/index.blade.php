@extends('layouts.app')
{{----}}

@section('content')
    <div class="container pt-3">

        @foreach($messages as $message)
            {{--        <div class="row justify-content-center mt-2">--}}
            {{--            <div class="col-md-8">--}}
            {{--                <div class="card">--}}
            {{--                    <div class="bg-info">{{$message->created_at}}</div>--}}
            {{--                    <a href="{{route('message.show', $message->id)}}" class="card-header mark">{{ucfirst($message->messageType->type)}}</a>--}}
            {{--                    <div class="card-body">--}}
            {{--                        <div class="card">--}}
            {{--                            <div class="card-body">--}}
            {{--                                <div class="card-columns">{{ ucfirst($message->subject)}}</div>--}}
            {{--                                <div class="card-columns">{{ ucfirst($message->message)}}</div>--}}
            {{--                                <div class="card-columns">{{ ucfirst($message->sender)}}</div>--}}
            {{--                            </div>--}}
            {{--                        </div>--}}
            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </div>--}}
            {{--        </div>--}}
        @endforeach

        <div class="accordion resize-width-40 mr-auto ml-auto" id="accordionExample">
            <?php $counter = 0;?>

            @foreach($messages as $message)
                    <?php $counter++?>
                @if($message->status === 1)
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
                @else
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
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

    </div>
@endsection
