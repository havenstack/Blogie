<!-- Banner Starts Here -->
<div class="main-banner header-text">
    <div class="container-fluid">
        <div class="owl-banner owl-carousel">
            @if(count($categories) > 0)
                @foreach($categories as $category)
                    <div class="item">
                        <img src="{{ asset('images/banner-item-0' . rand(1, 3) .'.jpg') }}" alt="">
                        <div class="item-content">
                            <div class="main-content">
                                <div class="meta-category">
                                    <span>{{ $category->name }}</span>
                                </div>
                                <a href="{{ route('blog.post', $category->latestPost) }}"><h4>{{ $category->latestPost->title }}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">{{ $category->latestPost->author->name }}</a></li>
                                    <li><a href="#">{{ $category->latestPost->created_at->format('F j, Y') }}</a></li>
{{--                                    <li><a href="#">12 Comments</a></li>--}}
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- Banner Ends Here -->
