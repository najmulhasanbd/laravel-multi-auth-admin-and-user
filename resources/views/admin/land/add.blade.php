@extends('admin.layouts.master')

@section('content')
    <div class="main-content">
        <div class="header mb-2 d-flex justify-content-between align-items-center">
            <h4>Land Create</h4>
            <a href="{{ route('land.index') }}" class="btn btn-success btn-sm">Land List</a>
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

        <form action="{{ route('land.store') }}" method="POST">
            @csrf
            <div class="card shadow-sm border-0 p-4">
                <h4 class="mb-4 border-bottom pb-2 text-primary">Owner Information</h4>

                <div class="row g-3">
                    <!-- Owner fields -->
                    <div class="col-md-6 col-lg-4">
                        <label for="owner_name" class="form-label fw-semibold">Owner Name</label>
                        <input type="text" id="owner_name" name="owner_name" class="form-control"
                            placeholder="Enter owner's full name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="owner_share" class="form-label fw-semibold">Owner Share (%)</label>
                        <input type="text" id="owner_share" name="owner_share" class="form-control only-numeric"
                            placeholder="Enter share percentage" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="land_office" class="form-label fw-semibold">Land Office</label>
                        <input type="text" id="land_office" name="land_office" class="form-control"
                            placeholder="Enter land office name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="mouja" class="form-label fw-semibold">Mouja</label>
                        <input type="text" id="mouja" name="mouja" class="form-control"
                            placeholder="Enter mouja name" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="district_id" class="form-label fw-semibold">District</label>
                        <select id="district_id" name="district_id" class="form-select">
                            <option selected disabled>Select district</option>
                            @foreach ($districts as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="thana_id" class="form-label fw-semibold">Thana</label>
                        <select id="thana_id" name="thana_id" class="form-select">
                            <option selected disabled>Select thana</option>
                        </select>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="holding" class="form-label fw-semibold">Holding</label>
                        <input type="text" id="holding" name="holding" class="form-control"
                            placeholder="Enter holding" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="khatian" class="form-label fw-semibold">Khatian</label>
                        <input type="text" id="khatian" name="khatian" class="form-control"
                            placeholder="Enter khatian" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="3YearsUpBokeya" class="form-label fw-semibold">3 Years Up Bokeya</label>
                        <input type="text" id="3YearsUpBokeya" name="3YearsUpBokeya" class="form-control only-numeric"
                            placeholder="Enter 3 Years Up Bokeya" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="3YearsBokeya" class="form-label fw-semibold">3 Years Bokeya</label>
                        <input type="text" id="3YearsBokeya" name="3YearsBokeya" class="form-control only-numeric"
                            placeholder="Enter 3 Years Bokeya" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="bokeyaAmount" class="form-label fw-semibold">Bokeya Amount</label>
                        <input type="text" id="bokeyaAmount" name="bokeyaAmount" class="form-control only-numeric"
                            placeholder="Enter Bokeya Amount" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="hallDabi" class="form-label fw-semibold">Hall Dabi</label>
                        <input type="text" id="hallDabi" name="hallDabi" class="form-control only-numeric"
                            placeholder="Enter Hall Dabi" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalDabi" class="form-label fw-semibold">Total Dabi</label>
                        <input type="text" id="totalDabi" name="totalDabi" class="form-control only-numeric"
                            placeholder="Enter Total Dabi" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalCollection" class="form-label fw-semibold">Total Collection</label>
                        <input type="text" id="totalCollection" name="totalCollection" class="form-control only-numeric"
                            placeholder="Enter Total Collection" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="totalDue" class="form-label fw-semibold">Total Due</label>
                        <input type="text" id="totalDue" name="totalDue" class="form-control only-numeric"
                            placeholder="Enter Total Due" />
                    </div>

                    <div class="col-12">
                        <label for="comments" class="form-label fw-semibold">Comments</label>
                        <textarea id="comments" name="comments" rows="3" class="form-control" placeholder="Enter comments"></textarea>
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="session" class="form-label fw-semibold">Session</label>
                        <input type="text" id="session" name="session" class="form-control"
                            placeholder="Enter session" />
                    </div>

                    <div class="col-md-6 col-lg-4">
                        <label for="chalan" class="form-label fw-semibold">Chalan</label>
                        <input type="text" id="chalan" name="chalan" class="form-control"
                            placeholder="Enter chalan" />
                    </div>

                    <div class="repeater-group">
                        <label class="form-label fw-semibold d-block">Land Details</label>
                        <div id="land-details-wrapper">
                            <div class="row g-3 land-details-item initial-item">
                                <div class="col-md-4">
                                    <input type="text" name="line_no[]" class="form-control only-numeric"
                                        placeholder="Enter line no" />
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="land_class[]" class="form-control"
                                        placeholder="Enter land class" />
                                </div>
                                <div class="col-md-3">
                                    <input type="text" name="land_amount[]" class="form-control only-numeric"
                                        placeholder="Enter land amount" />
                                </div>
                                <div class="col-md-1">
                                    <button type="button" class="btn btn-sm btn-danger remove-item">&minus;</button>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="button" class="btn btn-sm btn-success" id="add-land-detail">+ Add
                                More</button>
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-end">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.getElementById('district_id').addEventListener('change', function() {
            let districtId = this.value;

            fetch(`{{ url('/admin/land/get-thana') }}/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    let thanaSelect = document.getElementById('thana_id');
                    thanaSelect.innerHTML = '<option selected disabled>Select thana</option>';

                    data.forEach(thana => {
                        let option = document.createElement('option');
                        option.value = thana.id;
                        option.text = thana.name;
                        thanaSelect.appendChild(option);
                    });
                });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const wrapper = document.getElementById("land-details-wrapper");
            const addBtn = document.getElementById("add-land-detail");

            addBtn.addEventListener("click", function() {
                const item = document.createElement("div");
                item.className = "row g-3 land-details-item mt-2";
                item.innerHTML = `
                <div class="col-md-4">
                    <input type="text" name="line_no[]" class="form-control only-numeric" placeholder="Enter line no" />
                </div>
                <div class="col-md-4">
                    <input type="text" name="land_class[]" class="form-control" placeholder="Enter land class" />
                </div>
                <div class="col-md-3">
                    <input type="text" name="land_amount[]" class="form-control only-numeric" placeholder="Enter land amount" />
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.only-numeric').forEach(function(input) {
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            });
        });
    </script>

@endsection
