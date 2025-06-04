@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="header d-flex justify-content-between align-items-center mb-2">
                    <h4>Edit Thana</h4>
                    <a href="{{ route('thana.index') }}" class="btn btn-success btn-sm">Thana List</a>
                </div>
                <form action="{{ route('thana.update', $thana->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="card p-3">
                        <div class="form-group">
                            <label for="district_id">Select District</label>
                            <select name="district_id" class="form-control" required>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}"
                                        {{ $district->id == $thana->district_id ? 'selected' : '' }}>
                                        {{ $district->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="name">Thana Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $thana->name }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
