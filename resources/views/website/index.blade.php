<!DOCTYPE html>
<html>
<head>
    <title>{{$page->name}}</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">
    <style type="text/css">
        {{ $style->css }}
    </style>
</head>

<body>
    <header>
        <h1>{{$page->name}}</h1>
        <nav>
            <ul>
                @foreach($pages as $pg)
                    @if($pg->on_nav == 1)
                        <li>
                            <a href="{{action('WebsiteController@show',[$pg->slug])}}">{{$pg->name}}</a>
                        </li>
                    @endif
                @endforeach
                @if(Auth::guest())
                    <li><a href="/auth/login">Login</a></li>
                @else
                    <li><a href="/auth/logout">Logout</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <section>
        @foreach($sections as $section)
            @if($section->isOnPage($page->id)||$section->all_pages)
                <div id="{{$section->alias}}">
                    <h2>{{$section->header}}</h2>
                    @foreach($section->articles()->orderBy('created_at','desc')->get() as $article)
                        @if(!$article->archived)
                            {!! $article->html !!}
                            @if(Auth::check() && Auth::user()->hasPermission('author'))
                                <a href="{{action('WebsiteController@edit',['id'=>$article->id])}}" class="btn btn-default">Edit</a>
                            @endif
                        @endif
                    @endforeach
                </div>

            @endif
        @endforeach
    </section>
    @if(Auth::check() && Auth::user()->hasPermission('author'))
        <div class="control-panel">
            <a href="{{action('Admin\HomeController@index')}}">Control Panel</a>
            <a href="{{action('WebsiteController@create')}}">Create Article</a>
        </div>
    @endif
</body>
