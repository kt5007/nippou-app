<header>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-expand-sm fixed-top" style="background-color:#28a745">
        <div class="container-fluid ">
            <a class="navbar-brand" href="{{ route('articles.index') }}">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav mr-auto">
                    <a class="nav-item nav-link active" href="/motivation">Motivation Graph</a>
                    <a class="nav-item nav-link active" href="{{ route('user.index') }}">Profile</a>
                </div>
                <div class="navbar-nav">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="">
                    <a class="navbar-brand" href="{{ route('logout') }}">Logout</a>
                    @csrf
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
