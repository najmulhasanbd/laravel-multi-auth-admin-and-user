@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="header mb-2 d-flex justify-content-between align-items-center">
                    <h4>District Create</h4>
                    <a href="{{ route('district.index') }}" class="btn btn-success btn-sm">District List</a>
                </div>
                <form action="{{ route('district.update', $district->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card p-3">
                        <div class="form-group">
                            <label for="name">District Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $district->name }}"
                                required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
