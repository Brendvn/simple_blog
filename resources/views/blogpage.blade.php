@extends('template.default')
<h1 align="center">My spectacular blog</h1>
<h3 align="center">A totally false statement</h3>
@section('content')
    <h3>New blog post</h3>
        <form action="{{route('homeupload')}}" method="post" enctype="multipart/form-data">


            <div class="row">

                <input type="text" name="title" id="" class="col-7" placeholder="My post title" tabindex="1" autofocus>
                <button type="submit" class="btn btn-primary col-2 offset-md-2" tabindex="5">Submit</button>
            </div>

            <div class="row">
                <textarea rows="4" cols="50" name="maintext" id="" class="col-7" placeholder="Here all my important post text!" tabindex="2"></textarea>
            </div>
            <div class="row">
                    <input type="email" id="email" name="email" class="col-7" placeholder="Email Address" tabindex="3">
            </div>
            <div class="row">
                    <input type="file" name="image" id="" value="Upload image" class="form-control-file col-7 col-md-7 ml-auto" tabindex="4">
                    {{csrf_field()}}
            </div>

        </form>
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

    @endsection()

@section('latest')
    <div class="container">
        <h5>Most used words here: {{$values}}</h5>
    </div>
    @include('oldblogs')
@endsection();
