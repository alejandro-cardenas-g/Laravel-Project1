@if (Auth::user()->image)
<!--
        <img src="{{ url('user/avatar/'.Auth::user()->image)}}">
-->
<div class="container-avatar">

    <img class="avatar" src="{{ Route('user.avatar', ['filename' => Auth::user()->image]) }}" >

</div>
    
@endif