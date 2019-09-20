@extends('layouts.app')
{{----}}

@section('content')
    <div class="container">
        @if(session()->has('message'))

            {{session()->get('message')}}

        @endif
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Choose a category for your advert</div>

                    <div class="card-body text-center">
                        {{--<form method="post" action=" {{ route('advert.create') }}" enctype="multipart/form-data">--}}
                            @csrf
                        @foreach($categories as $cat)
                                <a href="{{route('advert.create') . '/' . $cat->attribute_set_id}}" value="{{$cat->attribute_set_id}}" class="btn btn-primary my-2">
                                    {{$cat->title}}
                                </a>
                        @endforeach
                        {{--</form>--}}
                    </div>
                </div>
                @hasrole('admin')
                <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>
                @endrole
            </div>
        </div>
    </div>
@endsection
