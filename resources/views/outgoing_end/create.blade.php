@extends('main')
@section('container')
    <div class="col-lg-8">
        <a href="/" class="btn btn-dark"><- Back list outgoing</a>
            <form method="POST" action="/outgoing_end/add" class="mb-5">
                @csrf
                <div class="card bg-light mb-3 ">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="name_pic" class="form-label">Name</label>
                                <input type="text" class="form-control" disabled id="name_pic" name="name_pic" required value="{{ old('name_pic', $outgoings->name_pic) }}">
                                <input type="text" style="display: none;" name="id_data" required value="{{ old('id', $outgoings->id) }}">
                            </div>
                            <div class="col">
                                <label for="id_pic" class="form-label">Id</label>
                                <input type="text" class="form-control" disabled id="id_pic" name="id_pic" required value="{{ old('id_pic', $outgoings->id_pic) }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="current_date" class="form-label">Date</label>
                                <input type="date" class="form-control" disabled id="current_date" name="current_date" required value="{{ old('current_date', $outgoings->current_date) }}">
                                @error('current_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="site_name" class="form-label">Site Name</label>
                                <input type="text" class="form-control" disabled id="site_name" name="site_name" required value="{{ old('site_name', $outgoings->site_name) }}">
                                @error('site_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th style="width: 2%;" scope="col">NO</th>
                            <th style="width: 25%;" scope="col">Name of Goods</th>
                            <th style="width: 10%;" scope="col">No Material</th>
                            <th style="width: 6%;" scope="col">In</th>
                            <th style="width: 6%;" scope="col">use</th>
                            <th style="width: 10%;" scope="col">Barcode</th>
                        </tr>
                    </thead>
                        <?php
                            $pattern = "/\(([^)]+)\)/";
                            $no = 1;
                        ?>
                    <tbody>
                        @foreach (explode("|-|", $items) as $item)
                            <?php
                                if (preg_match_all($pattern,$item, $matches)) {
                                    foreach (array_chunk($matches[1], 4) as $chunk) {
                                        $no_item = $chunk[0];
                                        $name_item = $chunk[1];
                                        $qty_item = $chunk[2];
                                        $brcd = $chunk[3];
                                    }
                                }
                            ?>
                            <tr>
                                <td>{{ $no }}</td>
                                <td>{{ $name_item }}</td>
                                <td>{{ $no_item }}</td>
                                <td><input type='number' class='form-control' style='width: 50px;' disabled name='amt_out[]' value="{{ $qty_item }}"></td>
                                <td><input type='number' class='form-control' style='width: 50px;' name='amt_use[]'></td>
                                <td>
                                    @if($brcd == 1)
                                        <?php
                                            if (preg_match_all($pattern,$outgoings->brcd_item_info, $matches)) {
                                                foreach (array_chunk($matches[1], 3) as $chunk) {
                                                    $no_itemed = $chunk[0];
                                                    $no_brcd = $chunk[1];
                                                    $po_itemed = $chunk[2];
                                                    $chunks = "($no_itemed)($no_brcd)($po_itemed)";
                                        ?>
                                        @if ($no_itemed == $no_item )
                                            <div class="input-group-text p-1" style='width: 150px;'><input class="form-check-input mt-1" type='checkbox' name='selectOption[]' value="{{ $chunks }}">{{ $no_brcd }}</div>
                                        @endif
                                        <?php
                                                }
                                            }
                                        ?>
                                    @endif
                                </td>
                            </tr>
                            <?php
                                $no++
                            ?>
                        @endforeach
                    </tbody>
                </table>
                <table class="table table-striped table-sm" id="brcdTable">
                    <thead>
                        <tr>
                            <th style="width: 20%;" scope="col">Defect Barcode</th>
                            <th style="width: 70%;" scope="col">Coment</th>
                            <th><button type="button" class="btn btn-dark" onclick="addBrcd()">Add</button></th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>

                <div class="card bg-light mb-3 mt-3">
                    <div class="card-body ">
                        <label for="coment" class="form-label">Coment</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" name="coment" style="height: 100px">{{ $outgoings->coment ?? old('coment') }}</textarea>
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
<script src="{{ asset('js\outgoing_end\create.js') }}"></script>
@endsection