@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Incoming</h1>
    </div>

    <div class="col-lg-6">
        <form method="POST" id="formil" action="/incoming" class="mb-5">
            @csrf
            <div class="card bg-light mb-3 ">
                <div class="card-body ">
                    <div class="row">
                        <div class="col">
                            <label for="current_date" class="form-label">Date</label>
                            <input type="date" class="form-control @error('current_date') is-invalid @enderror" id="current_date" name="current_date" required autofocus value="{{ old('current_date') }}">
                            @error('current_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" class="form-control @error('site_name') is-invalid @enderror" id="site_name" name="site_name" required autofocus value="{{ old('site_name') }}">
                            @error('site_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="card bg-light" style="width:1030px;">
                    <div class="card-body ">
                        <table class="table table-striped table-sm" style="width:1000px;" id="itemTable">
                            <thead>
                                <tr>
                                    <th style="width: 50%">
                                        <div class="row">
                                            <div style="width:25%;">
                                                No Material
                                            </div>
                                            <div  style="width:75%;">
                                                Material Name
                                            </div>
                                        </div>
                                    </th>
                                    <th style="width: 14%">PO Number</th>
                                    <th style="width: 8%">QTY</th>
                                    <th style="width: 18%">Barcode</th>
                                    <th><button type="button" class="btn btn-dark" onclick="addItem()">Add</button></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card bg-light mb-3 mt-3">
                    <div class="card-body ">
                        <label for="coment" class="form-label">Coment</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="coment" style="height: 100px"></textarea>
                        @error('coment')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="justify-content-center mt-2">
                    <button class="btn btn-dark" style="width: 30%" type="submit">SAVE</button>
                </div>
        </form>
    </div>
    <script>var items = @json($items);</script>
    <script src="{{ asset('js/incoming/create.js') }}"></script>
@endsection