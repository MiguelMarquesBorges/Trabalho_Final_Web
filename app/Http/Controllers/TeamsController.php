<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class TeamsController extends Controller
{
    public function create()
    {
        return view("times.create");
    }
    public function store(Request $request)
    {

        $logoPath = null;

        if ($request->hasFile('team_symbol')) {
            $logoPath = $request->file('team_symbol')->store('teams', 'public');
        }

        Team::create([
            'id' => $request->id,
            'team_name' => $request->nome,
            'team_sigle' => strtoupper($request->sigla),
            'id_adm' => $request->adm_id,
            'team_symbol' => $logoPath,
        ]);


        return redirect()->route('times.create')->with('success', 'Time cadastrado com sucesso!');
    }

    public function index()
    {
        $times = Team::all();
        return view('times.list', compact('times'));
    }

    public function removeView()
    {
        $times = Team::all();
        return view('times.remove', compact('times'));
    }

    public function destroy($id)
    {
        $time = Team::findOrFail($id);

        // Apagar o arquivo de logo
        if ($time->logo_path && \Storage::disk('public')->exists($time->logo_path)) {
            \Storage::disk('public')->delete($time->logo_path);
        }

        $time->delete();

        return redirect()->route('times.remove')->with('success', 'Time removido com sucesso!');
    }
    public function edit($id)
    {
        $time = Team::findOrFail($id);
        return view('times.edit', compact('time'));
    }

    public function update(Request $request, $id)
    {
        $time = Team::findOrFail($id);

        $request->validate([
            'nome' => 'required|string|max:255',
            'sigla' => 'required|string|max:5',
            'adm_id' => 'required|integer',
            'logo' => 'nullable|image|mimes:png|max:2048',
        ], [
            'nome.required' => 'O nome do time é obrigatório.',
            'sigla.required' => 'A sigla é obrigatória.',
            'adm_id.required' => 'O ID do administrador é obrigatório.',
            'logo.image' => 'A logo deve ser um arquivo PNG válido.',
        ]);

        $time->nome = $request->nome;
        $time->sigla = strtoupper($request->sigla);
        $time->adm_id = $request->adm_id;

        if ($request->hasFile('logo')) {
            if ($time->logo_path && \Storage::disk('public')->exists($time->logo_path)) {
                \Storage::disk('public')->delete($time->logo_path);
            }

            $path = $request->file('logo')->store('logos', 'public');
            $time->logo_path = $path;
        }

        $time->save();

        return redirect()->route('times.list')->with('success', 'Time atualizado com sucesso!');
    }


}


