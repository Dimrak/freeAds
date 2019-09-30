<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <ul class="navbar-nav mr-auto">
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
    </ul>
</nav>













