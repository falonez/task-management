
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form class="p-4" method="post" action="{{ route('task.updateTask') }}">
                @csrf
                <!-- <div class="mb-2">
                    <label>Task Name</label>
                    <input class="form-control" type="text" value="{{$taskDetail->title}}" placeholder="Masukan Task" name="title" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <input class="form-control" type="text" value="{{$taskDetail->description}}" placeholder="Masukan Deskripsi" name="description" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Urgency</label>
                    <input class="form-control" type="text" value="{{$taskDetail->urgency}}" placeholder="Masukan Deskripsi" name="description" aria-label="default input example">
                </div> -->
                <!-- <div class="mb-2">
                    <label>Urgensi</label>
                    <select class="form-select" name="urgency" value="{{$taskDetail->urgency}}" aria-label="Default select example">
                        <option selected disabled>Pick Urgency Task</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div> -->
                <!-- <div class="mb-2">
                    <label>Durasi</label>
                    <input class="form-control" type="number" placeholder="Masukan Durasi dalam satuan jam" name="duration" aria-label="default input example">
                </div> -->
                <!-- <div class="mb-2">
                    <label>Batas Waktu</label>
                    <input class="form-control" type="date" placeholder="Masukan Durasi dalam satuan jam" name="deadline" aria-label="default input example">
                </div> -->
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
                <button type="submit">Update Tugas</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
