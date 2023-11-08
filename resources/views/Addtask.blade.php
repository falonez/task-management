
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <form class="p-4" method="post" action="{{ route('task.create') }}">
                @csrf
                <div class="mb-2">
                    <label>Task Name</label>
                    <input class="form-control" type="text" placeholder="Masukan Task" name="title" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <input class="form-control" type="text" placeholder="Masukan Deskripsi" name="description" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Urgensi</label>
                    <select class="form-select" name="urgency" aria-label="Default select example">
                        <option selected disabled>Pick Urgency Task</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Durasi</label>
                    <input class="form-control" type="number" placeholder="Masukan Durasi dalam satuan jam" name="duration" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Batas Waktu</label>
                    <input class="form-control" type="date" placeholder="Masukan Durasi dalam satuan jam" name="deadline" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>User Assign</label>
                    <select class="form-select" name="user_assign_task" aria-label="Default select example">
                        <option selected disabled>Pick User</option>
                        @foreach ($user as $userr)
                            <option value="{{ $userr->id }}">{{ $userr->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" value="{{ Auth::user()->id}}" name="user_create_task">
                <button type="submit">Buat Tugas</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
