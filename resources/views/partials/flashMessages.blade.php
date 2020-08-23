
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>    
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>    
    @endif

    @if ($message = Session::get('info'))
        <div class="alert alert-info alert-block">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>    
    @endif

    @if ($message = Session::get('warn'))
        <div class="alert alert-warning alert-block">
            <button class="close" type="button" data-dismiss="alert">x</button>
            <strong>{{$message}}</strong>
        </div>    
    @endif
