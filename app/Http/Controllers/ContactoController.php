<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacto = Contacto::all();
        return view('index', compact('contacto'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $storeData = $request->validate([
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|numeric',
                'password' => 'required|max:255',
            ]);

            $contacto = Contacto::create($storeData);
            return redirect('/contactos')->with('concluido', 'Contacto salvo');
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contacto = Contacto::findOrFail($id);
        return view('edit', compact('contacto'));
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
        $updateData = $request->validate(
            [
                'name' => 'required|max:255',
                'email' => 'required|max:255',
                'phone' => 'required|numeric',
                'password' => 'required|max:255',
            ]);
            Contacto::whereId($id)->update($updateData);
            return redirect('/contactos')->with('concluido', 'contacto atualizado');
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
        $contacto = Contacto::findOrFail($id);
        $contacto->delete();
        return redirect('/contactos')->with('concluido', 'contacto excluido');
    }
}
