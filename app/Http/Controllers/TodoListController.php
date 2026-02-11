<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoListRequest;
use App\Http\Requests\UpdateTodoListRequest;
use App\Http\Resources\TodoListResource;
use App\Models\TodoList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = TodoList::query();
        $keyword = $request->get('q');

        $query->where(function ($q) use ($keyword) {
            $q->where('title', 'like', "%{$keyword}%")
                ->orWhere('description', 'like', "%{$keyword}%");
        });

        $filterByCompleted = $request->get('filter_by_completed');

        if ($request->has('filter_by_completed')) {
            $query->where('completed', $filterByCompleted);
        }

        $filterByDay= $request->get('filter_by_day');

        if ($request->has('filter_by_day')) {
            $query->whereDay('created_at', $filterByDay);
        }

        $filterByMonth= $request->get('filter_by_month');

        if ($request->has('filter_by_month')) {
            $query->whereMonth('created_at', $filterByMonth);
        }


        // $sortBy=$request->get('sort_by') ?? "id";
        // $sortDirection=$request->get('sort_by_direction') ?? "desc";

        $allowedSorts = ['id', 'title', 'created_at', 'completed'];

        $sortBy=in_array($request->get('sort_by'),$allowedSorts)
        ? $request->get('sort_by') : 'id';

        $sortDirection=in_array($request->get('sort_by_direction'),$allowedSorts)
        ? $request->get('sort_by_direction') : "desc";

        $query->orderBy($sortBy,$sortDirection);

        $todos = $query->paginate(7);

        return response()->json([
            'data' => TodoListResource::collection($todos),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoListRequest $request)
    {
        $todo = TodoList::create([...$request->validated(),
            'completed' => $request->filled('completed') ? $request->completed : false,
            'user_id' => Auth::id()]);

        return response()->json([
            'message' => 'todo created successfully',
            'data' => new TodoListResource($todo),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TodoList $todo)
    {
        return response()->json([
            'data' => new TodoListResource($todo),
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoListRequest $request, TodoList $todo)
    {
        $todo->update($request->validated());

        return response()->json([
            'message' => 'todo updated successfully',
            'data' => new TodoListResource($todo),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TodoList $todo)
    {
        $todo->delete();

        return response()->json([

            'data' => [
                'message' => 'todo delete successfully',
            ],
        ]);
    }
}
