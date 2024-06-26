<?php

namespace App\Services;

use App\Models\Task;

class TaskRepository
{
  public function getTasksList()
  {
    return Task::all();
  }

  public function create(array $data)
  {
    $data['deadline'] = date_format(new \DateTime($data['deadline']), 'Y.m.d H:i:s');
    return Task::create($data);
  }

  public function update(int $id, array $data)
  {
    return Task::find($id)->update($data);
  }

  public function delete(int $id)
  {
    $task = Task::findOne($id);

    if (!$task) {
      return false;
    }

    return $task->delete();
  }
}
