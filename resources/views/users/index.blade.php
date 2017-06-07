@extends('layouts.app')



@section('content')


    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Users Management</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>

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

            <th>Location</th>

            <th>Email</th>

            <th>Roles</th>

            <th width="280px">Action</th>

        </tr>

        @foreach ($data as $key => $user)

            <tr>

                <td>{{ $user->id }}</td>

                <td>{{ $user->name }}</td>

                <td>@if($user->location)

                        {{$user->location->name}}

                    @else

                        <p>None</p>

                    @endif

                </td>

                <td>{{ $user->email }}</td>

                <td>

                    @if(!empty($user->roles))

                        @foreach($user->roles as $v)

                            <label class="label label-success">{{ $v->display_name }}</label>

                        @endforeach

                    @endif

                </td>

                <td>

                    @permission('item-edit')

                    <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>

                    @endpermission


                    @permission('item-edit')

                    <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>

                    @endpermission


                    <form method="post" action="users/{{$user->id}}" style="display: inline"
                          onsubmit="return confirm('Are you sure?');">
                        {{csrf_field()}}

                        <input name="_method" type="hidden" value="DELETE">

                        <button type="submit" class="btn btn-danger"> Delete

                        </button>
                    </form>
                </td>

            </tr>

        @endforeach

    </table>

    {{--
        {!! $data->render() !!}
    --}}

@endsection