@extends('layouts.app')
@section('content')

    <form class="form-horizontal" method="post" action="/product/{{$product->id}}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}

        <div class="form-group">
            <label class="control-label col-sm-3" for="name">Name:</label>
            <div class="col-sm-8">
                <input type="text" value="{{$product->name}}" class="form-control" name="name" id="name"
                       placeholder="Product Name">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="type">Type:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" value="{{$product->type}}" name="type" id="type"
                       placeholder="Product type">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="serial_no">Serial Number:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="serial_no" value="{{$product->serial_no}}" name="serial_no"
                       placeholder="Serial Number">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="unique_id">Unique ID:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="unique_id" name="unique_id" value="{{$product->unique_id}}"
                       placeholder="Unique ID">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="warrancy">Warrancy:</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="warranty" name="warranty" value="{{$product->warrancy}}"
                       placeholder="Warrancy Date">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-3" for="date_of_purc">Date of purchase:</label>
            <div class="col-sm-8">
                <input type="date" class="form-control" id="date_of_purchase" name="date_of_purchase"
                       value="{{$product->date_of_purchase}}"
                       placeholder="Date of purchase">
            </div>
        </div>


        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>


@endsection