@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Create New User</h2>

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

    <form action="{{route('users.store')}}" method="post">
        {{csrf_field()}}

        <div class="row">

            <div class="col-xs-5">

                <div class="form-group">

                    <strong>First Name:</strong>

                    <input type="text" placeholder="First Name" name="first_name" class="form-control">

                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-xs-5">

                <div class="form-group">

                    <strong>Last Name:</strong>

                    <input type="text" placeholder="Last Name" name="last_name" class="form-control">

                </div>

            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Email:</strong>

                    <input type="text" placeholder="Email" name="email" class="form-control">

                </div>

            </div>

            <div class="form-group">

                <label class="control-label col-sm-3" for="location">Location:</label>

                <div class="col-sm-8">

                    <select name="location_id">

                        @foreach($location as $loc)

                            <option value="{{ $loc->id }}">

                                {{ $loc->name }}

                            </option>

                        @endforeach

                    </select><br>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Password:</strong>

                    <input type="password" name="password" placeholder="Password" class="form-control">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <strong>Confirm Password:</strong>

                    <input type="password" name="confirm-password" placeholder="Confirm Password" class="form-control">

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">

                <div class="form-group">

                    <fieldset>Role:

                        @foreach($roles as $role)

                            <label>
                                <input type="checkbox" name="roles[]" value="{{$role->id}}"
                                       class="form-control">{{$role->display_name}}
                            </label>

                        @endforeach

                    </fieldset>

                </div>

            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                <button type="submit" class="btn btn-primary">Submit</button>

            </div>

        </div>

    </form>

@endsection