<div class="container w-75">
<div class="bg-info p-2 font-weight-bold rounded text-center">
<h5>Adverts found for {{$keyword}}</h5></div>
@foreach($results as $advert)
<div class="row mb-3 pt-4 p-1 rounded" style="background-color: rgba(240,240,240,0.9)">
<div class="col-sm-1 col-md-1"></div>
<div class="col-sm-5 col-md-1 mb-5">
<a href="{{route('advert.show', $advert->slug)}}" class="">
<div class="flexBox text-dark">
<small class="p-1 font-weight-bolder">{{$advert->cityName->name}}</small>
<small class="">{{$advert->created_at}}</small>
<small class="d-block">Visits {{$advert->counter}}</small>
@if ($advert->getComment)
<i class="fi-xnsuxl-comment-solid d-block" style="color: rgba(255,75,55,0.82);"></i>
@endif
</div>
</a>
</div>


<div class="col-sm-5 col-md-2 text-center">
<a href="{{route('advert.show', $advert->slug)}}" class="">
<img src="{{$advert->image}}" class="mr-4 border dark img-thumbnail p-0" alt="{{$advert->slug}}">
</a>
</div>
<div class="col-sm-6 col-md-7 mr-0">
<a href="{{route('advert.show', $advert->slug)}}" class="text-decoration-none text-dark">
<p class="font-weight-bolder text-primary">{{ $advert->title }}</p>
<p>{!! html_entity_decode($advert->content)!!}</p>
<p class="d-inline">Price: <p class="d-inline">{{$advert->price}} </p>
</a>
</div>
</div>
@endforeach
</div>