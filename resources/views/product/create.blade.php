
@extends('layouts.app')

@section('content')

    <div class="container">


        <div class="col-lg-6">

            <form class="form-horizontal createForm" method="post" action="/product">

                {{ csrf_field()}}



                <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="type">Type:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="type" id="type" placeholder="Product type">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="serial_no">Serial Number:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="serial_no" name="serial_no"
                               placeholder="Serial Number">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="unique_id">Unique ID:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="unique_id" name="unique_id" placeholder="Unique ID">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="warrancy">Warrancy:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="warranty" name="warranty"
                               placeholder="Warrancy Date">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-3" for="date_of_purc">Date of purchase:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date_of_purc" name="date_of_purc"
                               placeholder="Date of purchase">
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

                <div class="form-group">

                    <label class="control-label col-sm-3" for="location">Assign user:</label>

                    <div class="col-sm-8">

                        <select name="user_id">

                            <option value="">none</option>

                            @foreach($users as $user)

                                <option value="{{ $user->id }}">

                                    {{ $user->first_name }} {{ $user->last_name }}

                                </option>

                            @endforeach

                        </select>

                    </div>

                </div>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>


            </form>
            <ul>
            </ul>

        </div>
@endsection