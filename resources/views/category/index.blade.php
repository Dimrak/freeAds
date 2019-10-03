@extends('layouts.app')
@section('content')

    <div class="w-100 custom-bg border-bottom border-dark">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <h5 class="pt-2 mr-auto ml-auto text-center text-center mt-5 w-75 font-weight-bolder" style="color: #171516; border-bottom: 2px solid white">Latest adverts</h5>
                </div>
            @foreach($adverts as $advert)
                <div class="col-md-1 foto-hover">
                    <a href="{{route('advert.show', $advert->slug)}}">
                    <img src="{{$advert->image}}" class="card-img h-50 w-100 foto-hover" alt="{{$advert->slug}}">
                    <p class="card-text"><small class="text-muted">{{$advert->updated_at}}</small></p>
                    </a>
                </div>
                <div class="col-md-1 mr-3" >
                    <div class="card-body">
                        <h5 class="card-title">{{ucfirst($advert->title)}}</h5>
                        {{--<p class="card-text">This is a wider card with supporting</p>--}}
                        <p class="card-text">Price <small>{{$advert->price}} </small></p>

                    </div>
                </div>
            @endforeach
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="container">
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
@endsection
