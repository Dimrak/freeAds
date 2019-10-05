<?php

namespace App\Http\Controllers;

use App\Advert;
use App\Attribute;
use App\AttributeSet;
use App\AttributeSetRelationship;
use App\Category;
use App\Message;
use App\City;
use App\User;
use App\MessageType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $from = Carbon::now();//Hoy 10-03
        $from2 = Carbon::now();//Hoy 10-03
        $from3 = Carbon::now();//Hoy 10-03
        $from4 = Carbon::now();//Hoy 10-03
        $from5 = Carbon::now();//Hoy 10-03
        $from6 = Carbon::now();//Hoy 10-03
        $from7 = Carbon::now();//Hoy 10-03
        $monday = $from->startOfWeek()->toDateString();//hasta el dia 6(domingo)
        $tuesday = $from2->startOfWeek()->addDays(1)->toDateString();
        $wed = $from3->startOfWeek()->addDays(2)->toDateString();
        $thur = $from4->startOfWeek()->addDays(3)->toDateString();
        $fri = $from5->startOfWeek()->addDays(4)->toDateString();
        $sat = $from6->startOfWeek()->addDays(5)->toDateString();
        $sunday = $from7->startOfWeek()->addDays(6)->toDateString();
//        dd($monday);
//        $sunday = $to->startOfWeek()->addDays(6);//hasta el dia 6(domingo)
        //obtener el numero de adverts creados durante current semana y la anterior
        $adverts = Advert::all()->whereBetween('created_at', [$monday, $sunday]);
        $mondayAds = [];
        $tuesdayAds = [];
        $wedAds = [];
        $thurAds = [];
        foreach ($adverts as $advert){

            if ($advert->created_at == $monday){
                array_push($mondayAds, $advert);
            }
            elseif($advert->created_at === $tuesday){
                array_push($tuesdayAds, $advert);
            }
            elseif($advert->created_at == $wed){
                array_push($wedAds,$advert);
            }
            elseif ($advert->created_at == $thur){
                array_push($thurAds,$advert);
            }
        }
        $chartjs = app()->chartjs
            ->name('lineChartTest')
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'])
            ->datasets([
                [
                    "label" => "This week adverts",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [12,15,2,8,5,15,2],
                ],
                [
                    "label" => "Last week adverts",
                    'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                    'borderColor' => "rgba(38, 185, 154, 0.7)",
                    "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                    "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                    "pointHoverBackgroundColor" => "#fff",
                    "pointHoverBorderColor" => "rgba(220,220,220,1)",
                    'data' => [count($adverts)],
                ]
            ]);

        $users = User::all()->whereBetween('created_at', [$monday, $sunday]);
        $data['adverts'] = $adverts;
        $data['categories'] = Category::all();
        $data['users'] = $users;
        $data['cities'] = City::all();
        $user = Auth::user();
       if ($user !== null) {
          if ($user->hasRole('admin')) {
             return view('admin.index', $data, compact('chartjs'));
          } else {
             return abort('403');
//             return redirect()->route('category.index')->with('message', 'Access denied');
          }
       }else{
          return abort('401');
//          return view('category.index')->with('message','Access denied');
       }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $users = User::all();
       $types = MessageType::all();
       $data['users'] = $users;
       $data['types'] = $types;
       return view('admin.message', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $message = new Message();
      $message->subject = $request->subject;
      $message->message = $request->message;
      $message->recip_id = $request->user;
      $user = Auth::user();
      $message->sender = $user->id;
      $message->active = 1;
      $message->seen = date("Y/m/d");
      $message->status = 1;
      $message->type = $request->type;
      $message->save();
       return redirect()->route('admin.index')->with('message', 'Message sent');
    }
    public function sendMessage(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('admin.show');
    }
    public function adverts()
    {

       $data['advertsAct'] = Advert::all()->where('active', 1);
       $data['adverts'] = Advert::all();
       $data['advertsDis'] = Advert::all()->where('active', 0);
       $categories = Category::parents()->active()->get();
       $counter = [];
       $data['counter'] = $counter;
//       $adverts = Advert::orderBy('created_at', 'desc')->take(4)->get();
       $data['categories'] = $categories;
       return view('admin.adverts', $data);
    }

    public function attributes()
    {
        $data['att_set'] = AttributeSet::all();
        $data['attributesRela'] = AttributeSetRelationship::all()->where('active', 1);
        $data['attributes'] = Attribute::all();
        return view('admin.attributes', $data);
    }
   public function categories()
   {
      $data['categories'] = Category::all()->where('parent_id', 0);
      return view('admin.categories', $data);
   }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $advert = Advert::find($id);
        $advert->active = $request->active;
        $advert->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }

    public function adminMessages()
    {
        $users = User::all();
        $data['users'] = $users;
        return view('admin.message', $data);
    }
}
