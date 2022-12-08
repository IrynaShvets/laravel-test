@extends('layouts.app')

@section('title-block')
    Main page
@endsection

@section('content')
    <h1>Main page</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt voluptatibus tempora veniam aperiam deleniti omnis
        pariatur dolores non cupiditate vero ea asperiores mollitia quos, nostrum, molestiae sapiente quae. Eos, tenetur!
    </p>
@endsection

@section('aside')
    @parent
    <div class="bg-dark bg-gradient p-4 m-4">
        <h2 class="text-white">Guides</h2>
        <p class="text-white">Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
    </div>
@endsection
