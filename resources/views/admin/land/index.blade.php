@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>Land List</h4>
            <a href="{{ route('land.create') }}" class="btn btn-success btn-sm">Add Land</a>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col">ক্রমিক</th>
                        <th scope="col">মালিকের নাম</th>
                        <th scope="col">মালিকের অংশ</th>
                        <th scope="col">জেলা</th>
                        <th scope="col">উপজেলা</th>
                        <th scope="col">মৌজার নাম</th>
                        <th scope="col">হোল্ডিং নম্বর</th>
                        <th scope="col">খতিয়ান নং</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lands as $key => $item)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <td>{{ $item->owner_name }}</td>
                            <td>{{ $item->owner_share }}</td>
                            <td>{{ $item->district->name ?? '' }}</td>
                            <td>{{ $item->thana->name ?? '' }}</td>
                            <td>{{ $item->mouja }}</td>
                            <td>{{ $item->holding }}</td>
                            <td>{{ $item->khatian }}</td>
                            <td>
                                <a href="{{ route('land.show',$item->id) }}" class="btn btn-sm btn-success">Show</a>
                                <a href="{{ route('land.edit',$item->id) }}" class="btn btn-sm btn-info">Edit</a>

                                <form action="{{ route('land.delete', $item->id) }}" method="POST"
                                    style="display: inline-block;"
                                    onsubmit="return confirm('Are you sure you want to delete this land record?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>
@endsection
