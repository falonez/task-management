
@extends('layouts.app')

<!-- dumpt data user  -->


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
            <form class="p-4" method="post" action="{{ route('task.create') }}">
                @csrf
                <div class="mb-2">
                    <label>Task Name</label>
                    <input class="form-control" type="text" required placeholder="Masukan Task" name="title" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Deskripsi</label>
                    <input class="form-control" type="text" required placeholder="Masukan Deskripsi" name="description" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Urgensi</label>
                    <select class="form-select" name="urgency" aria-label="Default select example" required>
                        <option selected disabled value="">Pick Urgency Task</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
                <div class="mb-2">
                    <label>Durasi</label>
                    <input class="form-control" type="number" required placeholder="Masukan Durasi dalam satuan jam" name="duration" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>Batas Waktu</label>
                    <input class="form-control" type="date" required placeholder="Masukan Durasi dalam satuan jam" name="deadline" aria-label="default input example">
                </div>
                <div class="mb-2">
                    <label>User Assign</label>
                    <select class="form-select" name="user_assign_task" aria-label="Default select example" required>
                        <option selected disabled value="">Pick User</option>
                        @foreach ($user as $userr)
                            @if($userr->id !== Auth::user()->id) {
                                <option value="{{ $userr->id }}">{{ $userr->name }}</option>
                            }
                            @endif
                        @endforeach
                    </select>
                </div>
                <input type="hidden" value="{{ Auth::user()->id}}" name="user_create_task">
                <div class="d-flex flex-row justify-content-end mb-3 mt-4">
                    <button type="submit" class="btn btn-sm btn-primary">Buat Tugas</button>
                </div>  
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
