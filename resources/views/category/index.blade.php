@extends('layouts.app')
@section('content')
    @include('pages.tops')

    @if(session()->has('message'))
        <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    {{--Static view for the latest adverts--}}
    <div class="w-100 custom-bg border-bottom border-dark d-none latest-adverts">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <h5 class="pt-2 mr-auto ml-auto text-center text-center mt-5 w-75 font-weight-bolder">Latest adverts</h5>
                </div>
            @foreach($adverts as $advert)
                <div class="col-md-1 foto-hover text-center">
                    <a href="{{route('advert.show', $advert->slug)}}">
                    <img src="{{$advert->image}}" class="img-thumbnail card-img w-100 custom-shape p-1" alt="{{$advert->slug}}">
                    <p class="card-text"><small class="text-muted">{{$advert->updated_at}}</small></p>
                    </a>
                </div>
                <div class="col-md-1 mr-auto ml-auto">
                    <div class="card-body text-left">
                        <h4 class="card-title">{{ucfirst($advert->title)}}</h4>
                        <p class="card-text">Price <small>{{$advert->price}} </small></p>
                    </div>
                </div>
            @endforeach
                <div class="col-md-2"></div>
            </div>
        </div>

    {{--End static view--}}
        <div class="container pt-2">
            <div id="categoryIndexHome" class="w-100">
                <div class="row">
                    <div class="col-sm-10 col-md-8 flexBox ">
                @foreach($categories as $category)
                    <div class="fix-width mr-auto ml-auto">
                        <h5 class="top-menu-list custom-text-left"><a class="text-success"
                                                               href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                        </h5>
                        <ul class="list-group pb-5">
                            @foreach($category->subCategories as $subcat)
                                <li class="w-100 text-dark no-list mr-5 custom-text-left"><a class="text-dark"
                                                                                      href="{{route('category.showSub',$subcat->slug)}}">{{$subcat->title}}</a>
                                    @foreach ($subcat->secondSubcat as $secondSub)
                                        <small
                                            class="count-hide">{{array_push($counter, count($secondSub->advertCount))}}</small>
                                    @endforeach
                                    <small>({{$number = array_sum($counter)}})</small>
                                    <?php unset($counter)?>
                                    <?php $counter = [];?>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
                    </div>
                    <div class="col-sm-8 col-md-4">
                        <display-search></display-search>
                    </div>
                </div>
            </div>
            {{--<div id="app">--}}
                {{--<file-upload></file-upload>--}}
            {{--</div>--}}
<!--            --><?php
//            $startime = microtime(true);
//            $endtime = microtime(true);
//            for($i = 0; $i < 1000; $i++){
//                print "Hello world";
//            }
//            echo $endtime - $startime;
////            echo $endtime;
////            echo $startime;
//
//            ?>
        </div>
@endsection
{{--<script src="{{ mix('js/app.js') }}"></script>--}}
