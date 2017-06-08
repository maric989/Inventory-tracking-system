
@if(count($errors))


        <div class="alert alert-danger">
            <ul id="error">

                @foreach($errors->all() as $error)

                    <li> {{$error}}</li></br>

                @endforeach
            </ul>

        </div>



@endif