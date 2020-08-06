@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">

        {{-- <div class="col-md-10">
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    @foreach($all_clinic as $item)
                        <h2>{{ $item->pref }}</h2>
                    @endforeach
                </div>
            </div>
        </div> --}}

        @foreach($all_clinic as $clinic)
        <div class="col-md-10 mb-3">
                <div class="card">
                    <div class="card-haeder p-3 w-100 d-flex">
                        <div class="d-block">
                            <a href="{{ url('clinics/' .$clinic->id) }}" class="text-secondary">
                                <p style="font-weight: bold; color: green;">{{ $clinic->clinic_name }}</p>
                            </a>
                            @foreach($clinic->images as $image)
                                <img src="{{ $image->image_path }}" width="300" alt="{{ $clinic->clinic_name }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="card-body">
                        <p style="font-weight: bold; color: orange;">〠{{ $clinic->postal_code }}</p>
                        <p style="font-weight: bold; color: orange;">
                            {{ $clinic->pref }}{{ $clinic->city }}{{ $clinic->town }}</p>
                        <p style="font-weight: bold; color: orange;">✆{{ $clinic->tel }}</p>
                        <p style="font-weight: bold; color: orange;">
                            <a href="{{ $clinic->site_url }}" target="_blank">
                                {{ $clinic->site_url }}
                            </a>
                        </p>
                        <p style="font-weight: bold; color: orange;">{{ $clinic->email }}</p>
                        <a href="{{ url('clinics/' .$clinic->id) }}" class="text-secondary">
                            <p style="font-weight: bold; color: green;">コメント：{{ $clinic->comments_count }}件</p>
                        </a>
                    </div>

                    {{-- @foreach($clinic->comments as $comment)
                        <div class="card-footer">
                            <p style="font-weight: bold; color: blue;">
                                {{ $comment->post_name }}
                            <span style="text-align: right;">
                                {{ $comment->created_at }}
                            </span><br>
                            </p>
                            <p>
                                {!! nl2br(e($comment->text)) !!}
                            </p>
                        </div>
                    @endforeach --}}
        </div>
    </div>
    @endforeach

    <div class="my-4 d-flex justify-content-center">
        {{ $all_clinic->appends(request()->input())->links() }}
    </div>

    @endsection
