@extends('main')
@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Item</h1>
    </div>

    <div class="col-lg-4">
        <form method="POST" action="/items" class="mb-5">
            @csrf
            <div class="card bg-light mb-3 ">
                <div class="card-body ">
                    <div class="row mb-3">
                        <div class="col">
                            <label for="name_item" class="form-label">Name Item</label>
                            <input type="text" class="form-control @error('name_item') is-invalid @enderror" id="name_item" name="name_item" required autofocus value="{{ old('name_item') }}">
                            <input type="hidden" value="0" name="qty_item">
                            @error('name_item')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="no_item" class="form-label">No Item</label>
                            <input type="text" class="form-control @error('no_item') is-invalid @enderror" id="no_item" name="no_item" required autofocus value="{{ old('no_item') }}">
                            @error('no_item')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3 mt-3">
                        <div class="col">
                            <label for="selectType" class="form-label mb-3">Type Item</label>
                            <select class="form-select" id="selectType" name="type_item">
                            </select>
                        </div>
                        <div class="col d-flex align-items-end">
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="brcd_item" value="1" id="brcd_item">
                                <label class="form-check-label" for="brcd_item" >
                                    Barcode
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="justify-content-center mt-2">
                        <button class="btn btn-dark" style="width: 30%" type="submit">Add Item</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="{{ asset('js/items/create.js') }}"></script>
@endsection