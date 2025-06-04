@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>Edit Land</h4>
            <a href="{{ route('land.index') }}" class="btn btn-success btn-sm">Land List</a>
        </div>

        <form action="{{ route('land.update', $land->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card shadow-sm border-0 p-4">
                <h4 class="mb-4 border-bottom pb-2 text-primary">Owner Information</h4>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4">
                        <label for="owner_name" class="form-label fw-semibold">Owner Name</label>
                        <input type="text" id="owner_name" name="owner_name" class="form-control"
                            value="{{ $land->owner_name }}" placeholder="Enter owner's full name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="owner_share" class="form-label fw-semibold">Owner Share (%)</label>
                        <input type="text" id="owner_share" name="owner_share" class="form-control"
                            value="{{ $land->owner_share }}" placeholder="Enter share percentage" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="land_office" class="form-label fw-semibold">Land Office</label>
                        <input type="text" id="land_office" name="land_office" class="form-control"
                            value="{{ $land->land_office }}" placeholder="Enter land office name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="mouja" class="form-label fw-semibold">Mouja</label>
                        <input type="text" id="mouja" name="mouja" class="form-control" value="{{ $land->mouja }}"
                            placeholder="Enter mouja name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="district_id" class="form-label fw-semibold">District</label>
                        <select id="district_id" name="district_id" class="form-select">
                            <option disabled selected>Select district</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}"
                                    {{ $land->district_id == $district->id ? 'selected' : '' }}>
                                    {{ $district->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="thana_id" class="form-label fw-semibold">Thana</label>
                        <select id="thana_id" name="thana_id" class="form-select">
                            <option disabled selected>Select thana</option>
                            @foreach ($thanas as $thana)
                                <option value="{{ $thana->id }}" {{ $land->thana_id == $thana->id ? 'selected' : '' }}>
                                    {{ $thana->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Other fields -->
                    <div class="col-md-6 col-lg-4">
                        <label for="holding" class="form-label fw-semibold">Holding</label>
                        <input type="text" id="holding" name="holding" class="form-control"
                            value="{{ $land->holding }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="khatian" class="form-label fw-semibold">Khatian</label>
                        <input type="text" id="khatian" name="khatian" class="form-control"
                            value="{{ $land->khatian }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="3YearsUpBokeya" class="form-label fw-semibold">3 Years Up Bokeya</label>
                        <input type="text" id="3YearsUpBokeya" name="3YearsUpBokeya" class="form-control"
                            value="{{ $land->{'3YearsUpBokeya'} }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="3YearsBokeya" class="form-label fw-semibold">3 Years Bokeya</label>
                        <input type="text" id="3YearsBokeya" name="3YearsBokeya" class="form-control"
                            value="{{ $land->{'3YearsBokeya'} }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="bokeyaAmount" class="form-label fw-semibold">Bokeya Amount</label>
                        <input type="text" id="bokeyaAmount" name="bokeyaAmount" class="form-control"
                            value="{{ $land->bokeyaAmount }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="hallDabi" class="form-label fw-semibold">Hall Dabi</label>
                        <input type="text" id="hallDabi" name="hallDabi" class="form-control"
                            value="{{ $land->hallDabi }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalDabi" class="form-label fw-semibold">Total Dabi</label>
                        <input type="text" id="totalDabi" name="totalDabi" class="form-control"
                            value="{{ $land->totalDabi }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalCollection" class="form-label fw-semibold">Total Collection</label>
                        <input type="text" id="totalCollection" name="totalCollection" class="form-control"
                            value="{{ $land->totalCollection }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalDue" class="form-label fw-semibold">Total Due</label>
                        <input type="text" id="totalDue" name="totalDue" class="form-control"
                            value="{{ $land->totalDue }}" />
                    </div>

                    <div class="col-12">
                        <label for="comments" class="form-label fw-semibold">Comments</label>
                        <textarea id="comments" name="comments" rows="3" class="form-control">{{ $land->comments }}</textarea>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="session" class="form-label fw-semibold">Session</label>
                        <input type="text" id="session" name="session" class="form-control"
                            value="{{ $land->session }}" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="chalan" class="form-label fw-semibold">Chalan</label>
                        <input type="text" id="chalan" name="chalan" class="form-control"
                            value="{{ $land->chalan }}" />
                    </div>

                    <div class="repeater-group">
                        <label class="form-label fw-semibold d-block">Land Details</label>
                        <div id="land-details-wrapper">
                            @php
                                $line_nos = json_decode($land->line_no ?? '[]', true);
                                $land_classes = json_decode($land->land_class ?? '[]', true);
                                $land_amounts = json_decode($land->land_amount ?? '[]', true);
                                $max = max(count($line_nos), count($land_classes), count($land_amounts));
                            @endphp

                            @for ($i = 0; $i < $max; $i++)
                                <div class="row g-3 land-details-item {{ $i == 0 ? 'initial-item' : 'mt-2' }}">
                                    <div class="col-md-4">
                                        <input type="text" name="line_no[]" class="form-control"
                                            value="{{ $line_nos[$i] ?? '' }}" placeholder="Enter line no" />
                                    </div>
                                    <div class="col-md-4">
                                        <input type="text" name="land_class[]" class="form-control"
                                            value="{{ $land_classes[$i] ?? '' }}" placeholder="Enter land class" />
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="land_amount[]" class="form-control"
                                            value="{{ $land_amounts[$i] ?? '' }}" placeholder="Enter land amount" />
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" class="btn btn-sm btn-danger remove-item">&minus;</button>
                                    </div>
                                </div>
                            @endfor
                        </div>

                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-success" id="add-land-detail">+ Add
                                More</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const wrapper = document.getElementById("land-details-wrapper");
            const addBtn = document.getElementById("add-land-detail");

            addBtn.addEventListener("click", function() {
                const item = document.createElement("div");
                item.className = "row g-3 land-details-item mt-2";
                item.innerHTML = `
                <div class="col-md-4">
                    <input type="text" name="line_no[]" class="form-control" placeholder="Enter line no" />
                </div>
                <div class="col-md-4">
                    <input type="text" name="land_class[]" class="form-control" placeholder="Enter land class" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="land_amount[]" class="form-control" placeholder="Enter land amount" />
                </div>
                <div class="col-md-1">
                    <button type="button" class="btn btn-sm btn-danger remove-item">&minus;</button>
                </div>
            `;
                wrapper.appendChild(item);
            });

            wrapper.addEventListener("click", function(e) {
                if (e.target.classList.contains("remove-item")) {
                    const item = e.target.closest(".land-details-item");
                    if (!item.classList.contains("initial-item")) {
                        item.remove();
                    }
                }
            });
        });
    </script>
@endsection
