@if(request()->route()->getName() === ('admin.index') ||
request()->route()->getName() === ('admin.create'))
    <h4 class="alert alert-info text-center w-25 mr-auto ml-auto mt-2 text-dark">Admin panel</h4>
    @else
<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">Free adverts</h1>
        <p class="lead text-muted"></p>
        <p>
{{--            @hasanyrole('admin')--}}
            @if(Auth::user())
            {{--<a href="{{route('advert.chooseCateg')}}" class="btn btn-primary my-2">Create advert</a>--}}
                <a href="{{route('advert.index')}}" class="btn btn-danger my-2">All adverts</a>
            <a href="{{route('advert.create')}}" class="btn btn-primary my-2">Create advert</a>
            <a href="{{route('category.categories')}}" class="btn btn-success my-2">View categories</a>
            @endif
            {{--<a href="{{route('advert.index')}}" class="btn btn-danger my-2 d-block w-25 ml-auto mr-auto">All adverts</a>--}}
{{--            @endhasanyrole--}}
            {{--@hasrole('admin')--}}
            {{--<a href="{{route('category.create')}}" class="btn btn-success my-2">Categories</a>--}}
            {{--@endrole--}}
            {{--<a href="{{route('advert.index')}}" class="btn btn-secondary my-2">Search</a>--}}
        </p>

    </div>
</section>
    @endif
