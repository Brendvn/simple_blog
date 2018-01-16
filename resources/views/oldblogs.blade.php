@if ($oldPosts->count())
    <div class="container">
        @foreach($oldPosts as $opost)

            <div class="row">

                @if (strlen($opost->image)==0)
                    <h4 class="col-3">My latest blog post!</h4>
                    <h4 class="col-3">Sorry, no pictures this time!</h4 >
                    <h6 class="col-2 offset-md-2">{{$opost->created_at}}</h6>
                @else
                    <h4 class="col-7">My latest blog post!</h4>
                    <h6 class="col-2 offset-md-1">{{$opost->created_at}}</h6>
                @endif

            </div>


            <div class="row">
                @if (strlen($opost->image)>1)
                    <img src="images/{{$opost->image}}" alt="Smiley face" height="42" width="42" class="col-4">
                    <h6 class="col-6">{{$opost->content}}</h6 >
                @else
                    <h6 class="col-9">{{$opost->content}}</h6 >
                @endif

            </div>



        @endforeach


    </div>
@endif

@if ($lastPosts->count())
    @php
        $text = 'My less recent blog post!'
    @endphp
@foreach($lastPosts as $lpost)

    <div class="container">
        <div class="row">

            @if (strlen($lpost->image)==0)

                <h4 class="col-3">{{$text}}</h4>
                <h4 class="col-3">Sorry, no pictures this time!</h4 >
                <h6 class="col-2 offset-md-2">{{$lpost->created_at}}</h6>
            @else
                <h4 class="col-7">{{$text}}</h4>
                <h6 class="col-2 offset-md-1">{{$lpost->created_at}}</h6>
            @endif

        </div>


        <div class="row">
            @if (strlen($lpost->image)>1)
                <img src="images/{{$lpost->image}}" alt="Smiley face" height="42" width="42" class="col-4">
                <h6 class="col-6">{{$lpost->content}}</h6 >
            @else
                <h6 class="col-9">{{$lpost->content}}</h6 >
            @endif

        </div>


    </div>
    @php
        $text='Today, in old news'
    @endphp
@endforeach
@endif



