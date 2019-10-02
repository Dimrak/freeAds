<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{

   public function searching(Request $request)
   {
      $results = Advert::query()
         ->where('title', 'LIKE', "%{$request->search}%")
         ->orwhere('content', 'LIKE', "%{$request->search}%")
         ->get();
      $data['results'] = $results;
      $data['keyword'] = $request->search;
//      dd($data);
     return view('search.index',$data);
   }

//    public function index()
//    {
//        return view('search');
//    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    function action(Request $request)
//    {
//        if($request->ajax())
//        {
//            $output = '';
//            $query = $request->get('query');
//            if($query != '')
//            {
//                $data = DB::table('adverts')
//                    ->where('title', 'like', '%'.$query.'%')
//                    ->get();
//            }
//            else
//            {
//                $data = DB::table('adverts')
//                    ->orderBy('title', 'desc')
//                    ->get();
//            }
//            $total_row = $data->count();
//            if($total_row > 0)
//            {
//                foreach($data as $row)
//                {
//                    $output .= '<tr>
//                                    <td>'.$row->title.'</td>
//                                </tr>';
//                }
//            }
//            else
//            {
//                $output = '
//       <tr>
//        <td align="center" colspan="5">No Data Found</td>
//       </tr>
//       ';
//            }
//            $data = array(
//                'table_data'  => $output,
//                'total_data'  => $total_row
//            );
//
//            echo json_encode($data);
//        }
//    }
}
