@extends('layouts.app')
@section('content')
    @include('admin.nav-admin');
    <div class="container mt-3">
        <div id="categoryIndexHome" class="flexBox w-75">
            @foreach($categories as $category)
                <div class="fix-width m-2 mb-4">
                    <h5 class="top-menu-list text-left"><a class="text-success"
                                                           href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                    </h5>
                    <ul class="list-group pb-5">
                        @foreach($category->subCategories as $subcat)
                            <li class="w-100 text-dark no-list mr-5 text-left"><a class="text-dark"
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
    {{--<section class="mb-4">--}}
        {{--<div class="album py-5 bg-light">--}}
            {{--<div class="container">--}}
                {{--<div class="text-center">--}}
                    {{--<h5 class="rounded bg-dark text-white d-inline pr-3 pl-3 pt-1 pb-1">Active adverts</h5>--}}
                {{--</div>--}}
                {{--<div class="row mb-5" style="">--}}
                    {{--@foreach($advertsAct as $advert)--}}
                        {{--<div class="col-md-2 p-3">--}}
                            {{--<div class="card mb-4 shadow-sm">--}}
                                {{--<img src="{{$advert-> image}}" class="card-img-top" alt="{{ $advert->slug}}" style="height: 100px">--}}
                                {{--<div class="card-body">--}}
                                    {{--<h5 class="card-title">{{$advert->title}}</h5>--}}
{{--                                    <p class="card-text">{!! html_entity_decode(Str::words($advert->content,5,'....'),ENT_QUOTES, 'UTF-8')!!}</p>--}}
                                    {{--<div class="d-flex justify-content-between align-items-center">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-sm btn-outline-secondary"><a--}}
                                                    {{--href="{{ route('advert.show', $advert->slug)}}"--}}
                                                    {{--class="text-decoration-none">View</a></button>--}}
                                            {{--<button type="button" class="btn btn-sm btn-outline-secondary"><a--}}
                                                    {{--href="{{route('advert.edit', $advert->id)}}"--}}
                                                    {{--class="text-decoration-none">Edit</a></button>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                    {{--<form action="{{action('AdvertController@destroy',['id'=>$advert->id])}}"--}}
                                          {{--method="Post">--}}
                                        {{--@method('DELETE')--}}
                                        {{--@csrf--}}
                                        {{--<input type="submit" class="btn btn-sm p-1 bg-danger text-white mt-3 text-center" name="submit" value="Disable">--}}
                                    {{--</form>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<div class="text-center">--}}
                    {{--<h5 class="rounded bg-dark text-white d-inline pr-3 pl-3 pt-1 pb-1">Disabled adverts</h5>--}}
                {{--</div>--}}
                {{--<div class="row">--}}
                    {{--@foreach($advertsDis as $advert)--}}
                        {{--<div class="col-md-2 p-3">--}}
                            {{--<div class="card mb-4 shadow-sm">--}}
                                {{--<img src="{{$advert-> image}}" class="card-img-top" alt="{{ $advert->slug}}" style="height: 100px">--}}
                                {{--<div class="card-body">--}}
                                    {{--<h5 class="card-title">{{$advert->title}}</h5>--}}
{{--                                    <p class="card-text">{!! html_entity_decode(Str::words($advert->content,12,'....'),ENT_QUOTES, 'UTF-8')!!}</p>--}}
                                    {{--<div class="d-flex justify-content-between align-items-center">--}}
                                        {{--<div class="btn-group">--}}
                                            {{--<button type="button" class="btn btn-sm btn-outline-secondary"><a--}}
                                                    {{--href="{{ route('advert.show', $advert->slug)}}"--}}
                                                    {{--class="text-decoration-none">View</a></button>--}}
                                            {{--<button type="button" class="btn btn-sm btn-outline-secondary"><a--}}
                                                    {{--href="{{route('advert.edit', $advert->id)}}"--}}
                                                    {{--class="text-decoration-none">Edit</a></button>--}}
                                        {{--</div>--}}
                                        {{--<form action="{{action('AdvertController@destroy',['id'=>$advert->id])}}"--}}
                                        {{--<form action="{{route('AdvertController@disable', $advert->id)}}"--}}
                                              {{--method="post">--}}
                                            {{--@method('DELETE')--}}
                                            {{--@csrf--}}
                                            {{--<input type="submit" class="btn btn-sm p-1 bg-danger text-white mt-3 text-center" value="Disable">--}}
                                        {{--</form>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--</div>--}}
                {{--<a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>--}}
                {{--<a class="badge badge-warning p-2" href="{{route('category.create')}}">Create advert</a>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</section>--}}
@endsection
