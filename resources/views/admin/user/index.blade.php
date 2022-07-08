@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12 mb-15 pb-15 pr-5 text-right">
            <h5 class="float-left">Users</h5>
            <a class="btn btn-info btn-md rounded-pill" href="{{ route('user.create') }}">Add User</a>
        </div>
        <hr>
        <div class="col-md-12">
            {{-- <div class="card-box mb-30 card-border" style="margin-right: 64px;"> --}}
            <div class="card-box height-100-p widget-style1 p-5">
                <div class="pb-20">
                    <table id="permission" class="row-border" style="width:80%:">
                        <thead>
                            <tr>
                                <th>S#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Active</th>
                                <th style="width: 13%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $key => $user)
                                @php
                                    $role = count($user->getRoleNames()) > 0 ? $user->getRoleNames()[0] : 'Not Assigned';
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $user->title }}. {{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $role }}</td>

                                    <td>
                                        <span
                                            class="badge badge-pill {{ $user->is_active == 1 ? 'badge-success' : 'badge-danger' }} ">{{ $user->is_active == 1 ? 'True' : 'False' }}</span>
                                    </td>
                                    <td class="d-flex">
                                        <a class="btn btn-outline-dark btn-sm rounded-pill"
                                            href="{{ route('user.edit', $user->id) }}">Edit</a>

                                        <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                            @method('delete')
                                            @csrf
                                            <button type="submit"
                                                class="btn btn-outline-danger btn-sm rounded-pill">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script></script>
@endsection
