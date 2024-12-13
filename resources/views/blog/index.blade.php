@extends('blog.components.layout')

@section('content')
    <div class="col-lg-8">
        <div class="all-blog-posts">
            <div class="row">
                @foreach($posts as $post)
                    <div class="col-lg-12">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <img src="{{ asset('images/blog-post-01.jpg') }}" alt="">
                            </div>
                            <div class="down-content">
                                <span>Lifestyle</span>
                                <a href="{{ route('blog.post', $post) }}"><h4>{{ $post->title }}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">{{ $post->author->name }}</a></li>
                                    <li><a href="#">{{ $post->created_at->format('F j, Y') }}</a></li>
{{--                                    <li><a href="#">12 Comments</a></li>--}}
                                </ul>

                                {!! Str::limit(strip_tags($post->content), 150, '...') !!}

                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-6">
{{--                                            <ul class="post-tags">--}}
{{--                                                <li><i class="fa fa-tags"></i></li>--}}
{{--                                                <li><a href="#">Beauty</a>,</li>--}}
{{--                                                <li><a href="#">Nature</a></li>--}}
{{--                                            </ul>--}}
                                        </div>
                                        <div class="col-6">
                                            <ul class="post-share">
                                                <li><i class="fa fa-share-alt"></i></li>
                                                <li><a href="#">Facebook</a>,</li>
                                                <li><a href="#"> Twitter</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="main-button">
                        <a href="{{ route('blog.index', ['all' => true]) }}">View All Posts</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

