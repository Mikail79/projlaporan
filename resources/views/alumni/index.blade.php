@extends('layouts.layout')

@section('container')

    <div style="height: 500px">
        <div class="row mt-4">
            <div class="col-6 text-start">
                <h1>Data Alumni</h1>
            </div>
            @can('is_admin')
                <div class="col-6 text-end">
                    <h3>
                        <a href="{{ route('alumni.create') }}" id="add">+ Add data</a>
                    </h3>
                </div>
            @endcan

        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-6">
                <form method="get" action="{{ route('alumni.index') }}">
                    @csrf
                    <select name="major_id" class="form-select" style="width: 95px">
                        <option value="1">TKRO</option>
                        <option value="2">PPLG</option>
                        <option value="3">TJKT</option>
                        <option value="4">TFLM</option>

                    </select>
                    <button type="submit" class="btn btn-secondary mt-2">Search</button>
                </form>
            </div>
            <div class="col-6">
                <form action="{{ route('alumni.index') }}" method="GET">
                    @if (request('major_id'))
                        <input type="hidden" name="major_id" value="{{ request('major_id') }}">
                    @endif
                    <div class="input-group mb-3 ms-auto" style="width: 200px">
                        <input type="text" class="form-control" placeholder="Search..." aria-describedby="button-addon2"
                            name="search">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i
                                class="bi bi-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="card my-4 shadow">
            <table class="table text-center align-center mb-4">
                <thead class="table table-dark">
                    <th>Image</th>
                    <th>Name</th>
                    <th>Graduation year</th>
                    <th>Major</th>
                    <th>Status</th>
                    <th>Position</th>
                    @can('is_admin')
                        <th width="280px">Action</th>
                    @endcan

                </thead>

                <tr>
                    @foreach ($alumnis as $alumnus)
                <tr>
                    <td><img src="/img/{{ $alumnus->foto }}" alt="" width="200px"></td>
                    <td>{{ $alumnus->name }}</td>
                    <td>{{ $alumnus->graduate }}</td>
                    <td>{{ $alumnus->major->name }}</td>   
                    <td>{{ $alumnus->status }}</td> 
                    <td>{{ $alumnus->position }}</td>
                    @can('is_admin')
                        <td>
                            <form action="{{ route('alumni.destroy', $alumnus->id) }}" method="POST">
                                <a class="btn btn-success" href="{{ route('alumni.edit', $alumnus->id) }}">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <i class="bi bi-person-x-fill"></i>
                                </button>
                            </form>
                        </td>
                    @endcan

                </tr>
                @endforeach
            </table>
        </div>
        <div class="text-secondary">
            {{ $alumnis->links() }}
        </div>
    </div>
@endsection
