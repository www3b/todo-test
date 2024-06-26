<?php

namespace App\Http\Controllers;

use App\Enums\Priority;
use App\Models\Task;
use App\Services\TaskRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    protected $repository;

    function __construct(TaskRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(): Response
    {
        return Inertia::render('App', [
            'tasks' => $this->repository->getTasksList(),
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'max:50'],
            'description' => ['required', 'max:500'],
            'deadline' => ['required'],
            'priority' => [Rule::enum(Priority::class)],
        ]);

        // dd($data);

        $this->repository->create($data);

        return to_route('tasks.index');
    }

    public function done(int $id)
    {
        $task = Task::find($id);
        $this->repository->update($id, ['done' => $task->done === 1 ? 0 : 1]);
        return to_route('tasks.index');
    }

    public function delete(int $id)
    {
        $this->repository->delete($id);
        return to_route('tasks.index');
    }
}
