{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
    {{--<ul class="navbar-nav mr-auto">--}}
        {{--@foreach($categories as $category)--}}
            {{--see if the category has any subcategories and if no extra subcatgories will display just that item with this specifications--}}
            {{--@if(count($category->subCategories) === 0)--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#"  role="button">{{$category->title}}</a>--}}
            {{--@else--}}
        {{--If not will make the category a dropdown menu--}}
                {{--<li class="nav-item dropdown">--}}
                    {{--<a class="nav-link dropdown-toggle" href="#"  role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{$category->title}}</a>--}}

                    {{--<div class="dropdown-menu" aria-labelledby="navbarDropdown">--}}
                        {{--Which would them display the found subcategories--}}
                        {{--@foreach($category->subCategories as $subCategory)--}}
                            {{--<a class="dropdown-item" href={{route('category.show', $subCategory->slug)}}>{{$subCategory->title}}</a>--}}
                        {{--@endforeach--}}
                    {{--</div>--}}
                    {{--@endif--}}
                {{--</li>--}}
                {{--@endforeach--}}

    {{--</ul>--}}

{{--</nav>--}}
<div class="search w-100 p-2 ">
    <a href="{{route('advert.createTemplate')}}" class="btn btn-primary my-2 d-inline-block">Create advert</a>

    <form class="form-inline my-2 my-lg-0 d-inline" action="{{route('search.searching')}}" method="get">
        @csrf
        <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>













