@extends('layouts.app')
@section('content')
    @include('admin.nav-admin');
    <div class="container pt-3">
        <div class="row">
            <?php $hoverCounter = 0?>
            @foreach($categories as $category)
                <div class="col-sm-10 col-md-4">
                    <h4 class="bg-dark p-2 rounded">
                        <a href="{{route('category.show',$category->slug)}}"
                           class="btn-link text-decoration-none text-white w-25">{{$category->title}}</a>
                    </h4>
                    <div class="grouping  d-block text-dark font-weight-bolder p-2 rounded" style="background-color: rgba(240,240,240,0.7); color: #1b1e21!important;">

                        @foreach($category->subCategories as $subcat)
                            <h6 class="d-block mb-2 mt-2 hover<?php echo $hoverCounter?>">
                                <mark class="pr-1 pl-1 border border-dark rounded">
                                    <a href="{{route('category.showSub', $subcat->slug)}}"
                                       class="text-decoration-none text-dark header<?php echo $hoverCounter?>">{{$subcat->title}}</a>
                                </mark>
                            </h6>
                            @foreach ($subcat->subCategories as $secondSub)
                                <p class="d-inline-block p-2 hover<?php echo $hoverCounter?>">
                                    <a class="text-decoration-none black" href="{{route('category.showSubSub',$secondSub->slug)}}">{{$secondSub->title}}, </a>
                                </p>
                            @endforeach
                          <?php $hoverCounter++?>
                        @endforeach
                        <?php $hoverCounter = 0?>
                    </div>
                </div>

            @endforeach
        </div>
        <a class="badge badge-success p-2" href="{{route('admin.index')}}">Back admin page</a>
        <a class="badge badge-warning p-2" href="{{route('category.create')}}">Create category</a>
    </div>
    <style>

    </style>
@endsection
