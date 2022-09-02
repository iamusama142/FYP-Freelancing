@include('admin_header')





<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <div class="card" style="width: 50rem;
                margin-top: 100px; padding:10px;">
                    <div class="card-body" id="msgBody">
                        {{-- @foreach ($name as $valname) --}}
                            <h5 class="card-title text-dark"> Send Messages
                            </h5>
                        {{-- @endforeach --}}
                        <form action="/sendmessage" method="POST">

                            @csrf

                            <input type="hidden" value='{{ $id }}' name="toUser" id="toUser">

                            <input type="hidden" value='{{ session()->get('USER_id') }}' name="fromuser"
                                id="fromuser">
                            {{-- <input type="text" value='{{ request()->route('id') }}'' name="touser" id="toUser"> --}}



                            {{-- <input type="text" value='{{ session()->get('USER_id') }}'' name="fromUser" id="toUser" hidden> --}}
                            {{-- {{ $datid->User }} --}}

                            @foreach ($chats as $chat)
                                @if ($chat->FromUser == session()->get('UserTwo'))
                                    <div style="text-align: right; ">
                                        <p
                                            style="background-color:lightblue; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%; ">
                                            {{ $chat->Messages }}</p>
                                    </div>
                                @else
                                    <div style="text-align: left; ">
                                        <p
                                            style="background-color:#ffffb4; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%; ">
                                            {{ $chat->Messages }}</p>
                                    </div>
                                @endif
                            @endforeach
                            <div class="modal-footer">
                                <textarea id="message" name="message" class="form-control" style="height: 70px;"></textarea>
                                <button class="btn btn-primary" id="send" style="height: 70%;">Send</button>
                            </div>

                        </form>
                    </div>
                </div>
            </center>

        </div>
    </div>
</div>












<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
crossorigin="anonymous" referrerpolicy="no-referrer"></script>
{{--
<script>
    $(document).ready(function() {
        $("#send").on("click", function(e) {
            e.preventDefault();
            let fromUser = $("#fromUser").val();
            let toUser = $("#toUser").val();
            let message = $("#message").val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({

                url: '/sendmessage',
                method: 'post',
                data: {
                    fromUser: fromUser,
                    toUser: toUser,
                    message: message,

                },
                success: function(response) {
                    console.log(response);
                    $("#message")[0].reset();
                }
            });
            e.preventDefault();

        });



        $("form").submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: '/sendmessage',
                    method: 'post',
                    data: $('form').serialize(),
                    success: function(response) {
                        // fetchAllprograms();
                        console.log(response)
                        alert("AJAX request successfully completed");
                        // swal("Congratulations!", "Student Record Is Added!", "success");
                        $("form")[0].reset();
                    },
                    error: function() {
                      alert("error")

                    }

                });
                // fetchAllprograms();
            });

setInterval(function(){
$.ajax({
    url: '/sendrealtimemsg',
    method:'POST',
    data:{
        fromUser:$("#fromUser").val(),
        toUser:$("#toUser").val(),
    },
    dataType:"text",
    success:function(data)
    {
        $("#msgBody").html(data);
    }
});
});


    });
</script> --}}






@include('admin_footer')
