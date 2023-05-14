<?php

namespace App\Http\Controllers;

use App\Http\Requests\chambreRequest;
use App\Models\Chambre;
use App\Models\ChambrePublication;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("chambre.create");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(chambreRequest $request)
    {
        //
        $id = $request->id;
        $id1 =  Hotel::where('ID_USERS',$id)->first();

        try {
            //code...
            DB::beginTransaction();
            $requestData = $request->all();
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/'.$path;
            Chambre::create([
                'ID_HOTEL'=>$id1->ID_HOTEL,
                'PRIX'=>$requestData["prix"],
                'CATEGORI'=>$requestData["cat"],
                'TYPE'=>$requestData["type"],
                'DESCRIPTION'=>$requestData["desc"],
                'PHOTO_CHAMBRE'=>$requestData["photo"],
                'IDC'=>$requestData["id"],
            ]);
            //return redirect('employee')->with('flash_message', 'Employee Addedd!');
            DB::commit();
            return back()->with('success', 'chambre creer');
        } catch (\Throwable $th) {
            //throw $th;
            //return back();
            return back()->with('success', 'creation echouer');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        try {

            $var = Chambre::find($id);
        ChambrePublication::create([

            'ID_CHAMBRE'=>$id,
            'TYPE'=>$var->TYPE,
            'PRIX'=>$var->PRIX,
            'DESCRIPTION'=>$var->DESCRIPTION,
            'PHOTO'=>$var->PHOTO_CHAMBRE,
            'VILLE'=>$var->VILLE,
            'IDC'=>$var->IDC,
        ]);
        return back()->with('success', 'publication effectuer');

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success', 'publication echouer');
        }






    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $chambre = chambre::all();
        return view("Chambre.afficher", compact('chambre'));
    }
    public function show1($id)
    {
        //
       // try {
            //code...
            $var = Hotel::where('ID_USERS', $id)->first();
            $po = $var->ID_HOTEL;
            $chambre = chambre::where('ID_HOTEL', $po)->get();
            return view("Chambre.afficher", compact('chambre'));

        //} catch (\Throwable $th) {
            //throw $th;
           // return back()->with('success','vous n\'avez pas de chambre creer en !');
        //}

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $c = Chambre::find($id);
         return view('chambre.edite', compact('c'));
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
        $c = Chambre::find($id);
        $c->PRIX = $request->prix;
        $c->CATEGORI = $request->cat;
        $c->TYPE = $request->type;
        $c->PHOTO_CHAMBRE = $request->photo;
        $c->DESCRIPTION = $request->desc;
        $c->save();
        return back()->with('success','modification effectuer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {

            DB::beginTransaction();
            ChambrePublication::where("ID_CHAMBRE", $id)->delete();

            Chambre::find($id)->delete();

            DB::commit();

            return back()->with('success', 'chambre supprimer');

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success', 'echec de suppression');
        }
    }

}
