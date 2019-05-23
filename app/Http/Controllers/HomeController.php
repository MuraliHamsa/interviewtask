<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Building;
use App\Room;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(request $request)
    {

        $users = User::all();
        $building = Building::all();

         $rooms = Room::with('owner','building')->get();
          
        return view('home',['users'=>$users,'building'=>$building,'rooms'=>$rooms]);
    }
    public function addbuilding(request $request){

         $data = new Building;
         $data->ownerid = $request->owner;
         $data->buildingname = $request->buildname;
         $data->save();

         return back();
    }


    public function addroom(request $request){

         $data = new Room;
         $data->ownerid = $request->owner;
         $data->buildingid = $request->buildname;
         $data->rooname = $request->roomname;
         $data->save();

         return back();
    }
}
