<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
{{-- css link --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset("css/app.css")  }} " />
<link rel="stylesheet" href="{{ asset("css/dachbord/app.css")  }} " />
<link rel="stylesheet" href="{{ asset("css/filepond.css")  }} " />
{{-- <link rel="stylesheet" href="{{ asset("css/fontawsom.css")  }} " /> --}}
<link rel="stylesheet" href="{{ asset("css/style.css")  }} " />
<title>Document</title>
@livewireStyles
</head>
<body>
<header>

@yield("welcompag")


    {{-- end of project --}}

    {{-- js linke --}}
    @livewireScripts
    <!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.6.0/mdb.min.js"
></script>
    {{-- <script  type="text/javascript" src=" {{ asset("js/app.js") }}"></script> --}}
    <script  type="text/javascript" src=" {{ asset("js/admin/app.js") }}"></script>
    <script  type="text/javascript" src=" {{ asset("js/alpine.js") }}"></script>
  
{{-- 
    <script defer type="text/javascript" src=" {{ asset("js/fontawsom.js") }}"></script> --}}

</body>
</html>