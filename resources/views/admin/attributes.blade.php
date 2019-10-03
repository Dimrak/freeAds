@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success w-25 rounded ml-auto mr-auto" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    @include('admin.nav-admin');
    {{--<section class="flex-column">--}}
    <div class="container mt-3">
        <div class="row w-50 mr-auto ml-auto">
            {{--Form to create parent attribute--}}
            <div class="mt-2 rounded p-2 col border border-dark mr-4 bg-light">
                <h5 class="p-1 text-left">Create attribute family</h5>
                <form method="post" action="{{ route('attributeSet.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Cars" class="form-control mt-1 w-25">
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>
            {{--Attribute creation--}}
            <div class="mt-2 rounded p-2 col border border-dark bg-light mr-4">
                <h3 class="p-1 text-left">Create attribute</h3>
                <form method="post" action="{{ route('attribute.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="doors" class="form-control d-block mt-1 w-25">
                    Numeric<input type="radio" class="d-inline mt-1 w-25" name="type" value="1">
                    String<input type="radio" class="d-inline mt-1 w-25" name="type" value="2"><br>
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>
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
                        <th scope="col" class="bg-white text-dark border border-primary">Click for edit</th>
                        @foreach($attributes as $attribute)
                            <th scope="row" class="btn-outline-light">
                                {{$attribute->name}}
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($att_set as $setter)
                        <tr>
                            <th scope="row" class="bg-primary">
                                <a href="{{route('AttributeSetRela.edit', $setter->id)}}" class="text-decoration-none text-white">{{$setter->name}}</a>
                            </th>
                            @foreach($attributesRela as $relation)
                            @if($relation->attribute_set_id == $setter->id)
                                <td class="bg-success">
                                   {{$relation->attributes->name}}
                                </td>
                            @endif
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
{{--        <a class="badge badge-success p-2 mt-2" href="{{route('admin.index')}}">Back admin page</a>--}}
    </div>

@endsection
