@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 pt-5">
            <img alt="freecodecamp's profile picture" src="https://instagram.fsyd7-1.fna.fbcdn.net/v/t51.2885-19/s150x150/83213956_3360255157381124_5752385570823208960_n.jpg?_nc_ht=instagram.fsyd7-1.fna.fbcdn.net&amp;_nc_ohc=wLIsWO6fABwAX9A5nYn&amp;oh=5b7e92c6a52fc530e357b32fc5d8f8f4&amp;oe=5ED9CD46" class="rounded-circle"> 
        </div>
        <div class="col-9 pt-5">
            <div><h1>{{ $user->username }}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>153</strong> posts</div>
                <div class="pr-5"><strong>23k</strong> followers</div>
                <div class="pr-5"><strong>212</strong> following</div>
            </div>
            <div class="pt-5 font-weight-bold">{{ $user->profile->title }}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url }}</a></div>
        </div>
    </div>
    <div class="row pt-5">
        <div class="col-4">
            <img src="https://instagram.fsyd7-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.55.847.847a/s640x640/95032566_2590953614493815_1061141814829510346_n.jpg?_nc_ht=instagram.fsyd7-1.fna.fbcdn.net&amp;_nc_cat=111&amp;_nc_ohc=8ikzr5PVEN4AX9zWTNo&amp;oh=1fbbb0feff00b44a098ea0c8da744066&amp;oe=5ED7D34F" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fsyd7-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.55.847.847a/s640x640/95032566_2590953614493815_1061141814829510346_n.jpg?_nc_ht=instagram.fsyd7-1.fna.fbcdn.net&amp;_nc_cat=111&amp;_nc_ohc=8ikzr5PVEN4AX9zWTNo&amp;oh=1fbbb0feff00b44a098ea0c8da744066&amp;oe=5ED7D34F" class="w-100">
        </div>
        <div class="col-4">
            <img src="https://instagram.fsyd7-1.fna.fbcdn.net/v/t51.2885-15/sh0.08/e35/c0.55.847.847a/s640x640/95032566_2590953614493815_1061141814829510346_n.jpg?_nc_ht=instagram.fsyd7-1.fna.fbcdn.net&amp;_nc_cat=111&amp;_nc_ohc=8ikzr5PVEN4AX9zWTNo&amp;oh=1fbbb0feff00b44a098ea0c8da744066&amp;oe=5ED7D34F" class="w-100">
        </div>
    </div>
</div>
@endsection
