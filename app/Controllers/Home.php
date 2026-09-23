<?php

namespace App\Controllers;

use App\Models\TaskModel;

class Home extends BaseController
{
    public function index(): string
    {
        $taskModel = new TaskModel();
        $data['todayTasks'] = $taskModel->getTodayTasks();
        $data['today'] = date('Y-m-d');

        return view('home', $data);
    }
}
