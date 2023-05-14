<?php

namespace App\Http\Controllers;

use App\Http\Requests\hotelRequest;
use App\Models\Chambre;
use App\Models\ChambrePublication;
use App\Models\Hotel;
use App\Models\HotelReservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class hotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hotel.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        //
        //dd($request);
        try {

            DB::beginTransaction();
            $requestData = $request->all();
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/'.$path;
            //dd($requestData);
            Hotel::create([
                'ID_USERS'=>$requestData["id"],
                'NOM_HOTEL'=>$requestData["name"],
                'CATEGORIE_HOTEL'=>$requestData["cat"],
                'LOCALISATION'=>$requestData["cat"],
                'DOCUMENT'=>$requestData["photo"],
                'VILLE'=>$requestData["ville"],
                'RCCM'=>$requestData["rccm"],
            ]);

            DB::commit();
            return redirect('/users/log')->with('success', 'hotel creer connectez vous');


        } catch (\Throwable $th) {
            //throw $th;
            //return $th;
            echo'ca ne passe pas merde';
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()

    {
        // Chambre::find($id)

        $hotel = Hotel::all();
        return view("hotel.afficher", compact('hotel'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function resa($id)
    {
        $ch = HotelReservation::where('ID_USERS',$id)->get();
        return view('hotel.reservation', compact('ch'));
        //
    }
    public function publication($id)
    {
       $pub = ChambrePublication::where('IDC',$id)->get();
       return view('chambre.publication', compact('pub'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            DB::beginTransaction();

            Chambre::where("ID_HOTEL", $id)->delete();

            Hotel::find($id)->delete();

            DB::commit();

            return back();

        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
}
