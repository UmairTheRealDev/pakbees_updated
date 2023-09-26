@extends('layouts.admin.main')

@section('title', 'Edit Customer')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Customer</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.customers') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')

                            <form action="{{ route('admin.customer.edit', $customer) }}" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="region" class="form-label">Region</label>
                                        <input type="text" class="form-control @error('region') is-invalid @enderror"
                                            name="region" id="region" placeholder="Enter the region!"
                                            value="{{ old('region') ?? $customer->region }}">
                                        @error('region')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="city" class="form-label">City</label>
                                        <input type="text" class="form-control @error('city') is-invalid @enderror"
                                            name="city" id="city" placeholder="Enter the city!"
                                            value="{{ old('city') ?? $customer->city }}">
                                        @error('city')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="cluster" class="form-label">Cluster</label>
                                        <input type="text" class="form-control @error('cluster') is-invalid @enderror"
                                            name="cluster" id="cluster" placeholder="Enter the Cluster!"
                                            value="{{ old('cluster') ?? $customer->cluster }}">
                                        @error('cluster')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="program" class="form-label">Channel</label>
                                        <select name="channel" id="channel"
                                            class="form-select @error('channel') is-invalid @enderror">
                                            @foreach ($channels as $channel)
                                                @if (old('channel') == $channel)
                                                    <option value="{{ $channel ?? $customer->$channel }}" selected>
                                                        {{ $customer->channel }}</option>
                                                @else
                                                    <option value="{{ $channel }}">{{ $channel }}</option>
                                                @endif
                                            @endforeach




                                        </select>
                                        @error('channel')
                                            <!-- Correct the field name to 'channel' here -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="store_name" class="form-label">Store Name</label>
                                        <input type="text" class="form-control @error('store_name') is-invalid @enderror"
                                            name="store_name" id="store_name" placeholder="Enter the store name!"
                                            value="{{ old('store_name') ?? $customer->store_name }}">
                                        @error('store_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="store_code" class="form-label">Store code</label>
                                        <input type="text" class="form-control @error('store_code') is-invalid @enderror"
                                            name="store_code" id="store_code" placeholder="Enter the Store code!"
                                            value="{{ old('store_code') ?? $customer->store_code }}">
                                        @error('store_code')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>





                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="program" class="form-label">Program</label>
                                        <select name="program" id="program"
                                            class="form-select @error('program') is-invalid @enderror">

                                            @foreach ($program as $prog)
                                                @if (old('program') == $prog)
                                                    <option value="{{ $prog ?? $customer->program }}" selected>
                                                        {{ $customer->program }}</option>
                                                @else
                                                    <option value="{{ $prog }}">{{ $prog }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('program')
                                            <!-- Correct the field name to 'program' here -->
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-4 mb-3">
                                        <label for="day" class="form-label">Day</label>
                                        <select name="day" id="day"
                                            class="form-select @error('day') is-invalid @enderror">
                                            <option value="" selected>Select a day!</option>
                                            @if (old('day'))
                                                @foreach ($days as $day)
                                                    @if (old('day') == $day)
                                                        <option value="{{ $day }}" selected>{{ $day }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $day }}">{{ $day }}</option>
                                                    @endif
                                                @endforeach
                                            @else
                                                @foreach ($days as $day)
                                                    @if ($customer->day == $day)
                                                        <option value="{{ $day }}" selected>{{ $day }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $day }}">{{ $day }}</option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('day')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
