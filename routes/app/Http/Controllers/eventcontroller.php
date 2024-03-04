<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class eventcontroller extends Controller
{
    public function getCalender(Request $request)
    {
        $user = Auth::user();
        $loginid=$user->id;
        if ($request->ajax()) {
            $events = Event::whereDate('start', '>=', $request->start)
                ->whereDate('end', '<=', $request->end)
                ->get();

            return response()->json($events);
        }
        $userdata= User::where('id','!=',$loginid)->get();
       return view('calender',['userdata'=>$userdata]);
    }

    public function createEve(Request $request)
    {
        $input = $request->all();
        $input['users'] = json_encode($input['users']);
        $request_data = [
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'users' => 'required',
        ];

        $validator = Validator::make($input, $request_data);

        // invalid request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please check all parameters',
            ]);
        }

        $event = Event::create([
            'title' => $input['title'],
            'start' => $input['start'],
            'end' => $input['end'],
            'users' => $input['users'],
        ]);

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    public function editevent(Request $request)
    {
        $input = $request->only(['id', 'title', 'start', 'end']);

        $request_data = [
            'id' => 'required',
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            
        ];

        $validator = Validator::make($input, $request_data);

        // invalid request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please check all parameters',
            ]);
        }

        $event = Event::where('id', $input['id'])
            ->update([
                
                'start' => $request['start'],
                'end' => $request['end'],
                

            ]);

        return response()->json([
            'success' => true,
            'data' => $event
        ]);
    }

    public function updatevent(Request $request)
    {
        $input = $request->only([ 'title', 'idd','users']);

        $request_data = [
            'idd' => 'required',
            'title' => 'required',
            'users' => 'required'

        ];

        $validator = Validator::make($input, $request_data);

        // invalid request
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong, please check all parameters',
            ]);
        }
        $event = Event::where('id', $input['idd'])
        ->update([
            
            'title' => $request['title'],
            'users' => $request['users'],
        ]);

    return response()->json([
        'success' => true,
        'data' => $event
    ]);
    }

    public function deletevent(Request $request)
    {
        Event::where('id', $request->id)
            ->delete();

        return response()->json([
            'success' => true,
            'message' => 'Event removed successfully.'
        ]);
    }

    //user Calender

    
        public function show_calender(Request $request)
        {
            
            $user = Auth::user();
            $loginname=$user->name;
           
            if ($request->ajax()) {
                $events = Event::whereDate('start', '>=', $request->start)
                    ->whereDate('end', '<=', $request->end)
                   -> where('users','LIKE',"%".$loginname."%")
                    ->get();
                   
                return response()->json($events);
            }
            //$val = Event::where('users','LIKE',"%".$loginname."%")->get();
            $userdata = User::all();
            //echo $loginname;
            //echo "<pre>";print_r($userdata);die;
            return view('user_calender',['userdata'=>$userdata]);
        }
     
    



}
