<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()  }}">
    <title>Document</title>
    {{-- css link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset("css/app.css")  }} " />
    <link rel="stylesheet" href="{{ asset("css/dachbord/app.css")  }} " />
    {{-- <link rel="stylesheet" href="{{ asset("css/fontawsom.css")  }} " /> --}}
    <link rel="stylesheet" href="{{ asset("css/style.css")  }} " />
    <link rel="stylesheet" href="{{ asset("css/lrsidbar.css")  }} " />
    {{-- End css link --}}
    <script  type="text/javascript" src=" {{ asset("js/app.js") }}"></script>

    @livewireStyles

</head>
<body>
@yield("welcompag")





@livewireScripts

    {{-- end of project --}}

    {{-- js link --}}
    <script  type="text/javascript" src=" {{ asset("js/alpine.js") }}"></script>
    <script  type="text/javascript" src=" {{ asset("js/index.js") }}"></script>
    <script defer type="text/javascript" src=" {{ asset("js/admin/app.js") }}"></script>
    {{-- <script defer type="text/javascript" src=" {{ asset("js/fontawsom.js") }}"></script> --}}
    {{-- End js link --}}
 
</body>
</html>