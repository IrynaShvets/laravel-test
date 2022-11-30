@extends('layouts.app')

@section('title-block')
    Update record
@endsection

@section('content')
    <h1>Update record</h1>

    <form action="{{ route('contact-update-submit', $data->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $data->name }}" placeholder="Enter a name" id="name"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $data->email }}"  placeholder="Enter a email" id="email"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="subject">Message subject</label>
            <input type="text" name="subject" value="{{ $data->subject }}" placeholder="Message subject" id="subject"
                class="form-control">
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" placeholder="Enter a message" class="form-control">{{ $data->message }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
