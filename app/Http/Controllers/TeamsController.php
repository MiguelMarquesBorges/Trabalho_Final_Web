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
        $request->validate([
            'team_name' => 'required|string|max:20',
            'team_sigle' => 'required|string|max:5',
            'team_logo' => 'required|image|mimes:png',
        ]);

        $logoData = null;
        if ($request->hasFile('team_logo') && $request->file('team_logo')->isValid()) {
            $image = file_get_contents($request->file('team_logo')->getRealPath());
            $logoData = base64_encode($image);
        }

        Team::create([
            'team_name' => $request->team_name,
            'team_sigle' => strtoupper($request->team_sigle),
            'team_symbol' => $logoData,
        ]);

        return redirect()->route('home')->with('success', 'Time cadastrado com sucesso!');
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

        return redirect()->route('times.list')->with('success', 'Time removido com sucesso!');
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
            'team_name' => 'required|string|max:255',
            'team_sigle' => 'required|string|max:5',
            'team_logo' => 'nullable|image|mimes:png',
        ], [
            'team_name.required' => 'O nome do time é obrigatório.',
            'team_sigle.required' => 'A sigla é obrigatória.',
            'team_logo.image' => 'A logo deve ser um arquivo PNG válido.',
        ]);

        $time->team_name = $request->team_name;
        $time->team_sigle = strtoupper($request->team_sigle);

        if ($request->hasFile('team_logo')) {
            $image = file_get_contents($request->file('team_logo')->getRealPath());
            $time->team_symbol = $image;
        }

        $time->save();

        return redirect()->route('times.list')->with('success', 'Time atualizado com sucesso!');
    }

}


