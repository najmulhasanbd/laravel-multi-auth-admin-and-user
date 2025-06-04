@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="header d-flex justify-content-between align-items-center mb-2">
                    <h4>Thana List</h4>
                    <a href="{{ route('thana.create') }}" class="btn btn-success btn-sm">Add Thana</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SL</th>
                                <th>Thana Name</th>
                                <th>District</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($thanas as $key => $thana)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ ucwords($thana->name) }}</td>
                                    <td>{{ ucwords($thana->district->name) ?? 'N/A' }}</td>
                                    <td>
                                        <a href="{{ route('thana.edit', $thana->id) }}" class="btn btn-sm btn-info">Edit</a>
                                        <form action="{{ route('thana.delete', $thana->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-sm btn-danger"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
