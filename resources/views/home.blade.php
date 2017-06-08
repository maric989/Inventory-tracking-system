@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    {{--{{dd($logedUser)}}--}}
                    <p>Welcome <a href="{{route('users.show',$logedUser->id)}}">{{$logedUser->name}}</a> </p>

                    <p>Your Location: {{$logedUser->location->name}}</p>
                    <p>Your Products:
                        @foreach($products as $product)

                            <li><a href="{{route('product.show',$product->id)}}">{{$product->name}}</a>
                                 | {{$product->location->name}}
                                 | {{$product->unique_id}}

                            </li>

                        @endforeach
                      </div>
            </div>
        </div>
    </div>
</div>
@endsection
