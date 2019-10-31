<div class="col-sm-6 col-md-7 mr-0">
    <a href="{{route('advert.show', $advert->slug)}}" class="text-decoration-none text-dark">
        <p class="font-weight-bolder text-primary">{{ $advert->title }}</p>
        <p>{!! html_entity_decode($advert->content)!!}</p>
        <p class="d-inline font-weight-bold">Price: <p class="d-inline">{{$advert->price}} &#x20AC; </p>
    </a>
</div>