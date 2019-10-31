@extends('layouts.app')

@section('content')
    @include('pages.tops');
    <div class="container">
    <nav aria-label="breadcrumb" class="">
        <ol class="breadcrumb p-3 mt-2 w-100 mr-auto ml-auto custom-width-cats">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('category.show', $category->slug)}}">{{ucfirst($category->title)}}</a></li>
        </ol>
    </nav>
        <div id="categoryIndex" class="flexBox-custom w-100">
                        <?php $counter = [];?>
                            @foreach($category->subCategories as $subcat)
                            <div class="btn btn-outline-primary p-2 rounded w-75 m-2 resize-width">
                                <h5 class="text-left"><a class="text-dark text-dark font-weight-bold" href="{{route('category.showSub',$subcat->slug)}}">{{$subcat->title}} </a>
                                    @foreach ($subcat->subCategories as $secondSub)
                                        <small class="count-hide">{{array_push($counter, count($secondSub->advertCount))}}</small>
                                    @endforeach
                                        <small class="d-inline ml-2 text-success font-weight-bolder">({{$number = array_sum($counter)}})</small>
                                   <?php unset($counter)?>
                                   <?php $counter = [];?>
                                </h5>
                            </div>
                            @endforeach
                 </div>
        <div class="container w-100">
            {{--This is only showing the adverts which are only in the secondSubcategories--}}
            @foreach($category->subCategories as $subcat)
                @foreach($subcat->subCategories as $secondSub)
                    @foreach($secondSub->advertsCat as $advert)
                            @include('pages.advert-listing.template-adverts')
                    @endforeach
                @endforeach
            @endforeach

        </div>
    </div>
@endsection


