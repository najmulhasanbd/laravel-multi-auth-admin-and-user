@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>Land List</h4>
            <a href="{{ route('land.create') }}" class="btn btn-success btn-sm">Add Land</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">First</th>
                        <th scope="col">First</th>
                        <th scope="col">First</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
