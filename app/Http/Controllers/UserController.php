<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function index(Request $request)
    {
        
        $data=array();

        if(empty($request->all())){
        
            $response = Http::get('https://reqres.in/api/users', [
                'page' => 1,
                
            ]);

            $data=json_decode($response->body());
            
            return view('users',compact('data'));

        } else {

            $response = Http::get('https://reqres.in/api/users', [
                'page' => $request->id,
                
            ]);

            return response($response->body());
        }

            

    }

    public function getUser(Request $request)
    {

        $id=$request->id;

        $response = Http::get('https://reqres.in/api/users/'.$id);
        $data=json_decode($response->body());
        $data = $data->data; 
        return view('user-details',compact('data'));
    }
}
