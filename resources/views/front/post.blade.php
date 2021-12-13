@extends('front/layout.layout')

@section('title','Post Page')
@section('post_title',$result[0]->title)

@section('content')
                        <h2 class="section-heading">{{$result[0]->title}}</h2>
                        <p>{{$result[0]->long_dec}}</p>
@endsection