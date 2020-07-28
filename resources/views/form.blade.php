@extends('layouts.app')

@section('content')
    <template-form :id="{!! $id !!}"></template-form>
    <video-modal></video-modal>
    <rich-modal></rich-modal>
@endsection
