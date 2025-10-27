<?php

namespace App\Http\Requests;

use App\Models\ToDoList;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreToDoListRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255', 'min:1'],
            'description' => ['nullable', 'string'],
            'status' => ['required', Rule::in(['pending', 'completed'])]
        ];
    }

    public function tryToStore(): bool
    {
        $toDoList = new ToDoList();
        $toDoList->title = $this->title;
        $toDoList->description = $this->description;
        $toDoList->status = $this->status;

        $toDoList->user_id = auth()->id();

        $toDoList->save();

        auth()->user()->toDoLists()->save($toDoList);

        return true;
    }

}
