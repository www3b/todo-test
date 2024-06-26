<?php

namespace App\Http\Controllers;

use App\Services\TaskRepository;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

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
}
