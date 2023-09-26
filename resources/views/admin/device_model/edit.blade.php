@extends('layouts.admin.main')

@section('title', 'Edit Model')

@section('content')
    <main class="content">
        <div class="container-fluid p-0">

            <div class="row">
                <div class="col-6">
                    <h1 class="h3 mb-3">Edit Model</h1>
                </div>
                <div class="col-6 text-end">
                    <a href="{{ route('admin.device_models') }}" class="btn btn-outline-primary">Back</a>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            @include('partials.alerts')
                            <form action="{{ route('admin.device_model.edit', $device_model) }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="brand_id" class="form-label">Brand</label>
                                    <select class="form-select @error('brand_id') is-invalid @enderror" name="brand_id"
                                        id="brand_id">
                                        <option value="" selected>Select brand</option>

                                        @if (old('brand_id'))
                                            @foreach ($brands as $brand)
                                                @if (old('brand_id') == $brand->id)
                                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        @else
                                            @foreach ($brands as $brand)
                                                @if ($device_model->brand_id == $brand->id)
                                                    <option value="{{ $brand->id }}" selected>{{ $brand->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('brand_id')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Enter the name!"
                                        value="{{ old('name') ?? $device_model->name }}">
                                    @error('name')
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
