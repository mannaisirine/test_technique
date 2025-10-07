<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Afficher toutes les tâches d’un utilisateur
    public function index(Request $request)
    {
        $userEmail = $request->query('user_email');
        return Task::where('user_email', $userEmail)->get();
    }

    // Ajouter une tâche
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'priority' => 'required|integer|min:1|max:5',
            'user_email' => 'required|email'
        ]);

        $task = Task::create($validated + [
            'description' => $request->description,
            'due_date' => $request->due_date,
        ]);

        return response()->json($task, 201);
    }

    // Modifier une tâche
    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->update($request->all());
        return response()->json($task);
    }

    // Supprimer une tâche
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();
        return response()->json(['message' => 'Deleted']);
    }
}
