@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success w-25 rounded ml-auto mr-auto" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    {{--    <section class="flex-column">--}}
    <div class="container">
        <div class="row w-75 mr-auto ml-auto">
            {{--Form to create parent attribute--}}
            <div class="mt-2 rounded p-3 col border border-dark mr-4 bg-light">
                <h3 class="p-1 text-center">Create attribute family</h3>
                <form method="post" action="{{ route('attributeSet.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Cars" class="form-control mt-1">
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>
            {{--            Attribute creation--}}
            <div class="mt-2 rounded p-3 col border border-dark bg-light mr-4">
                <h3 class="p-1 text-center">Create attribute</h3>
                <form method="post" action="{{ route('attribute.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="doors" class="form-control d-block mt-1">
                    <input type="radio" class="d-inline-block mt-1" name="type" value="1">Numeric
                    <input type="radio" class="d-inline-block mt-1" name="type" value="2">String<br>
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>
            {{--Delete attribute--}}
            {{--<a href="{{route('attribute')}}"></a>--}}
            {{--<div class="mt-2 rounded p-3 col border border-dark bg-light mr-4">--}}
                {{--<h3 class="p-1 text-center">Delete attribute</h3>--}}
                {{--<form method="post" action="{{ route('attribute.destroy') }}">--}}
                    {{--@method('DELETE')--}}
                    {{--@csrf--}}
                    {{--<select name="attributeDelete" id="" class="d-block mb-2">--}}
                    {{--@foreach($attributes as $singleAtt)--}}
                            {{--<option class="mr-2" type="radio" name="att{{$singleAtt->id}}"--}}
                                   {{--value="{{$singleAtt->id}}">{{ $singleAtt->name }}--}}
                    {{--@endforeach--}}
                    {{--</select>--}}
                    {{--<button class="btn alert-success mt-2 mb-2">Delete</button>--}}
                {{--</form>--}}
            {{--</div>--}}
        </div>
        <div class="row w-75 h-25 text-dark mr-auto ml-auto mb-2">
            {{--            --}}
            <div class="mt-2 rounded p-3 d-block border border-dark attributes-assign text-white bg-dark">
                <h3 class="p-1 text-center">Assign attributes</h3>
                <form method="post" action="{{ route('attributeSetRela.store') }}">
                    @csrf
                    <select name="family">
                        <option class="form-control mt-1 dropdown-menu">Choose a family attribute</option>
                        @foreach($att_set as $setter)
                            <option class="dropdown-item" value="{{$setter->id}}">{{ $setter->name }}</option>
                        @endforeach
                    </select>
                    <div class="row">
                        @foreach($attributes as $singleAtt)
                            <div class="col-2 bg-transparent border-0 text-white bg-dark">
                                <input class="mr-2" type="radio" name="att{{$singleAtt->id}}"
                                       value="{{$singleAtt->id}}">{{ $singleAtt->name }}
                            </div>
                        @endforeach
                    </div>
                    <button class="btn btn-outline-danger mr-auto ml-auto w-25 d-block bg-light">Assign</button>
                </form>
            </div>
        </div>
        <!--Table with attribute relation -->
        <div class="row mr-auto ml-auto d-block mt-3">
            <div class="col">
                <table class="table table-hover table-striped bg-dark text-white">
                    <thead>
                    <tr>
                        <th scope="col" class="bg-white">Table</th>
                        @foreach($attributes as $attribute)
                            <th scope="row" class="btn-outline-light">{{$attribute->name}}</th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($att_set as $setter)
                        <tr>
                            <th scope="row" class="bg-primary">{{$setter->name}}</th>
                            @foreach($attributesRela as $relation)
                            @if($relation->attribute_set_id == $setter->id)
                                <td class="bg-success">{{$relation->attributes->name}}</td>
                            @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
