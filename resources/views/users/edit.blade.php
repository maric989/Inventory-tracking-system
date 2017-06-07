@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Edit New User</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>

            </div>

        </div>

    </div>

    @if (count($errors) > 0)

        <div class="alert alert-danger">

            <strong>Whoops!</strong> There were some problems with your input.<br><br>

            <ul>

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{route('users.update',$user->id)}}" method="post">

        {{csrf_field()}}

        <input name="_method" type="hidden" value="PUT">


        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>First Name:</strong>

                    <input type="text" name="first_name" class="form-control" placeholder="first name"
                           value="{{$user->name}}">

                </div>

            </div>


            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Role:</strong>
                    <select name="roles_id">

                        <option value="">None</option>

                        @foreach($roles as $role)

                            <option value="{{ $role->id }}">

                                {{ $role->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Location:</strong>
                    <select name="location_id">

                        <option value="">{{$user->location->name}}</option>

                        @foreach($location as $loc)

                            <option value="{{ $loc->id }}">

                                {{ $loc->name }}
                            </option>

                        @endforeach

                    </select>
                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>
@endsection