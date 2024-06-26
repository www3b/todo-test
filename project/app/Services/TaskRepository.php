<?php

namespace App\Services;

use App\Models\Task;

class TaskRepository
{
  public function getTasksList()
  {
    return Task::all();
  }
}
