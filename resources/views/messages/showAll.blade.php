@extends('layouts.app')
{{----}}

@section('content')
    <div class="container custom-width-70">

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

            <div class="accordion" id="accordionExample">
                <?php $counter = 0;?>
                @foreach($messages as $message)
                    @if($message->status === 1)
                <div class="card border border-success">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                <i class="fas fa-sms" style="font-size: 2em;"> </i> {{$message->subject}} <small>{{$message->sender}} / {{$message->created_at}}</small>
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body">
                            {{$message->message}}
                            <small>{{$message->userName->name}}</small>
                        </div>
                    </div>
                </div>
                    @else
                        <?php $counter++?>
                    <div class="card">
                        <div class="card-header" id="heading<?php echo $counter?>">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse<?php echo $counter?>" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item <?php echo $counter ?>
                                </button>
                            </h2>
                        </div>
                        <div id="collapse<?php echo $counter?>" class="collapse" aria-labelledby="heading<?php echo $counter?>" data-parent="#accordionExample">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
            </div>

    </div>
@endsection
