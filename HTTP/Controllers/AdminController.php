<?php

use DB;

class AdminController extends Controller
{
    public function adminTool(Request $request)
    {
        $filter1 = DB::table('filter1')
                   ->select([
                        'id as _id',
                        'filter as filter'
                    ])
                    ->get();
      
        $filter2 = DB::table('filter2')
                    ->select([
                        'id as _id',
                        'filter as filter'
                    ])
                    ->get();

        $filter3 = DB::table('filter3')
                    ->select([
                       'id as _id',
                       'filter as filter'
                    ])
                    ->get();
            
        $filters = ["filter1", "filter2", "filter3"];
                            
        $orderings = ["order1", "order2", "order3"];

        $data=array('filter1'=>$filter1, 'filter2'=>$filter2, 'filter3'=>$filter3);

        return view('admin_tool')->with($data);
    }


    public function dbUpdate(Request $request)
    {
        // Getting the POST request data and seperating it from string form into array form to update the database
        $postdata = (string)Input::get('append'); 
        $new_lst = explode("||", $postdata);
        $lstToAppend = [];
        foreach ($new_lst as $i){
            array_push($lstToAppend, explode("//", $i));
        };

        DB::table('admin_tool')->insert(['title' => 'placeholder']);
        DB::table('admin_tool')->where('title', '!=', 'placeholder')->delete();     //ensures table isn't empty to avoid errors

        $count = 1;
        for($i = 0; $i < count($lstToAppend); $i++){
            $dbcurrentrows = DB::table('admin_tool')
            ->insert(
              [ 
                'title' => (string)$lstToAppend[$i][0], 
                'filter' => (string)$lstToAppend[$i][1], 
                'key_list' => (string)$lstToAppend[$i][2], 
                'sort_order' => (string)$lstToAppend[$i][3],
                'type' => (string)$lstToAppend[$i][4],
                'key' => (string)$lstToAppend[$i][5]
                // More values added based on table columns
              ]
            );

            $count += 1;
        }

        DB::table('feed_rows')->where('title', '=', 'placeholder')->delete(); 
    }
}