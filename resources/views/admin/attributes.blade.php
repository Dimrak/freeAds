@extends('layouts.app')
@section('content')

    {{--NEW--}}
    @include('admin.nav-admin');
    <div class="container pt-3">
        @if(session()->has('message'))
            <div class="alert alert-success w-25 rounded ml-auto mr-auto" role="alert">
                {{session()->get('message')}}
            </div>
        @endif
            @if(session()->has('messageError'))
                <div class="alert alert-danger w-25 rounded ml-auto mr-auto" role="alert">
                    {{session()->get('messageError')}}
                </div>
            @endif
    {{--<h5 class="font-weight-bolder text-right">Attributes</h5>--}}
            <div class="row mt-5">
                    {{--Main attribute creation--}}
                <div class="col-sm-0 col-md-3"></div>
                    <div class="col-sm-10 col-md-3">
                        <button type="button" class="btn btn-dark" data-toggle="tooltip" data-html="true" title="Ex; Instruments, transport, informatic">
                            Create main attribute
                        </button>
                        <div class="grouping d-block text-dark font-weight-bolder p-2 rounded" style="background-color: rgba(240,240,240,0.7); color: #1b1e21!important;">
                            <form method="post" action="{{ route('attributeSet.store') }}">
                                @csrf
                                <input type="text" name="name" placeholder="Instruments" class="form-control mt-1 w-50">
                                <button class="btn alert-success mt-2 mb-2">Create</button>
                            </form>
                        </div>
                    </div>
                    {{--Single attribute creation--}}
                    <div class="col-sm-10 col-md-3">
                        <button type="button" class="btn btn-dark" data-toggle="tooltip" data-html="true" title="Ex; extra price, 1-5 years, used">
                            Create single attribute
                        </button>
                        <div class="grouping d-block text-dark font-weight-bolder p-2 rounded" style="background-color: rgba(240,240,240,0.7); color: #1b1e21!important;">
                            <form method="post" action="{{ route('attribute.store') }}">
                                @csrf
                                <input type="text" name="name" placeholder="extra price" class="form-control mt-1 w-50">
                                <button class="btn alert-success mt-2 mb-2">Create</button>
                            </form>
                        </div>
                    </div>
                <div class="col-sm-0 col-md-3"></div>
            </div>
                    {{--Assign attributes--}}
            <div class="row mt-5">
                    <div class="col-sm-0 col-md-3"></div>
                    <div class="col-sm-10 col-md-6 text-dark">
                        <button type="button" class="btn btn-dark" data-toggle="tooltip" data-html="true" title="Ex; Choose a family attribute and use the checkbox to assign them">
                            Assign attributes
                        </button>

                        <form method="post" action="{{ route('attributeSetRela.store') }}" class="mb-5">
                            @csrf
                            <select name="family" class="mt-3">
                                <option class="form-control mt-1 dropdown-menu">Choose a family attribute</option>
                                @foreach($att_set as $setter)
                                    <option class="dropdown-item" value="{{$setter->id}}">{{ $setter->name }}</option>
                                    {{--<option class="dropdown-item" value="{{$setter->id}}">{{ $setter->name }}</option>--}}
                                @endforeach
                            </select>
                            <div class="row pt-4">
                                @foreach($attributes as $singleAtt)
                                    <div class="col-sm-5 col-md-6 col-lg-4 bg-transparent border-0 text-dark bg-dark mt-1 mb-1">
                                        <input class="mr-2" type="radio" name="att{{$singleAtt->id}}"
                                               value="{{$singleAtt->id}}">{{ $singleAtt->name }}
                                    </div>
                                @endforeach
                            </div>
                            <button class="mt-4 btn btn-outline-success mr-auto ml-auto w-25 d-inline-block bg-light text-dark font-weight-bolder">Assign</button>
                            {{--<a href="{{route('attributeSetRela.edit', 12)}}" class="mt-4 btn btn-outline-success mr-auto ml-auto w-25 d-inline-block bg-warning text-dark font-weight-bolder">Edit</a>--}}
                        </form>
                    </div>
                    <div class="col-sm-0 col-md-3"></div>
            </div>

        <!--Table with attribute relation -->
        <div class="row mr-auto ml-auto d-block mt-3">
            <div class="col">
                <table class="table table-hover table-striped bg-dark text-white">
                    <thead>
                    <tr>
                        <th scope="col" class="text-dark border border-primary bg-warning">Click for edit</th>
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
{{--                                {{dd($setter->relations)}}--}}
                                @if (count($setter->relations) > 0)
                                    <a href="{{route('AttributeSetRela.edit', $setter->id)}}" class="text-decoration-none text-white">{{$setter->name}}</a>
                                    @else
                                    <p href="" class="text-decoration-none text-white">{{$setter->name}}</p>
                                @endif
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
    </div>

@endsection
