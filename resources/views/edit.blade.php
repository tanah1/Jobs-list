@extends('main')

@section('title', 'Edit Job')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Edit Job</h2>
    <form method="POST" action="{{ route('update', $data['id']) }}">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="job_name" class="form-label">Job Name</label>
            <input
                type="text"
                name="job_name"
                value="{{ old('job_name', $data['name']) }}"
                class="form-control"
                id="job_name"
                placeholder="Enter job name">
            @error('job_name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="job_active" class="form-label">Job Status</label>
            <select
                name="job_active"
                id="job_active"
                class="form-select">
                <option value="" selected>Select Status</option>
                <option value="1" {{ old('job_active', $data['active']) == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ old('job_active', $data['active']) === 0 ? 'selected' : '' }}>Not Active</option>
            </select>
            @error('job_active')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update Job</button>
    </form>
</div>
@endsection
