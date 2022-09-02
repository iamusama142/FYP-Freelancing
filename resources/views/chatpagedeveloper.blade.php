@include('header')


<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4>Select Account For Chat</h4>
        </div>
        <div class="modal-body">

            @foreach ($users as $val )
            @if ($val->sender_id == session()->get('USER_id'))

                <li> <a href="/chatpagetwodeveloper/{{$val->id}}">{{$val->f_name}} {{$val->l_name}}</a> </li>
                @endif

            @endforeach


            @foreach ($usersone as $val )
            @if ($val->sender_id == session()->get('USER_id'))

                <li> <a href="/chatpagetwodeveloper/{{$val->id}}">{{$val->f_name}} {{$val->l_name}}</a> </li>
                @endif

            @endforeach

            @foreach ($userstwo as $val )
            @if ($val->reciever_id == session()->get('USER_id'))

                <li> <a href="/chatpagetwodeveloper/{{$val->id}}">{{$val->f_name}} {{$val->l_name}}</a> </li>
                @endif

            @endforeach
        </div>
    </div>
</div>





@include('footer')

