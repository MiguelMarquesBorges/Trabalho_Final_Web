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

    public function index()
    {
        $times = \App\Models\Time::all();
        return view('times_list', compact('times'));
    }

    public function removeView()
    {
        $times = \App\Models\Time::all();
        return view('times_remove', compact('times'));
    }

    public function destroy($id)
    {
        $time = \App\Models\Time::findOrFail($id);

        // Apagar o arquivo de logo
        if ($time->logo_path && \Storage::disk('public')->exists($time->logo_path)) {
            \Storage::disk('public')->delete($time->logo_path);
        }

        $time->delete();

        return redirect()->route('times.remove')->with('success', 'Time removido com sucesso!');
    }
    public function edit($id)
    {
        $time = \App\Models\Time::findOrFail($id);
        return view('times_edit', compact('time'));
    }

    public function update(Request $request, $id)
    {
        $time = \App\Models\Time::findOrFail($id);

        // Validação
        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:5',
            'adm_id' => 'required|integer',
            'logo' => 'nullable|image|mimes:png|max:2048', // opcional
        ], [
            'nome.required' => 'O nome do time é obrigatório.',
            'sigla.required' => 'A sigla é obrigatória.',
            'adm_id.required' => 'O ID do administrador é obrigatório.',
            'logo.image' => 'A logo deve ser um arquivo PNG válido.',
        ]);

        // Atualiza dados
        $time->nome = $request->nome;
        $time->sigla = strtoupper($request->sigla);
        $time->adm_id = $request->adm_id;

        // Se o usuário enviar nova logo, substitui a antiga
        if ($request->hasFile('logo')) {
            // Apagar logo antiga, se existir
            if ($time->logo_path && \Storage::disk('public')->exists($time->logo_path)) {
                \Storage::disk('public')->delete($time->logo_path);
            }

            // Salvar nova logo
            $path = $request->file('logo')->store('logos', 'public');
            $time->logo_path = $path;
        }

        $time->save();

        return redirect()->route('times.list')->with('success', 'Time atualizado com sucesso!');
    }


}


