@extends('layouts.app')

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading"><p class="lead">{{$product->name}} info</p>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-12 text-left">
                                    <table class="table">

                                        <tr>

                                            <td><b>Name:</b></td>
                                            <td>{{$product->name}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Type:</b></td>
                                            <td>{{$product->type}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Serial Number:</b></td>
                                            <td>{{$product->serial_no}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Unique ID:</b></td>
                                            <td>{{$product->unique_id}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Date of Purchase</b></td>
                                            <td>{{$product->date_of_purchase->format('d.M.Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Warranty:</b></td>
                                            <td>{{$product->warranty->format('d.M.Y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><b>Location ID</b></td>
                                            <td>
                                                {{$product->location->name}}

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <b>Item used by</b>
                                            </td>
                                            <td>
                                                @if($product->user)
                                                    <a href="/user/{{$product->user->id}}">
                                                        {{ $product->user->first_name }} {{ $product->user->last_name }}
                                                    </a>
                                                @else
                                                    No one is using this item at the moment.
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Aditional Attributes
                                            </td>

                                        </tr>
                                        @foreach($attributes as $att)
                                            <tr>

                                                <td><b>{{$att->name}}</b></td>
                                                <td>{{$att->value}}</td>


                                            </tr>
                                        @endforeach
                                        <tr>
                                            <form action="addAttribute" method="post">
                                                <input type="hidden" value="{{$product->id}}" name="product_id"
                                                       id="product_id">
                                                {{ csrf_field() }}
                                                <td><input type="text" placeholder="Attribute" id="name" name="name">
                                                </td>


                                                <td><input type="text" placeholder="Value" id="value" name="value">
                                                </td>
                                                <td><input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit">Add</button>
                                                </td>

                                            </form>

                                        </tr>

                                        <tr>
                                            <td>
                                                <form action="/product/delete/{{$product->id}}" method="POST"
                                                      onsubmit="return confirm('Are you sure?');">

                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button type="submit" class="btn btn-danger">Delete</button>

                                                </form>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr>
                                    <form class="form-control-static" method="post" action="addNotes">
                                        {{ csrf_field()}}

                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                                        <textarea name="body" cols="50" rows="5"
                                                  placeholder="add new notes">
                                        </textarea>
                                        <button type="submit" class="btn btn-primary">Submit note</button>


                                    </form>


                                    <a href="/product">Back to items</a>
                                    @foreach($notes as $note)
                                        <tr>
                                            <blockquote>

                                                <p>{{ $note->body }}</p>

                                                    <a href="{{route(('users.show'), ($note->user_id))}}">
                                                        {{ \App\User::find($note->user_id)->email }}
                                                    </a> -
                                                    <p>{{ $note->created_at->diffForHumans() }}</p>

                                            </blockquote>

                                        </tr>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 ">


            </div>
        </div>
    </div>











@endsection