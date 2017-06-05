@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Role Management</h2>

            </div>

            <div class="pull-right">

                @permission('role-create')

                <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>

                @endpermission

            </div>

        </div>

    </div>

    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered">

        <tr>

            <th>No</th>

            <th>Name</th>

            <th>Description</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($roles as $key => $role)

            <tr>

                <td>{{ ++$i }}</td>

                <td>{{ $role->display_name }}</td>

                <td>{{ $role->description }}</td>

                <td>

                    <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>



                    @permission('role-delete')

                    <form method="post" action="roles/{{$role->id}}" style="display: inline" onsubmit="return confirm('Are you sure?');">


                        <input type="hidden" name="_token" value="{{ csrf_token() }}">


                        <button type="submit" class="btn btn-danger"> Delete

                    </button>
                    </form>
                    @endpermission

                </td>

            </tr>

        @endforeach

    </table>

    {!! $roles->render() !!}

@endsection