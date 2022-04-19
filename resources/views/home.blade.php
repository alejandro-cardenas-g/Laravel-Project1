@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            @include('includes.message')
            @foreach ($images as $image)
            <div class="card publicacion_imagen">

                <div class="card-header">

                    @if($image->user->image)
                    <div class="container-avatar">

                        <img class="avatar" src="{{ Route('user.avatar', ['filename' => $image->user->image]) }}" >

                    </div>
                    @endif
                    <div class="username-data">
                        {{$image->user->nick}}
                    </div>

                </div>

                <div class="card-body">

                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
