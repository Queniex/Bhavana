        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>Collapsible sidebar using Bootstrap 3</title>
        
        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        {{-- Remixion --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.5.0/remixicon.css">
        <!-- Custom CSS -->
        <style>
            @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

            /* *{
                border: 1px solid red;
            } */

            body {
                font-family: 'Poppins', sans-serif;
                background-image: url('images/system/bhavana-foto2.png'); 
                background-size: cover;
                background-repeat: no-repeat; 
                background-attachment: fixed; 
            }

            p {
                font-family: 'Poppins', sans-serif;
                font-size: 1.1em;
                font-weight: 300;
                line-height: 1.7em;
                color: #999;
            }

            a, a:hover, a:focus {
                color: inherit;
                text-decoration: none;
                transition: all 0.3s;
            }

            .navbar {
                padding: 15px 10px;
                background: white;
                width: 20%;
                border: none;
                border-radius: 0;
                margin-bottom: 40px;
                box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
            }

            .toolbar-btn{
                margin: 0px 1.2rem;
            }

            .navbar-btn {
                box-shadow: none;
                outline: none !important;
                border: none;
            }

            .line {
                width: 100%;
                height: 1px;
                border-bottom: 1px dashed #ddd;
                margin: 40px 0;
            }

            /* ---------------------------------------------------
                SIDEBAR STYLE
            ----------------------------------------------------- */
            .wrapper {
                display: flex;
                align-items: stretch;
            }

            a.router-link-exact-active {
                color: black;
                background: #FFDD63;
                border-radius: 15px;
            }

            .c1{
                color:#e6bd2b;
            }

            #sidebar {
                min-width: 250px;
                max-width: 250px;
                background: white;
                color: black;
                transition: all 0.3s;
            }

            #sidebar.active {
                margin-left: -250px;
            }

            #sidebar .sidebar-header {
                text-align: center;
                background: rgba(255, 252, 252, 0.637);
                padding-top: 2rem;
            }

            #sidebar .sidebar-header .header-text {
                font-weight: 800; 
            }

            #sidebar ul.components {
                padding: 10px 0;
                border-bottom: 1px solid #e6bd2b;
                margin-left: 10px;
                margin-right: 10px;
            }

            #sidebar ul p {
                color: black;
                padding: 10px;
                font-weight: 400;
            }

            #sidebar ul li a {
                padding: 10px;
                font-size: 1.1em;
                display: block;
            }
            
            #sidebar ul li a:hover {
                color: #e6bd2b;
                background: white;
            }

            /* #sidebar ul li.active > a, a[aria-expanded="true"] {
                color: black;
                background: #FFDD63;
                border-radius: 15px;
            } */

            a[data-toggle="collapse"] {
                position: relative;
            }

            a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
                content: '\e259';
                display: block;
                position: absolute;
                right: 20px;
                font-family: 'Glyphicons Halflings';
                font-size: 0.6em;
            }
            a[aria-expanded="true"]::before {
                content: '\e260';
            }

            ul ul a {
                font-size: 0.9em !important;
                padding-left: 30px !important;
                background: white;
                font-weight: 400;
            }

            ul.CTAs {
                padding: 20px;
            }

            ul.CTAs a {
                text-align: center;
                font-size: 0.9em !important;
                display: block;
                border-radius: 5px;
                margin-bottom: 5px;
            }

            a.download {
                background: #FFDD63;
                color: black;
            }

            .download:hover{
                font-weight: 600;
                color:black !important;
            }

            a.article, a.article:hover {
                background: #FFDD63 !important;
                color: black !important;
            }

            /* ---------------------------------------------------
                CONTENT STYLE
            ----------------------------------------------------- */
            #content {
                padding: 20px;
                min-height: 100vh;
                transition: all 0.3s;
            }

            /* ---------------------------------------------------
                MEDIAQUERIES
            ----------------------------------------------------- */
            @media (max-width: 768px) {
                #sidebar {
                    margin-left: -250px;
                }
                #sidebar.active {
                    margin-left: 0;
                }
                #sidebarCollapse span {
                    display: none;
                }
            }


        </style>
        
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">    
        
