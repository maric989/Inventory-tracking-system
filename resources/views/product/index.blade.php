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
            <th width="230px">Action</th>
            <th>Notification</th>

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

                        {{ $item->user->name }}

                    @else


                        <form method="post" action="addUser">
                            {{csrf_field()}}
                            {{ method_field('PUT') }}
                        <input type="hidden" value="{{$item->id}}" name="item_id">

                            <select name="user_id">

                                <option value="">none</option>


                                @foreach($users as $user)

                                    <option value="{{ $user->id }}">

                                        {{ $user->name }}

                                    </option>


                                @endforeach

                            </select>

                            <button type="submit">Add user</button>
                        </form>

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
                <td>
                    @if($item->warranty < date("Y-m-d", strtotime("+1 month")))
                        <span class="alert-warning">Warranty expires in {{$current->diffInDays($item->warranty)}} days </span>
                    @endif
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>


{{--
    {!! $products->render() !!}
--}}

@endsection