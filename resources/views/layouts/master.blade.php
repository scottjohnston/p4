<!DOCTYPE html>
<html>
  {{-- 'Project 4 Scott Johnston dwa15-' --}}

   <head>
      <meta charset="utf-8"/>

      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
      {{-- 'Css tweak for the size of the text box' --}}
      <link rel="stylesheet" type="text/css" href="css/scottsCss.css">


      <title>
         {{-- 'title of the site' --}}
         @yield('title','Holiday something')
      </title>


   </head>
   <body>
      <div class="container" >
         <header class="jumbotron">
            {{-- 'title for the jumbotron' --}}
            <h1>@yield('title','P4 this will change')<br><small>Scott Johnston</small></h1>
         </header>
         {{-- 'Navigation for the site collapses for small devices' --}}
         <div class="row">
            <div class="center-block ">
               <nav class="navbar navbar-default" >
                  <div class="navbar-header">


                     {{-- button for collapse-able bar --}}
                     <button type="button" class="navbar-toggle " data-toggle="collapse" data-tog="tooltip" title="Links" data-target="#navbar-collapse">
                     <span class="sr-only">Toggle navigation</span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     </button>
                  </div>


                  {{-- main nav links --}}
                  <div class="collapse navbar-collapse" id="navbar-collapse">
                     <ul class="list-inline nav nav-tabs nav-justified ">
                         @if(Auth::check())
                           <li><a href="/holiday/create" data-tog="tooltip" title="create holiday">Create holiday</a></li>

                           <li><a href="/logout" data-tog="tooltip" title="Logout">Log out {{ $user->name }}</a></li>
                        @else
                           <li><a href="/holiday/create" data-tog="tooltip" title="create holiday">Create holiday for testing</a></li>
                           <li><a href="/" data-tog="tooltip" title="log in">Log in</a></li>
                           <li><a href="/register" data-tog="tooltip" title="register">register</a></li>
                        @endif
                     </ul>
                  </div>
               </nav>
            </div>
         </div>


               {{-- Main page content will be yielded here --}}
               @yield('content')

      </div>


      <footer class="text-center">
         <a href="http://dwa15.com/" data-tog="tooltip" title="Course web site">dwa 15</a>
         <a href="http://p1.scottvjohnston.me/" data-tog="tooltip" title="Project ">Project 1</a>
         <a href="http://p2.scottvjohnston.me/" data-tog="tooltip" title="Project 2">Project 2</a>
         <a href="http://p3.scottvjohnston.me/" data-tog="tooltip" title="Project 3">Project 3</a>
         <a href="https://github.com/scottjohnston/p3" data-tog="tooltip" title="github P3">github P3</a>
         <a href="http://p3.scottvjohnston.me/" data-tog="tooltip" title="Project ">Project 4</a>
         <a href="https://github.com/scottjohnston/p4" data-tog="tooltip" title="github P4">github P4</a>
      </footer>


      {{-- Jquery for the tool tip --}}

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
      <script>
         $(document).ready(function(){
             $('[data-tog="tooltip"]').tooltip();
         });
      </script>


   </body>
</html>
