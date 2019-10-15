
<div class="col-sm-1 col-md-1"></div>
<div class="col-sm-5 col-md-1 mb-5">
    <div class="flexBox text-dark">
        <h6 class="custom-margin-top font-weight-bolder w-100">{{$advert->cityName->name}}</h6>
        <small class="w-100">{{$advert->created_at}}</small>
        <small class="w-100">Visits {{$advert->counter}}</small>
        @if ($advert->getComment)
            <i class="fi-xnsuxl-comment-solid d-block" style="color: rgba(255,75,55,0.82);"></i>
        @endif
    </div>
</div>