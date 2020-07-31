@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">

            <div class="card">
                @foreach($pref_lists as $key => $list)
                    <div class="card-haeder p-3 w-100 d-flex">
                        <a onclick="document.form_{{ $key }}.submit();return false;"
                            href="/?={{ $list->pref }}">{{ $list->pref }}</a>
                        <form action="{{ route('clinics.index_pref') }}" method="GET"
                            class="form-horizontal" name="form_{{ $key }}" id="form_{{ $key }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="pref_code" value="{{ $list->pref }}">
                        </form>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@endsection
