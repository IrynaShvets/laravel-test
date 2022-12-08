@section('aside')
<div class="aside">

        <div class="bg-success bg-gradient p-4 text-warning">
            <h2>Guides</h2>
            <p>Read more detailed instructions and documentation on using or contributing to Bootstrap.</p>
            <ul class="icon-list ps-0">
              <li class="d-flex align-items-start mb-1"><a href="{{ route('post-data') }}" class="text-warning">Posts</a></li>
              <li class="d-flex align-items-start mb-1"><a href="{{ route('product-data') }}" class="text-warning">Products</a></li>
              <li class="d-flex align-items-start mb-1"><a href="{{ route('contact-data') }}" class="text-warning">Messages</a></li>
            </ul>
          </div> 
  
    @show
 </div>