<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SportsTest;
use App\UserAssociateWithTest;

class SportsTestController extends Controller
{
    public function index() {
        
       $SportsTests = SportsTest::with('sportsTestTypes')
        ->select('sports_test.id','sports_test.test_date','sports_test_types.test_type_name','sports_test.test_type_id')
        ->join('sports_test_types', 'sports_test_types.id', '=', 'sports_test.test_type_id')
        ->orderBy('sports_test.test_date', 'DESC')
        ->paginate(5); 

        return view('sports.SportsTestIndex',compact('SportsTests'))->with('i',(request()->input('page',1)-1)*5);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        request()->validate([
            'test_type_id'=>'required',
            'test_date'=>'required'
        ]);

        $data = array(
            'test_type_id'=>$request->test_type_id,
            'test_date'=>date('Y-m-d G:i:s', strtotime($request->test_date)),
            'created_at'=>date('Y-m-d G:i:s'),
            'updated_at'=>date('Y-m-d G:i:s')
        );
        
        SportsTest::create($data);
        return redirect()->route('sportstest')->with('success','Test created successfully');
    }
    
    public function view($id) {
        $SportsTest = SportsTest::with('sportsTestTypes','userAssociateWithTest','user')
        ->select('sports_test.id','sports_test.test_date','sports_test_types.test_type_name','sports_test.test_type_id','user_associate_with_test.distance','user_associate_with_test.user_id','users.name','user_associate_with_test.id as athlete_id')
        ->join('sports_test_types', 'sports_test_types.id', '=', 'sports_test.test_type_id')
        ->join('user_associate_with_test', 'sports_test.id', '=', 'user_associate_with_test.test_id')
        ->join('users', 'users.id', '=', 'user_associate_with_test.user_id')
        ->where('sports_test.id',$id)
        ->orderBy('user_associate_with_test.distance','DESC')
        ->get();
        
        $sport = SportsTest::find($id);
        if($sport){
            $SportsTestId = $sport->id;
            $TestTypeId = $sport->test_type_id;
            $TestDate = $sport->test_date;
            $TestTypeName = \App\SportsTestTypes::find($TestTypeId)->test_type_name;
        }
        return view('sports.SportsTestView', compact('SportsTest','TestTypeId','TestTypeName','TestDate','SportsTestId'));
    }
    
    public function destroy($id){
        SportsTest::find($id)->delete();
        UserAssociateWithTest::where('test_id',$id)->delete();
        return redirect()->route('sportstest')->with('success','Test delete successfully');
    }
    
    public function numberOfParticipants($id){
        $athletes = UserAssociateWithTest::where('test_id',$id)->get()->count();
        return $athletes;
    }
}
