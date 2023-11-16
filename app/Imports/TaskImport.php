<?php

namespace App\Imports;

use App\Models\Task;
use Maatwebsite\Excel\Concerns\ToModel;

class TaskImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Task([
            //
            'title' => $row[1],
            'description' => $row[2],
            'urgency' => $row[3],
            'duration' => $row[4],
            'deadline' => $row[5],
            'user_assign_task' => $row[6],
            'user_create_task' => $row[7],
            'created_at' => $row[8],
            'updated_at' => $row[9],
            'status' => $row[10],
            'skor' => $row[11],
        ]);
    }
}
