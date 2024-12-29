@extends('main')
@section('container')
    <style>

    .card {
        position: sticky;
        width: 25rem;
        min-height: 100px;
        margin-bottom: 20px;
    }

    .card-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .card-background {
        position: absolute;
        bottom: 0;
        right: 0;
        width: 50px;
        height: 50px;
        background-repeat: no-repeat;
        background-position: center center;
        background-size: contain;
    }

    /* Additional styles for card body */
    .card-body {
        padding: 1rem;
    }

    </style>
    <div class="row mt-5">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/incoming/create" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/form.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">Form Incoming</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/incoming" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/list2.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">List Incoming</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/outgoing/create" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/form.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">Form Outgoing</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/outgoing" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/list2.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">List Outgoing</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/outgoing_end" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/list2.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">List Outgoing ~END</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/items/create" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/box.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">Add Items</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/items" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/list.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">List Items</h4>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/typeitem" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/list.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">List Type Items</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-lg-4 mb-3">
            <div class="card">
                <a href="/user" class="card-link">
                    <div class="card-background" style="background-image: url('{{ asset('png/user.png') }}');"></div>
                    <div class="card-body bg-light">
                        <h4 class="card-title">User</h4>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection