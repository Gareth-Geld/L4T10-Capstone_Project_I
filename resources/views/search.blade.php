<!DOCTYPE html>
<!-- This is the Search page
works in two parts if the Query is not set then the search from displays that links the post Route which gets the query and sends it back to this page
If the Query is set it displays the appropriate posts depending on what was searched-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Search Page</title>
</head>
<body class="bodyBack">
@include('cookie-notice')
    <div class="banner">
        <p class="mainHeading">Search</p>
        <div class="spacer"></div>
        <div class="custom-shape-divider-bottom-1693563954">
        <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
            <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
            <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
            <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
        </svg>
        </div>
    </div>
    <!-- Displaying appropriate posts if their are any -->
    @if(isset($query) && count($query) > 0)
<div class="row">
    @php
        $count = 0;
    @endphp
    @foreach($query as $post)
        <div class="col">
            <a href="{{ url('/article', $post->ARTICLE_ID) }}"><p class="postHeading">{{ $post->TITLE }}</p></a>
            <p class="postContent">{{ substr($post->CONTENT, 0, 200) }}...</p>
            <p class="postDetails">Date : {{ $post->DATE_CREATED }} ||

            {{-- Display the category associated with the article --}}
            @foreach ($categories as $category)
                @if ($category->CATEGORY_ID === $post->CATEGORY_ID)
                    Category : <a href="{{ url('/category', $category->CATEGORY) }}">{{ $category->CATEGORY }}</a> ||
                @endif
            @endforeach

            {{-- Display the tags associated with the article --}}
            @foreach ($articleTags as $Atag)
                @if ($post->ARTICLE_ID === $Atag->ARTICLE_ID)
                    @foreach ($tag as $taggy)
                        @if($Atag->TAG_ID === $taggy->TAG_ID)
                            Tag : <a href="{{ url('/tag', $taggy->TAG) }}">{{ $taggy->TAG }}</a> ||
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>
        @php
            $count++;
            if ($count % 2 === 0) {
                echo '</div><div class="row">';
            }
        @endphp
    @endforeach
</div>
    @else
    <!-- This is the search form points to Route -->
    <div class="spacer"></div>
    <div class="searchBlock">
        <p class="searchHeading">Search for what you know :</p>
        <form action="{{ route('search') }}" method="POST">
        @csrf 
            <label for="title" class="searchLabel">TITLE :</label>
            <input type="text" class="inputBox" placeholder="Title.." name="title">
            <label class="searchLabel" for="tag" class="searchLabel">CATEGORY :</label>
            <select class="inputBox" id="Category" name="Category">
            <option value="null"></option>
                @foreach($categories as $Category)
            <option value="{{$Category->CATEGORY_ID}}">{{$Category->CATEGORY}}</option>
                @endforeach
            </select>
            <label class="searchLabel" for="tag" class="searchLabel">TAG :</label>
            <select class="inputBox" id="tag" name="tag">
            <option value="null"></option>
            @foreach($tag as $tag)
            <option value="{{$tag->TAG_ID}}">{{$tag->TAG}}</option>
            @endforeach
            </select>
            <input class="searchBTN" type="submit" value="SEARCH">
        </form>
    </div>
    @endif
    @include('footer')
</body>
</html>