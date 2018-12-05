<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Empresa::orderBy('nome')->paginate(10);

        return view('empresas.index', ['empresas' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|unique:empresas',
            'logo' => 'file|image'
        ]);

        if ($validator->fails())
            return back()->with('message', $validator->errors());


        $filename = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $filename = "{$name}.{$extension}";
            $request->file('logo')->storeAs('public', $filename);
        }

        Empresa::create(array_merge($request->all(), ['logo' => $filename]));

        return redirect()->route('empresas.index')->with('message', 'Item adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('empresas.show', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        return view('empresas.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required',
            'email' => 'required|unique:empresas',
            'logo' => 'file|image'
        ]);

        if ($validator->fails())
            return back()->with('message', $validator->errors());

        $filename = null;
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $name = uniqid(date('HisYmd'));
            $extension = $request->logo->extension();
            $filename = "{$name}.{$extension}";
            $request->file('logo')->storeAs('public', $filename);
        }

        $empresa->update(array_merge($request->all(), ['logo' => $filename]));

        return redirect()->route('empresas.index')->with('message','Item atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();

        return redirect()->route('empresas.index')->with('message','Item removido com sucesso.');
    }
}
