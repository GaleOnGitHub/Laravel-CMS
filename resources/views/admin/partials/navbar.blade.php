<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CMS</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{ url('/') }}">Site</a></li>
                @if(!Auth::guest())
                    @if(Auth::user()->hasPermission('admin'))
                        <li role="presentation">
                            <a href="{{action('Admin\UsersController@index')}}">Users</a>
                        </li>
                    @endif
                    @if(Auth::user()->hasPermission('editor'))
                        <li role="presentation">
                            <a href="{{action('Admin\PagesController@index')}}">Pages</a>
                        </li>
                        <li role="presentation">
                            <a href="{{action('Admin\SectionsController@index')}}">Sections</a>
                        </li>
                        <li role="presentation">
                            <a href="{{action('Admin\ArticlesController@index')}}">Articles</a>
                        </li>
                        <li role="presentation">
                            <a href="{{action('Admin\StylesController@index')}}">Styles</a>
                        </li>
                    @endif
                @endif
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/auth/login') }}">Login</a></li>
                @else
                    <li><a>{{Auth::user()->getFullName()}}</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
