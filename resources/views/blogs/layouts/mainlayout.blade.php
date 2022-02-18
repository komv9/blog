<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
    @include('blogs.layouts.partials.stylesheet')//include stylesheet file
    @yield('styles') // for page specific stylesheet
</head>

<body>

@include('blogs.layouts.partials.script') // include script file
@include('blogs.layouts.partials.header') // include header file

@yield('content') //content part of page

@include('blogs.layouts.partials.footer') // include footer file

@yield('scripts') // for page specific script
</body>
</html>