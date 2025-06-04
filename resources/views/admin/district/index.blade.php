@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>District List</h4>
            <a href="{{ route('district.create') }}" class="btn btn-success btn-sm">Add District</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">SL</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($districts as $key => $item)
                        <tr>
                            <th scope="row">{{ $key + 1 }}</th>
                            <td>{{ $item->name }}</td>
                            <td>
                                <a href="{{ route('district.edit', $item->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('district.delete', $item->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
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
@endsection
