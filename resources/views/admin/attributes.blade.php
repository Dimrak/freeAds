@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success w-25 rounded ml-auto mr-auto" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    {{--    <section class="flex-column">--}}
    <div class="container">
        <div class="row w-25 text-dark mr-auto ml-auto text-center">
{{--            --}}
            <div class="mt-2 rounded p-3 d-block border border-dark bg-success">
                <h3 class="p-1 text-center">Assign attributes</h3>
                <form method="post" action="{{ route('attributeSetRela.store') }}">
                    @csrf
                    <select name="family">
                        <option class="form-control mt-1">Choose a family attribute</option>
                        @foreach($att_set as $setter)
                            <option value="{{$setter->id}}">{{ $setter->name }}</option>
                        @endforeach
                    </select>
                    <ul class="list-group">
                        @foreach($attributes as $singleAtt)
                            <input class="list-group-item" type="radio" name="att{{$singleAtt->id}}"
                                   value="{{$singleAtt->id}}">{{ $singleAtt->name }}
                        @endforeach
                    </ul>
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>
        </div>
            <div class="row">
            {{--Form to create parent attribute--}}
            <div class="mt-2 rounded p-3 col border border-dark bg-secondary mr-4">
                <h3 class="p-1 text-center">Create attribute family</h3>
                <form method="post" action="{{ route('attributeSet.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="form-control mt-1">
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>

{{--            Attribute creation--}}
            <div class="mt-2 rounded p-3 col border border-dark bg-secondary mr-4">
                <h3 class="p-1 text-center">Create attribute</h3>
                <form method="post" action="{{ route('attribute.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Name" class="form-control mt-1">
                    <input type="radio" class="form-control mt-1" name="type" value="1">Numeric
                    <input type="radio" class="form-control mt-1" name="type" value="2">String<br>
                    <button class="btn alert-success mt-2 mb-2">Create</button>
                </form>
            </div>

            {{--SEE THE ATTRIBUTES AND THE PARENT--}}
                <div class="box p-3 col-4 w-25">
                    {{--Showing all attributes with parent--}}
                    <h4 class="">Family attributess</h4>
                    <ul class="list-group bg-dark">
                        @foreach($att_set as $setter)
                            <div class="btn-group dropright w-25">
                                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    {{$setter->name}}
                                </button>
                                <div class="dropdown-menu">
                                    @foreach($attributesRela as $relation)
                                        @if($relation->attribute_set_id == $setter->id)
                                            <li>{{$relation->attributes->name}}</li>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </ul>
                </div>
        </div>
    </div>

@endsection
