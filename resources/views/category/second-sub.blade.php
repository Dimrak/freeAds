@extends('layouts.app')

@section('content')
    @include('pages.tops');
    <div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb p-3 mt-2 w-100 mr-auto ml-auto custom-width-cats">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.show', $father)}}">{{ucfirst($father)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.showSub', $firstParent)}}">{{ucfirst($firstParent)}}</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.showSubSub', $secondSub->slug)}}">{{ucfirst($secondSub->slug)}}</a></li>
        </ol>
    </nav>
        <div id="categoryIndex" class="flexBox w-100">
           <?php $counter = [];?>
            @foreach($secondSub->subCategories as $subcat)
                   <div class="btn btn-outline-primary p-2 rounded w-75 m-2 resize-width">
                    <h5 class="text-left"><a class="text-dark text-dark font-weight-bold" href="{{route('category.showSubSub',$subcat->slug)}}">{{$subcat->title}} with ID:{{$subcat->id}}</a>
                        <small class="count-hide">{{array_push($counter, count($subcat->advertCount))}}</small>
                        <small class="d-inline ml-2 text-success font-weight-bolder">({{$number = array_sum($counter)}})</small>
                       <?php unset($counter)?>
                       <?php $counter = [];?>
                    </h5>
                </div>
            @endforeach
        </div>
        <div class="container w-100">
            @foreach($secondSub->advertsCat as $advert)
                @include('pages.advert-listing.template-adverts')
            @endforeach
        </div>
    </div>
@endsection


