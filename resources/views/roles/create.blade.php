@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Create New Role</h2>

            </div>

            <div class="pull-right">

                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>

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

    <form action="store" method="post">
        {{csrf_field()}}

    <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Name:</strong>

                <input name="name" placeholder="Name" class="form-control">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Display Name:</strong>

                <input type="text" name="display_name" placeholder="Display name" class="form-control">

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Description:</strong>

                <textarea name="description" placeholder="Description..." class="form-control"></textarea>

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">

                <strong>Permission:</strong>

                <br/>

                @foreach($permission as $value)

                    <label>
                        <input type="checkbox" name="permission[]" value="{{$value->id}}">
                        {{ $value->display_name }}</label>

                    <br/>

                @endforeach

            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">

            <button type="submit" class="btn btn-primary">Submit</button>

        </div>

    </div>

    </form>
@endsection