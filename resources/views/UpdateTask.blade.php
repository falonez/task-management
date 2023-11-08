
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card p-4">
            <h3>Detail Tugas</h3>
            <div class="card p-2">
            <div class="d-flex gap-2">
                <h5>{{$taskDetail->title}}</h5>
                <p>
                @if($taskDetail->urgency == "low")
                    <span class="badge bg-primary">
                        Aman
                    </span>
                @elseif($taskDetail->urgency == "medium")
                    <span class="badge bg-success">
                        Medium
                    </span>
                @elseif($taskDetail->urgency == "high")
                    <span class="badge bg-warning">
                        Urgent
                    </span>
                @endif
                </p>
            </div>
            <p>{{$taskDetail->description}}</p>
            </div>
            <form class="" method="post" action="{{ route('task.updateTask') }}">
                @csrf
                <div class="mb-2">
                    <label>Status</label>
                    <select class="form-select" name="status" aria-label="Default select example" required>
                        <option selected disabled value="">Pick Urgency Task</option>
                        <option value="open">Open</option>
                        <option value="on_progress">On Progress</option>
                        <option value="review">Review</option>
                        <option value="solve">Solve</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Skor</label>
                    <select class="form-select" name="skor" aria-label="Default select example" required>
                        <option selected disabled value="">Give Skor</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <!-- <div class="mb-2">
                    <label>Skor</label>
                    <input class="form-control" type="number" value="{{$taskDetail->urgency}}" placeholder="Masukan Deskripsi" name="skor" aria-label="default input example">
                </div> -->
                <input type="hidden" value="{{ $taskDetail->id}}" name="id_user">
                <div class="d-flex flex-row justify-content-end mb-3 mt-4">
                    <button type="submit" class="btn btn-sm btn-primary">Update Tugas</button>
                </div> 
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
