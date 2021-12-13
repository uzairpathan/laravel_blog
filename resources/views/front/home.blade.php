@extends('front/layout.layout')

@section('title','Home Page')
@section('post_title','Home Page')

@section('content')
                    @foreach($result as $list)
                    <div class="post-preview">
                        <a href="{{ url('post/'. $list->slug)}}">
                            <h2 class="post-title">{{ $list->title }}</h2>
                            <h3 class="post-subtitle">{{ $list->short_dec }}</h3>
                        </a>
                        <p class="post-meta">
                            Posted on {{ $list->post_date }}
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    @endforeach
@endsection