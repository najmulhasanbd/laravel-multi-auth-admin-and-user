@extends('admin.layouts.master')

@section('content')
    {{-- Select2 CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <div class="main-content">
        <div class="row">
            <div class="col-12 col-md-6 mx-auto">
                <div class="header mb-2 d-flex justify-content-between align-items-center">
                    <h4>Create Thanas</h4>
                    <a href="{{ route('thana.index') }}" class="btn btn-success btn-sm">Thana List</a>
                </div>

                <form action="{{ route('thana.store') }}" method="POST">
                    @csrf
                    <div class="card p-3">

                        {{-- District Select --}}
                        <div class="form-group">
                            <label>District</label>
                            <select name="district_id" class="form-control" required>
                                <option value="">Select District</option>
                                @foreach ($districts as $district)
                                    <option value="{{ $district->id }}">{{ $district->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Thana Name Multiple Input --}}
                        <div class="form-group mt-3">
                            <label>Thana Names</label>
                            <select class="form-control thana-multiple" name="name[]" multiple="multiple" required>
                                <option></option>
                            </select>
                            <small class="text-muted">Type thana name and press Enter. You can add multiple.</small>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.thana-multiple').select2({
                tags: true,
                tokenSeparators: [','],
                placeholder: "Enter thana names",
            });
        });
    </script>
@endsection
