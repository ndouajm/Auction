<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('users.pages.index');
    }

    public function home()
    {
        // $users = User::where('etat', 'actif')->get();
        return view('users.pages.dashbord');
    }

    public function about()
    {
        return view('users.pages.about');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // Valider les données du formulaire (nom, email, etc.)
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6',
        ]);

        DB::beginTransaction();
        try {

            $saving= User::create([
                'uuid'=>Str::uuid(),
                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'avatar' => 'default.jpg',
                'email' => $request->email,
                'etat' => 'actif',
                'type' => '0', // user type
                // 'code' => Refgenerate(User::class, 'Cl', 'code'),
                'password' => bcrypt($request->password),
            ])->save();

            // dd($saving);

            if ($saving) {

                $dataResponse =[
                    'type'=>'success',
                    'urlback'=>"back",

                    'message'=>"Enregistré avec succes!",
                    'code'=>200,
                ];
                DB::commit();
           } else {
                DB::rollback();
                $dataResponse =[
                    'type'=>'error',
                    'urlback'=>'',
                    'message'=>"Erreur lors de l'enregistrement!",
                    'code'=>500,
                ];
           }

        } catch (\Throwable $th) {
            DB::rollBack();
            $dataResponse =[
                'type'=>'error',
                'urlback'=>'',
                'message'=>"Erreur systeme! $th",
                'code'=>500,
            ];
        }

        return response()->json($dataResponse);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valider les données du formulaire (nom, email, etc.)
        $request->validate([
            'name' => 'required|string|max:255',
            'lastname' => 'string|max:255',
        ]);

        DB::beginTransaction();
        try {

            // add profil img
            $avatar= $request->avatar ?? "";
               if($avatar == null) {
                $avatar= auth()->user()->avatar;
               }else{
                   $file = $request->file('avatar');
                //    dd($avatar);
                   $avatar = Str::uuid().'.'.$file->getClientOriginalExtension();
                   $file->move('avatars/',$avatar);
               }

            $saving= User::where(['uuid'=>$id])->update([

                'name' => $request->name,
                'lastname' => $request->lastname,
                'phone' => $request->phone,
                'avatar' => $avatar,
                'email' => $request->email,
                'adress' => $request->address,
                'city' => $request->city,
                'state' => $request->state,
                'wallet' => $request->wallet,
                // 'password' => bcrypt($request->password),

            ]);
           

            if ($saving) {

                $dataResponse =[
                    'type'=>'success',
                    'urlback'=>"back",
                    'message'=>"Modifié avec succes!",
                    'code'=>200,
                ];
                DB::commit();
           } else {
                DB::rollback();
                $dataResponse =[
                    'type'=>'error',
                    'urlback'=>'',
                    'message'=>"Erreur lors de la modification",
                    'code'=>500,
                ];
           }

        } catch (\Throwable $th) {
            DB::rollBack();
            $dataResponse =[
                'type'=>'error',
                'urlback'=>'',
                'message'=>"Erreur systeme!",
                'code'=>500,
            ];
        }
        return response()->json($dataResponse);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
