@extends('layouts.app')



@section('content')

    <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Products </h2>

            </div>

            <div class="pull-right">

                @permission('item-create')

                <a class="btn btn-success" href="product/create"> Create New Item</a>

                @endpermission

            </div>

        </div>

    </div>
    <input type="text" id="search">
    @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

    @endif

    <table class="table table-bordered" >
        <thead>
        <tr>

            <th>Name</th>
            <th>Type</th>
            <th>Serial No</th>
            <th>User Assigned</th>
            <th>Unique No</th>
            <th>Location</th>
            <th>Date of purchase</th>
            <th>Warranty</th>
            <th>Action</th>

        </tr>
        </thead>
        <tbody id="tabela">
        @foreach ($products as $key => $item)

            <tr>

                <td>{{ $item->name }}</td>

                <td>{{ $item->type }}</td>
                <td>{{ $item->serial_no }}</td>
                <td>
                    @if($item->user)

                        {{ $item->user->first_name }} {{ $item->user->last_name }}

                    @else

                        <p>No one use</p>

                    @endif
                </td>
                <td>{{ $item->unique_id }}</td>
                <td>{{ $item->location->name }}</td>
                <td>{{ $item->date_of_purchase->format('d.M.Y') }}</td>
                <td>{{ $item->warranty->format('d.M.Y')  }}</td>

                <td>

                    <a class="btn btn-info" href="product/{{$item->id}}">Show</a>

                    @permission('item-edit')

                    <a class="btn btn-primary" href="product/{{$item->id}}/edit">Edit</a>

                    @endpermission

                    @permission('item-delete')
                    <a class="btn btn-danger" href="product/delete/{{$item->id}}">Delete</a>

                    @endpermission

                </td>

            </tr>

        @endforeach
        </tbody>
    </table>


{{--
    {!! $products->render() !!}
--}}

@endsection