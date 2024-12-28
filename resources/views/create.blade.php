@extends('main')

@section('title', 'Create Job')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Add New Job</h2>
    <form method="POST" action= {{ route('store') }}>
        @csrf
        <div class="mb-3">
            <label for="job_name" class="form-label">Job Name</label>
            <input
                type="text"
                name="job_name"
                value='{{ old('job_name') }}'
                class="form-control"
                id="job_name"
                placeholder="Enter job name">
                @error('job_name')

                <span class='text-danger'>{{ $message }}</span>

                @enderror
        </div>

        <div class="mb-3">
            <label for="job_active" class="form-label">Job Status</label>
            <select
                name="job_active"
                id="job_active"
                class="form-select">
                <option value="" selected>Select Status</option>
                <option @if(old('job_active') == 1) selected @endif value="1">Active</option>
                <option @if(old('job_active') == 0 and old('job_active') != '') selected @endif value="0">Not Active</option>
            </select>
            @error('job_active')

            <span class="text-danger">{{ $message }}</span>

            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Job</button>
    </form>
</div>
@endsection
