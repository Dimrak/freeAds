@extends('layouts.app')
@section('content')
    <div class="container">
        <div id="categoryIndexHome" class="flexBox w-100">
            @foreach($categories as $category)
            <div class="fix-width m-2 mb-4">
                <h5 class="top-menu-list text-left"><a class="text-success" href="{{route('category.show', $category->slug)}}">{{$category->title}}</a></h5>
                <ul class="list-group pb-5">
                @foreach($category->subCategories as $subcat)
                    <li class="w-100 text-dark no-list mr-5 text-left"><a class="text-dark" href="{{route('category.showSub',$subcat->slug)}}">{{$subcat->title}}</a>
                        @foreach ($subcat->secondSubcat as $secondSub)
                            <small class="count-hide">{{array_push($counter, count($secondSub->advertCount))}}</small>
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
    </div>
@endsection
