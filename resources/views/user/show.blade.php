@extends('layouts.app')


@section('content')
    @if(Auth::user()->role == 'owner')
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Admins Table') }}</div>

                        <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                <div class="text-center">
                                    {{ $status }}
                                </div>
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @if ($user->role != 'user')
                                                @can('edit-admins')
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role }}</td>
                                                        @if($user->role != "owner")
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.edit', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="btn btn-primary">
                                                                        Make User
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            {{-- <td><p data-placement="top" data-toggle="tooltip" title="Delete"><a href="{{ route('user.destroy',$user->id)}}"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a></p></td> --}}
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">
                                                                        <x-bi-trash-fill />
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        @else
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="btn btn-dark" disabled>
                                                                        site owner
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-dark" disabled>
                                                                        <x-bi-trash-fill />
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endcan
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    @endif
    @if(Auth::user()->can('edit-users'))
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ __('Users Table') }}</div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="mytable" class="table table-bordred table-striped">
                                    <thead>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            @can('edit-users')
                                                @if ($user->role == 'user')
                                                    <tr>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->role }}</td>
                                                            @if(Auth::user()->role == 'owner')
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.edit', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="btn btn-primary">
                                                                        Make Admin
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            @else
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <button class="btn btn-dark" disabled>
                                                                        <x-bi-pencil-square />
                                                                    </button>
                                                                </form>
                                                            </td>
                                                            @endif
                                                            <td>
                                                                <form class="d-inline" action="{{ route('user.destroy', $user->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-danger">
                                                                        <x-bi-trash-fill />
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                @endif
                                            @endcan
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
