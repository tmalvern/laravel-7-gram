@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{ $post->image}}" alt="{{ $post->caption }}" class="w-100">
        </div>
        <div class="col-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{ $post->user->profile->profileImage() }}" alt="{{ $post->user->profile->username }}" class="w-100 rounded-circle" style="max-width:40px;">
                    </div>
                   
                    <div> 
                        <div class="font-weight-bold">
                            <a href="/profile/{{ $post->user->id }}"> 
                                <span class="text-dark">{{ $post->user->username }}</span> 
                            </a>
                            @if ($post->user->id != auth()->user()->id)
                                <follow-link user-id="{{ $post->user->id }}" follows="{{ $follows }}"></follow-link>
                            @endif
                        </div>
                    </div>
                   
                </div>
            </div>
            <hr>
            <p>
                <span class="font-weight-bold">
                    <a href="/profile/{{ $post->user->id }}"> 
                        <span class="text-dark">{{ $post->user->username }} </span>
                    </a>
                </span> {{ $post->caption }}
            </p>
            <div class="pt-2">
            @foreach($comments as $comment)
            
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{ $comment->user->id }}"> 
                            <span class="text-dark">{{ (auth()->user()->id == $comment->user->id)  ? 'you' : $comment->user->username }} </span>
                        </a>
                    </span> {{ $comment->comment }} <small class="text-muted"> {{ $post->createdWhen($comment->created_at) }}</small>
                </p>
            
            @endforeach
            </div>
            <comment-form post-id="{{ $post->id }}"></comment-form>
        </div>    
    </div>
    
</div>
@endsection
