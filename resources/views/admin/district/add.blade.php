@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>District Create</h4>
            <a href="{{ route('district.index') }}" class="btn btn-success btn-sm">District List</a>
        </div>
        <form action="{{ route('district.store') }}" method="POST">
            @csrf
            <div class="card p-3">
                <div class="form-group">
                    <label for="name">District Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter district name" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Save</button>
            </div>
        </form>
    </div>
@endsection
