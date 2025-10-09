<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimesController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|unique:times,id',
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:5',
            'adm_id' => 'required|integer|exists:users,id',
            'logo' => 'required|image|mimes:png|max:2048',
        ]);

        // salva o arquivo
        $logoPath = $request->file('logo')->store('logos', 'public');

        // cria o registro
        \App\Models\Team::create([
            'id' => $request->id,
            'nome' => $request->nome,
            'sigla' => strtoupper($request->sigla),
            'adm_id' => $request->adm_id,
            'logo_path' => $logoPath,
        ]);

        return redirect()->route('times.index')->with('success', 'Time cadastrado com sucesso!');
    }

}
