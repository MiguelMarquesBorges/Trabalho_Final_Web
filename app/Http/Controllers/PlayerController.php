<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function list($time_id)
    {
        $time = Team::findOrFail($time_id);
        $jogadores = Player::where('team_id', $time_id)->get();

        return view('jogadores.list', compact('time', 'jogadores'));
    }

    public function create($time_id)
    {
        $time = Team::findOrFail($time_id);

        return view('jogadores.create', compact('time'));
    }

    public function store(Request $request, $time_id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'function' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
        ]);

        Player::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'function' => $request->function,
            'position' => $request->position,
            'number' => $request->number,
            'team_id' => $time_id,
        ]);

        return redirect()->route('jogadores.list', $time_id)->with('success', 'Jogador cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $jogador = Player::findOrFail($id);

        return view('jogadores.edit', compact('jogador'));
    }

    public function update(Request $request, $id)
    {
        $jogador = Player::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'function' => 'required|string|max:255',
            'position' => 'nullable|string|max:255',
            'number' => 'nullable|integer',
        ]);

        $jogador->update([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'function' => $request->function,
            'position' => $request->position,
            'number' => $request->number,
        ]);

        return redirect()->route('jogadores.list', $jogador->team_id)->with('success', 'Jogador atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $jogador = Player::findOrFail($id);
        $time_id = $jogador->team_id;
        $jogador->delete();

        return redirect()->route('jogadores.list', $time_id)->with('success', 'Jogador removido com sucesso!');
    }
}
