<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserAssociateWithTest;

class UserAssociateWithTestController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request){
        request()->validate([
            'user_id'=>'required',
            'distance'=>'required'
        ]);

        $data = array(
            'test_id'=>$request->test_id,
            'user_id'=>$request->user_id,
            'distance'=> (float)$request->distance,
            'created_at'=>date('Y-m-d G:i:s'),
            'updated_at'=>date('Y-m-d G:i:s')
        );
        
        UserAssociateWithTest::create($data);
        return redirect()->route('sportstest.view',$request->test_id)->with('success','Athlete added successfully');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $athlete = UserAssociateWithTest::find($id);
    
        return view('sports.SportsAthleteEdit', compact('athlete'));
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
        request()->validate([
            'user_id'=>'required',
            'distance'=>'required'
        ]);
        
        $athlete = UserAssociateWithTest::find($id);
     
        $athlete->user_id = $request->user_id;
        $athlete->distance = (float)$request->distance;
        $athlete->updated_at = date('Y-m-d G:i:s');
       
        $athlete->save();
        
        return redirect()->route('sportstest.view',$athlete->test_id)->with('success','Athlete updated successfully');
    }
    
    public function destroy($id){
        
        $athlete = UserAssociateWithTest::find($id);
        
        UserAssociateWithTest::find($id)->delete();
        
        return redirect()->route('sportstest.view',$athlete->test_id)->with('success','Athlete deleted successfully');
    }
    
    public function fitnessRating($user_id){
        
        $distanceAvg = UserAssociateWithTest::where('user_id',$user_id)->get()->avg('distance');
        
        if($distanceAvg<=1000){
            return 'Below Average';
        }else if($distanceAvg>1000 && $distanceAvg<=2000){
            return 'Average';
        }else if($distanceAvg>2000 && $distanceAvg<=3500){
            return 'Good';
        }else if($distanceAvg>3500){
            return 'Very good';
        }else{
            return 'something wrong';
        }
    }
   
}
