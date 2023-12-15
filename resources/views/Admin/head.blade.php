    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    {{-- Remixion --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
    {{-- Chart --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    {{-- <link href="{{ mix('css/app.css') }}" rel="stylesheet"> --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Bhavana</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');

        *,
        ::after,
        ::before {
            box-sizing: border-box;
/* 
            border: 1px red solid; */
        }

        .user{
            margin-left: -25px;
        }

        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            background-image: url("https://i.postimg.cc/k4ZZV3Mx/bhavana-foto2.png");
            background-repeat: no-repeat;
            background-position: center bottom;
            background-size: cover; 
        }

        .active-link {
            color: black !important;
            background: #FFDD63;
            border-radius: 70px;   
            }

        h3 {
            font-size: 1.2375rem;
            color: #FFF;
        }

        a, router-link {
            cursor: pointer;
            text-decoration: none;
            font-family: 'Poppins', sans-serif;
        }

        li {
            list-style: none;
        }

        .colx {
            width: 100px;
        }

        .coly {
            width: 200px;
        }

        .row-card {
            width: 320px;
        }

        .row-card-wrap {
            width: 350px;
        }

        /* Layout skeleton */

        .wrapper {
            align-items: stretch;
            display: flex;
            width: 100%;
        }

        #sidebar {
            max-width: 264px;
            min-width: 264px;
            padding: 10px 10px;
            height: 100vh;
            transition: all 0.35s ease-in-out;
            box-shadow: 0 0 35px 0 rgba(49, 57, 66, 0.5);
            z-index: 1111;
            background: #ffffff;
        }

        /* Sidebar collapse */

        #sidebar.collapsed {
            margin-left: -264px;
        }

        h6{
            font-size: 12px;
        }

        .main {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            width: 100%;
            overflow: hidden;
            transition: all 0.35s ease-in-out;
        }

        .sidebar-logo {
            padding: 1.15rem 1.5rem;
            height: 100px;
            /* background: #F1F1F1; */
        }

        .sidebar-logo a {
            color: #e9ecef;
            font-size: 1.25rem;
            font-weight: 600;
        }

        .sidebar-nav {
            padding: 0;

        }

        .logout {
            margin: 5px 4rem;
            border: 1px solid black;    
            text-align: center;
            border-radius: 2rem;
            background: #E4A11B;
        }

        .logout:hover {
            background: white;
        }

        .sidebar-header {
            color: #e9ecef;
            font-size: .75rem;
            padding: 1.5rem 1.5rem .375rem;
        }

        router-link.sidebar-link, a.sidebar-link {
            padding: .625rem 1.625rem;
            color: #e9ecef;
            position: relative;
            display: block;
            font-size: 1rem;
        }

        .sidebar-link[data-bs-toggle="collapse"]::after {
            border: solid;
            border-width: 0 .075rem .075rem 0;
            content: "";
            display: inline-block;
            padding: 2px;
            position: absolute;
            right: 1.5rem;
            top: 1.4rem;
            transform: rotate(-135deg);
            transition: all .2s ease-out;
        }

        .sidebar-link[data-bs-toggle="collapse"].collapsed::after {
            transform: rotate(45deg);
            transition: all .2s ease-out;
        }

        .content {
            flex: 1;
            max-width: 100vw;
            width: 100vw;
        }

        /* Responsive */

        @media (min-width:768px) {
            .content {
                width: auto;
            }
        }
    </style>