<div class="bg-white p-3 p-md-4 rounded-1">
    <div class="widget">
        <h4>About Us</h4>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Assumenda debitis sequi quo quam! Voluptate aspernatur nihil, quasi consequuntur deserunt delectus, reprehenderit hic veniam minima tenetur vitae quae modi animi earum?</p>
    </div>

    <div class="widget widget-post">
        <h4>Recent Posts</h4>
        <ul class="de-bloglist-type-1">
             @foreach ($posts as $post)
            <li>
                <div class="d-image">
                    @if ($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" class="circle-widget circle" alt="{{ $post->title }}" loading="lazy">
                    @endif
                </div>
                <div class="d-content justify-content-between">
                    <a href="{{ url($post->url) }}"><h4>{{ $post->title }}</h4></a>
                    <div class="d-date">{{ $post->created_at->format('M d, Y') }}</div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
                            
    <div class="widget widget_tags">
        <h4>Category</h4>
        <ul>
            @foreach ($categories as $category)
            <li><a href="{{ url($category->url) }}">{{ $category->category }}</a></li>
            @endforeach
        </ul>
    </div>
</div>