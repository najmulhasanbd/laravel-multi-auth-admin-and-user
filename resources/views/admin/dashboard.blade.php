@extends('admin.layouts.master')
@section('content')
    <div class="main-content">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="singleCard card p-4 shadow">
                    <h2>{{$districts}}</h2>
                    <h3><b>Districts</b></h3>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="singleCard card p-4 shadow">
                    <h2>{{$thanas}}</h2>
                    <h3><b>Thanas</b></h3>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 ">
                <div class="singleCard card p-4 shadow">
                    <h2>{{$lands}}</h2>
                    <h3><b>Lands</b></h3>
                </div>
            </div>
        </div>
    </div>
@endsection
