@include('admin_header')


<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="text-danger"> ( Those Developers Thoose Requests Accepted By You ! )</h4>
        </div>
        <div class="modal-body">
            @foreach ($users as $val)
                <li> <a href="/chatpagetwo/{{ $val->id }}">{{ $val->f_name }} {{ $val->l_name }}</a> </li>
            @endforeach
        </div>
    </div>
</div>





@include('admin_footer')
