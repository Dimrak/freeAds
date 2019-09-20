@extends('layouts.app')


@section('content')
{{--    <p>{{ hello('to the visitor of this page') }}</p>--}}
    <div class="container">
        <div class="search">
        <form class="form-inline my-2 my-lg-0" action="{{''}}" method="post">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        </div>
    </div>
    <section id="categoryIndex">
        @foreach($categories as $category)
        <div class="flexContainer">
            <figure class="flex-item-cat">
                <img src="{{ $category->image}}" class="card-img" alt="{{$category->slug}}" >
                <figcaption>
                    <a href="{{route('category.show', $category->slug)}}">
                        <h2><span>{{$category->title}}</span></h2>
                    </a>
                </figcaption>
            </figure>

            <div class="desktopBig">
                @foreach($category->advertsCat as $advert)
                    <figure class="flex-item-advert-desktop">
                        <a href="{{route('advert.show', $advert->slug)}}">
                        <img src="{{ $advert->image}}" class="card-img-small" alt="{{$advert->slug}}">
                        </a>
                        <figcaption>
                            <h3>{{$advert->title}}</h3>
                            <h4>
                                {{$advert->price}}
                            </h4>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
            <div class="desktopSmall">
                @foreach($category->advertsDesktop as $advert)
                    <figure class="flex-item-advert-desktop">
                        <a href="{{route('advert.show', $advert->slug)}}">
                        <img src="{{ $advert->image}}" class="card-img-small" alt="{{$advert->slug}}">
                        </a>
                        <figcaption>
                            <h3>{{$advert->title}}</h3>
                            <h4>
                                {{$advert->price}}
                            </h4>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
        @endforeach
    </section>

@endsection

@foreach($category->subCategories as $category)
    <p>
        <a href="{{ route('category.show', $category->slug)}}">{{$category->title}}
        </a>
    </p>
@endforeach

