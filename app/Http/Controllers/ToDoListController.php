<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToDoListRequest;
use App\Http\Requests\UpdateToDoListRequest;
use App\Models\ToDoList;

class ToDoListController extends Controller
{
    public function index()
    {
        return redirect()->route('dashboard');
    }

    public function create()
    {
        return view('todolists.create');
    }

    public function store(StoreToDoListRequest $request)
    {
        $user = auth()->user();

        $user->toDoLists()->create($request->validated());

        return to_route('dashboard');
    }

    public function edit(ToDoList $todolist)
    {
        $this->authorize('update', $todolist);

        return view('todolists.edit', compact('todolist'));
    }

    public function update(UpdateToDoListRequest $request, ToDoList $todolist)
    {
        $this->authorize('update', $todolist);

        $todolist->fill($request->validated())->save();

        return to_route('dashboard')->with('message', 'To Do List updated successfully');
    }

    public function destroy(ToDoList $todolist)
    {
        $this->authorize('update', $todolist);

        $todolist->delete();

        return to_route('dashboard')->with('message', 'To Do List deleted successfully');
    }

    public function restore($id)
    {
        $todolist = ToDoList::withTrashed()->findOrFail($id);
        $todolist->restore();

        return to_route('dashboard')->with('message', 'To Do List restored successfully');
    }

    public function listDeleted()
    {
        $user = auth()->user();

        $MAX_ITEMS_PER_PAGE = 5;

        $todolists = $user
            ->todolists()
            ->onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->paginate($MAX_ITEMS_PER_PAGE);

        return view('todolists.deleted', [
            'todolists' => $todolists
        ]);

    }
}
