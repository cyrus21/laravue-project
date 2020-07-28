@extends('layouts.app')

@section('content')
    <template-form :id="{!! $id !!}"></template-form>
    <message-template></message-template>
    <text-modal :id="{!! $id !!}"></text-modal>
    <video-modal></video-modal>
    <rich-modal></rich-modal>
@endsection
