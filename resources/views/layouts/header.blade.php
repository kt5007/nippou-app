<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-expand-sm fixed-top" style="background-color:#28a745">
        <div class="container-fluid ">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="{{ route('articles.index') }}">Articles</a>
                    <a class="nav-item nav-link active" href="/motivation">Motivation Graph</a>
                    <a class="nav-item nav-link active" href="{{ route('user.index') }}">Profile</a>
                </div>

                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>

            </div>
        </div>
    </nav>
</header>
