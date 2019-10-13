@extends('layouts.app')
@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success w-25 d-block mr-auto ml-auto text-center" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    <my-button text="" type="submit"></my-button>
    <div class="w-100 custom-bg border-bottom border-dark d-none latest-adverts">
            <div class="row no-gutters">
                <div class="col-md-2">
                    <h5 class="pt-2 mr-auto ml-auto text-center text-center mt-5 w-75 font-weight-bolder">Latest adverts</h5>
                </div>
            @foreach($adverts as $advert)
                <div class="col-md-1 foto-hover text-center">
                    <a href="{{route('advert.show', $advert->slug)}}">
                    <img src="{{$advert->image}}" class="img-fluid card-img w-100 foto-hover" alt="{{$advert->slug}}">
                    <p class="card-text"><small class="text-muted">{{$advert->updated_at}}</small></p>
                    </a>
                </div>
                <div class="col-md-1 mr-auto ml-auto"  >
                    <div class="card-body text-center">
                        <h4 class="card-title">{{ucfirst($advert->title)}}</h4>
                        {{--<p class="card-text">This is a wider card with supporting</p>--}}
                        <p class="card-text">Price <small>{{$advert->price}} </small></p>
                    </div>
                </div>
            @endforeach
                <div class="col-md-2"></div>
            </div>
        </div>
        <div class="container pt-2">
            <div id="categoryIndexHome" class="flexBox w-75">
                @foreach($categories as $category)
                    <div class="fix-width m-2 mb-4">
                        <h5 class="top-menu-list text-left"><a class="text-success"
                                                               href="{{route('category.show', $category->slug)}}">{{$category->title}}</a>
                        </h5>
                        <ul class="list-group pb-5">
                            @foreach($category->subCategories as $subcat)
                                <li class="w-100 text-dark no-list mr-5 text-left"><a class="text-dark"
                                                                                      href="{{route('category.showSub',$subcat->slug)}}">{{$subcat->title}}</a>
                                    @foreach ($subcat->secondSubcat as $secondSub)
                                        <small
                                            class="count-hide">{{array_push($counter, count($secondSub->advertCount))}}</small>
                                    @endforeach
                                    <small>({{$number = array_sum($counter)}})</small>
                                    <?php unset($counter)?>
                                    <?php $counter = [];?>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
<!--            --><?php
//            $startime = microtime(true);
//            $endtime = microtime(true);
//            for($i = 0; $i < 1000; $i++){
//                print "Hello world";
//            }
//            echo $endtime - $startime;
////            echo $endtime;
////            echo $startime;
//
//            ?>
        </div>
    <?php
    $array = 'AUN CONCERTS 2019
Fri. 06.09. - D Oranienburg, Open Air
Fri. 20.09. - IT Costa Volpino, Strigarium
Sat. 21.09. - CH Biel, Mittelalterspektakel
Fri. 27.09. - FR Strasbourg, La Laiterie
Sat. 02.11. - USA Baltimore, Faeriecon
Sat. 09.11. - LTU Vilnius, Compensa Hall
Fri. 15.11. - D Würzburg, Johanniskirche
Sat. 16.11. - D Kaiserslautern, Kammgarn
Sun. 17.11. - D Bochum, Christuskirche

FAUN CONCERTS 2020
Sat. 11.04. - FR Toulouse, Echos & Merveilles
Sat. 25.04. - UK London, Union Chapel
Thu. 16.07. - D Oppurg, Rittergut Positz

"MÄRCHEN & MYTHEN DEUTSCHLAND TOUR 2020"
Thu. 05.03.20 Hannover - Theater am Aegi
Fri. 06.30.20 Neunkirchen - Neue Gebläsehalle
Sat. 07.03.20 Wuppertal - Historische Stadthalle
Sun. 08.03.20 Stuttgart - Theaterhaus
Mon. 09.03.20 Hamburg - Laeiszhalle
Tue. 10.03.20 Kiel - Kieler Schloss
Thu. 12.03.20 Neu-Isenburg - Hugenottenhalle
Fri. 13.03.20 Chemnitz - Stadthalle
Sat. 14.03.20 Erfurt - Alte Oper
Fri. 17.04.20 Halle - Händel Halle
Sat. 18.04.20 Munich - Circus Krone
Sun. 19.04.20 Berlin - Admiralspalast';
//    if(preg_match("/A-Z/A-Z/A-Z/A-Z/", $array))
//    {
//       echo "Es una calle";
//    } else {
//       echo "No es una calle";
//    }
    // Filtrar vocales:
    $string = 'No coger vocales';
    echo preg_match_all("/[^aeiou]/", $string, $matches); // 10
    // Filtrar vocales y espacios:
    echo preg_match_all("/[^ aeiou]/", $string, $matches); // 8
    // Filtrar consonantes:
    $string = "NO coger MAYUSCULAS solo minusculas"; // 23
    echo preg_match_all("/[^A-Z]/", $string, $matches);

    ?>
@endsection
