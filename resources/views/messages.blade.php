@extends('layouts.app')

@section('title-block')
    All messages
@endsection

@section('content')
    <h1>All messages</h1>
    @foreach ($contacts as $contact)
        <div class="alert alert-info">
            <h3>{{ $contact->subject }}</h3>
            <p>{{ $contact->email }}</p>
            <p><small>{{ $contact->created_at }}</small></p>
            <a href="{{ route('contact-data-one', $contact->id) }}"><button class="btn btn-warning">More details</button></a>
        </div>
    @endforeach

    <div class="mt-3">
        {{ $contacts->withQueryString()->links() }}
    </div>
@endsection
