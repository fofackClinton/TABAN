<?php

namespace App\Http\Controllers;

use App\Http\Requests\voitureRequest;
use App\Models\Agence;
use App\Models\Vehicule;
use App\Models\VehiculPublication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class voitureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('voiture.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
       // dd($request);
       $id = $request->id;
        $id1 =  Agence::where('ID_USERS',$id)->first();
        try {
            //code...
            DB::beginTransaction();
            $requestData = $request->all();
            $fileName = time().$request->file('photo')->getClientOriginalName();
            $path = $request->file('photo')->storeAs('images', $fileName, 'public');
            $requestData["photo"] = '/storage/'.$path;
            Vehicule::create([
                'ID_AGENCE'=>$id1->ID_AGENCE,
                'NOM'=>$requestData["name"],
                'TYPE'=>$requestData["type"],
                'DESCRIPTION'=>$requestData["desc"],
                'PRIX'=>$requestData["prix"],
                'PHOTO'=>$requestData["photo"],
                'IDC'=>$requestData["id"],
            ]);
            //return redirect('employee')->with('flash_message', 'Employee Addedd!');
            DB::commit();
            return back()->with('success','vehicul creer');
        } catch (\Throwable $th) {
            //throw $th;
            //return back();
            return back()->with('success','echec de creation');
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
            $var = Vehicule::find($id);
        VehiculPublication::create([

            'ID_VEHICUL'=>$id,
            'NOM'=>$var->NOM,
            'PRIX'=>$var->PRIX,
            'DESCRIPTION'=>$var->DESCRIPTION,
            'PHOTO'=>$var->PHOTO,
            'TYPE'=>$var->TYPE,
            'IDC'=>$var->IDC,

        ]);
        return back()->with('success','publication effectuer');



        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success',' echec de publication ');
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
        $voitures = Vehicule::all();
        return view("voiture.afficher", compact('voitures'));
    }
    public function show1($id)
    {
        //
        try {
            //code...
            $var = Agence::where('ID_USERS', $id)->first();
            $po = $var->ID_AGENCE;
            $voitures = Vehicule::where('ID_AGENCE', $po)->get();
            return view("voiture.afficher", compact('voitures'));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success','vous n\'avez pas de vehicule creer en !');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $v = Vehicule::find($id);
        return view('voiture.edite', compact('v'));
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
        $v = Vehicule::find($id);
        $v->NOM = $request->name;
        $v->PRIX =$request->prix;
        $v->DESCRIPTION =$request->desc;
        $v->PHOTO =$request->phot;
        $v->TYPE =$request->type;
        $v->save();
        return back()->with('success', 'modification enregistrer');
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

            VehiculPublication::where("ID_PUBLICATION", $id)->delete();
            Vehicule::find($id)->delete();

            DB::commit();

            return back()->with('success','vehicul supprimer');

        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('success','echec de suppression');
        }
    }
}
