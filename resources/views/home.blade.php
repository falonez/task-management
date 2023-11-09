<!-- mendapatkan data dari controller  -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
        <!-- Button trigger modal -->
        <div class="d-flex flex-row justify-content-end mb-3">
            <a class="btn btn-primary mb-4" href="{{ route('Addtask') }}">Tambahkan Tugas</a>
        </div>
        <h1 class="fs-4">List TugasMu</h1>
        <table class="table">
            <thead class="border">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Urgency</th>
                <th scope="col">Duration</th>
                <th scope="col">Deadline</th>
                <th scope="col">Task From</th>
                <th scope="col">Status</th>
                <th scope="col">Skor</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task_assign as $task)
                    <tr class="border">
                        <th  class="align-middle" scope="row">{{ $loop->iteration }}</th>
                        <td class="align-middle">{{ $task->title }}</td>
                        <td class="align-middle">{{ $task->description }}</td>
                        <td class="align-middle">
                            @if($task->urgency == "low")
                                <span class="badge bg-primary">
                                    Task Aman
                                </span>
                            @elseif($task->urgency == "medium")
                                <span class="badge bg-success">
                                    Task Medium
                                </span>
                            @elseif($task->urgency == "high")
                                <span class="badge bg-warning">
                                    Task Urgent
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">{{ $task->duration }} hours</td>
                        <td class="align-middle">{{ $task->deadline }}</td>
                        <td class="align-middle">{{ $task->userCreate->name }}</td>
                        <td class="align-middle">
                            @if($task->status == "open")
                                <span class="badge bg-primary">
                                    Task Open
                                </span>
                            @elseif($task->status == "solve")
                                <span class="badge bg-success">
                                    Task Solve
                                </span>
                            @elseif($task->status == "on_progress")
                                <span class="badge bg-warning">
                                    Task On Progress
                                </span>
                            @elseif($task->status == "review")
                                <span class="badge bg-danger">
                                    Task Review
                                </span>
                            @endif
                        </td>
                        <td class="align-middle">{{ $task->skor }}</td>
                        <td class="align-middle"><img width="100" src="{{ asset('storage/images/'.$task->image)}}" alt=""/></td>
                        @if($task->status == "on_progress" || $task->status == "open")
                        <td class="align-middle">
                            <a class="btn btn-sm btn-primary mb-4" href="{{ route('task.updateMytask',['id'=>$task->id,'task'=>$task->status]) }}">{{$task->status == "open" ? 'Change to On Progress' : 'Change to Review' }}</a>
                        </td>
                        @endif
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1 class="fs-4">List Tugas Assign</h1>
        <table class="table">
            <thead class="border">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Urgency</th>
                <th scope="col">Duration</th>
                <th scope="col">Deadline</th>
                <th scope="col">Task For</th>
                <th scope="col">Status</th>
                <th scope="col">Skor</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($task_create as $task)
                    <tr class="border">
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td  class="align-middle">{{ $task->title }}</td>
                        <td  class="align-middle">{{ $task->description }}</td>
                        <td  class="align-middle">
                            @if($task->urgency == "low")
                                <span class="badge bg-primary">
                                    Task Aman
                                </span>
                            @elseif($task->urgency == "medium")
                                <span class="badge bg-success">
                                    Task Medium
                                </span>
                            @elseif($task->urgency == "high")
                                <span class="badge bg-warning">
                                    Task Urgent
                                </span>
                            @endif
                        </td>
                        <td  class="align-middle">{{ $task->duration }} hours</td>
                        <td  class="align-middle">{{ $task->deadline }}</td>
                        <td  class="align-middle">{{ $task->userAssign->name }}</td>
                        @if($task->status == "open")
                        <td  class="align-middle">
                            <span class="badge bg-primary">
                                Task Open
                            </span>
                        </td>
                        @elseif($task->status == "solve")
                        <td  class="align-middle">
                            <span class="badge bg-success">
                                Task Solve
                            </span>
                        </td>
                        @elseif($task->status == "on_progress")
                        <td  class="align-middle">
                            <span class="badge bg-warning">
                                Task On Progress
                            </span>
                        </td>
                        @elseif($task->status == "review")
                        <td  class="align-middle">
                            <span class="badge bg-danger">
                                Task Review
                            </span>
                        </td>
                        @endif
                        <td  class="align-middle">{{ $task->skor }}</td>
                        @if($task->status == "review")
                        <td  class="align-middle">
                            <a class="btn btn-sm btn-primary mb-4" href="{{ route('task.update',['id'=>$task->id]) }}">Update Tugas</a>
                        </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@endsection
