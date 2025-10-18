<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TaskModel;
use App\Entities\Task;
use CodeIgniter\Exceptions\PageNotFoundException;

class Tasks extends BaseController
{
    protected $taskModel;

    public function __construct()
    {
        // Crea el modelo
        $this->taskModel = new TaskModel();

        // Requiere estar logueado para acceder a cualquier acción de este controlador
        if (! session('is_logged_in')) {
            redirect()
                ->to('/login')
                ->with('warning', 'Por favor inicia sesión.')
                ->send();
            exit;
        }
    }

    public function index()
    {
        $tasks = $this->taskModel->findAll();
        return view('tasks/index', ['tasks' => $tasks]);
    }

    public function show($id)
    {
        $task = $this->findTaskOr404($id);
        return view('tasks/show', ['task' => $task]);
    }
    public function new()
    {
        return view('tasks/new', ['task' => ['description' => '']]);
    }

    public function create()
    {
        // Si usas Entity:
        $task = new Task([
            'description' => $this->request->getPost('description'),
        ]);

        if (! $this->taskModel->insert($task)) {
            return redirect()->back()
                ->with('errors', $this->taskModel->errors())
                ->with('warning', 'Invalid data')
                ->withInput();
        }

        return redirect()->to('/tasks/show/' . $this->taskModel->getInsertID())
            ->with('info', 'Task created successfully');
    }

    public function edit($id)
    {
        $task = $this->findTaskOr404($id);
        return view('tasks/edit', ['task' => $task]);
    }

    public function update($id)
    {
        $task = $this->findTaskOr404($id);

        // Rellena la entidad rápido
        $task->fill([
            'description' => $this->request->getPost('description'),
        ]);

        // Guarda solo si cambió algo
        if (! $task->hasChanged()) {
            return redirect()->back()->with('info', 'Nothing to update');
        }

        if (! $this->taskModel->save($task)) {
            return redirect()->back()
                ->with('errors', $this->taskModel->errors())
                ->with('warning', 'Invalid data')
                ->withInput();

                }

        return redirect()->to('/tasks/show/' . $task->id)
            ->with('info', 'Task updated successfully');
    }

    public function deleteConfirm($id)
    {
        $task = $this->findTaskOr404($id);
        return view('tasks/delete', ['task' => $task]);
    }

    public function destroy($id)
    {
        $task = $this->findTaskOr404($id);

        if (! $this->taskModel->delete($task->id)) {
            return redirect()->back()
                ->with('warning', 'Unable to delete task (try again).');
        }

        return redirect()->to('/tasks')
            ->with('info', 'Task deleted');
    }

    // ---------- helpers privados ----------

    protected function findTaskOr404($id)
    {
        $task = $this->taskModel->find($id);

        if (! $task) {
            throw PageNotFoundException::forPageNotFound("Task with ID $id not found.");
        }

        return $task;
    }
}