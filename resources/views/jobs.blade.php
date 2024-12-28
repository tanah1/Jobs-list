@extends('main')

@section('title', 'Jobs')

@section('content')

<div class="container mt-4">
    <!-- Success Message -->
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Message -->
    @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ Session::get('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Page Title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Jobs List</h2>
        <a href="{{ route('create') }}" class="btn btn-success btn-sm">Add New Job</a>
    </div>

    <!-- Search Field -->
    <div class="mb-3">
        <input
            type="text"
            id="searchByJobName"
            class="form-control"
            placeholder="Search by job name">
    </div>
    <div id="ajax_search_result">
        <!-- Jobs Table -->
        @if (!empty($jobs) && $jobs->count() > 0)
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->id }}</td>
                            <td>{{ $job->name }}</td>
                            <td>
                                <span class="badge {{ $job->active ? 'bg-success' : 'bg-danger' }}">
                                    {{ $job->active ? 'Active' : 'Not Active' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('edit', $job->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form
                                    style="display: inline-block;"
                                    action="{{ route('destroy', $job->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure you want to delete this job?');">
                                        Delete
                                     </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="d-flex justify-content-center">
                {{ $jobs->links() }}
            </div>
        @else
            <div class="alert alert-warning text-center" role="alert">
                No jobs available at the moment.
            </div>
        @endif

    </div>
</div>

@endsection







