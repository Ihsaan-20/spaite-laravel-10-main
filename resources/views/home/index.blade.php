<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <header>
            <!-- place navbar here -->
        </header>
        <main>
            <a href="">{{ Auth::user()->name }}</a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf <!-- This generates a CSRF token for security -->
                <button type="submit" style="background: none; border: none; color: blue; text-decoration: underline; cursor: pointer;">Logout</button>
            </form>
            

            {{-- @if (auth()->user()->hasAnyPermission(['all.post','edit.post', 'update.post', 'delete.post']))
                <div class="mb-3">
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn btn-success">Update</a>
                    <a href="#" class="btn btn-info">Read</a>
                    <a href="#" class="btn btn-dark">All</a>
                </div>
            @elseif (auth()->user()->hasAnyPermission(['all.post','edit.post', 'update.post']))
                <div class="mb-3">
                    <a href="#" class="btn btn-primary">Edit</a>
                    <a href="#" class="btn btn-danger">Delete</a>
                    <a href="#" class="btn btn-success">Update</a>
                    <a href="#" class="btn btn-info">Read</a>
                    <a href="#" class="btn btn-dark">All</a>
                </div>
            @else
                <!-- Show a message or alternative content for users who don't have the required permissions -->
                <p>You do not have permission to view this content.</p>
            @endcan --}}

            <div class="mb-3">
                @can('edit.post')
                    <a href="#" class="btn btn-primary">Edit</a>
                @endcan
            
                @can('delete.post')
                    <a href="#" class="btn btn-danger">Delete</a>
                @endcan
            
                @can('update.post')
                    <a href="#" class="btn btn-success">Update</a>
                @endcan
            
                @can('read.post')
                    <a href="#" class="btn btn-info">Read</a>
                @endcan
            
                @can('all.post')
                    <a href="#" class="btn btn-dark">All</a>
                @endcan
            </div>
            

        </main>
        
        
        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
