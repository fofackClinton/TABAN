<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class utilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.logins');
    }
    public function indexA()
    {
        return view('users.createA');
    }
    public function indexH()
    {
        return view('users.createH');
    }
    public function voir()
    {
        return view('users.create');
    }
    public function choix()
    {
        return view('users.login');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
       // dd($request);
        try {


            DB::beginTransaction();
            user::create([

                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'sexe'=>$request->sex,


            ]);

            DB::commit();
            return redirect('/users/log')->with('success', 'compte creer connectez vous');


        } catch (\Throwable $th) {
            //throw $th;
            //return back();
            echo'ca ne passe pas merde';
        }
    }

    public function createA(request $request)
    {
        //dd($request);
       $m = $request->email;
        try {


            DB::beginTransaction();
            user::create([

                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'sexe'=>$request->sex,
                'role'=>$request->role,


            ]);

            DB::commit();

            $u = user::where('email', $m)->first();
            $var = $u->id;
            //dd($var);

            return view('agence.create', compact('var') )->with('success', 'compte creer avec succes creer votre agence');


        } catch (\Throwable $th) {
            //throw $th;
            //return back();
            echo'ca ne passe pas merde';
       }
    }

    public function createH(request $request)
    {
       $m = $request->email;
        //try {


            DB::beginTransaction();
            user::create([

                'name'=>$request->name,
                'email'=>$request->email,
                'password'=> Hash::make($request->password),
                'sexe'=>$request->sex,
                'role'=> $request->role,


            ]);

            DB::commit();
             $u = user::where('email', $m)->first();
             $var = $u->id;
             return view('hotel.create', compact('var'))->with('success', 'compte creer avec succes creer votre hotel');


        //} catch (\Throwable $th) {
            //throw $th;
            //return back();
            echo'ca ne passe pas merde';
        //}
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentification(Request $request)
    {
        //dd($request);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],

        ]);
        //$email =$request->nom;
        //$password = $request->password;
        //$name= $request->nom;
        //dd($credentials);
        if (Auth::attempt($credentials)) {
           $request->session()->regenerate();
            $auth = Auth::user()->role;
            $statu = Auth::user()->etat;
            $id = Auth::user()->id;


            if($auth == 'u' && $statu == 1){
                return redirect('/acceuil');
               // echo'tu est un genie petit';

            }elseif( $auth == 'a' && $statu == 1){

                return view('layouts.admin1');

               //ho'tu est bon petit';

            }elseif($auth == 'h' && $statu == 1){

                return view('layouts.admin');

            }elseif($auth == 's' && $statu == 1){

                return view('layouts.admin3');
            }elseif( $statu == 0){
                return back()->with('success', 'votre compte a été deactiver');
            }

          //  return redirect()->intended('afficherChambre');
        }else{
            return back()->with('success', 'mot de passe ou adress mail incorrecte');

        }

        //return back()->withErrors([
          //  'email' => 'The provided credentials do not match our records.',
        //])->onlyInput('email');
    }
    public function deconnexion(request $request)
{
    auth()->logout();
    //dd($request);
    //$request->session()->forget('user');
    return redirect('/users/log');

}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $us = User::all();
        return view('users.afficher', compact('us'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function onoff($id)
    {
        try {
            DB::beginTransaction();
            $user = user::find($id);
            $user->etat =! ($user->etat);
            $user->update();
            DB::commit();
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            echo'ta maman';
        }
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
        //
    }

    public function create2(request $request)
    {
        //
        try {


            DB::beginTransaction();
            user::create([

                'name'=>$request->nom,
                'email'=>$request->email,
                'role'=>$request->role,
                'password'=> Hash::make($request->password),



            ]);

            DB::commit();
            $verif =$request->role;
            $mail = $request->email;
            $u = user::where('email', $mail);
             if($verif == 'hotel'){

                return view("hotel.create", compact('u'));

             }else{

                return view("agence.create", compact('u'));
             }


        } catch (\Throwable $th) {
            //throw $th;
            //return back();
            return back();
        }
    }

}

