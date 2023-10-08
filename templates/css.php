<head>
<link href="https://languages.abranhe.com/logos.css" rel="stylesheet">
    <!-- /* css for the navbar */ -->
    <style>
        * {
            margin: 0 ;
            padding: 0;
            box-sizing: border-box !important;
        }

        body {
            font-family: "Roboto", sans-serif !important;
        }

        .header-area {
            background-color: #142440 !important;
            display: flex;
            justify-content: space-between;
            position: static !important;
            width: 100% !important;
            padding: 0px 30px !important;
            z-index: 999 !important;
            border-bottom: #909090ad !important;
            max-height: 80px !important;
        }

        .header-container {
            width: 100% !important;
            margin: auto !important;
            display: table !important;
        }

        .site-logo {
            float: left !important;
            padding: 17px 0px !important;
        }

        .site-logo a {
            color: aliceblue !important;
            text-decoration: none !important;
            font-size: 24px !important;
            font-weight: bold !important;
            padding: 15px !important;
        }

        .site-logo span {
            color: blue !important;
        }

        .mobile-nav {
            display: none !important;
        }

        .site-nav-menu {
            float: right !important;
        }

        .primary-menu {
            list-style: none !important;
        }

        .primary-menu>li {
            display: inline-block !important;
            margin: 21px 5px !important;
        }

        .primary-menu>li>a {
            /* color: antiquewhite !important; */
            color: aliceblue !important;
            position: relative !important;
            text-decoration: none !important;
            font-weight: 500 !important;
            text-transform: uppercase !important;
            font-size: 15px !important;
            letter-spacing: 1px !important;
            padding: 5px 5px !important;
            transition: 0.5s !important;
        }

        .primary-menu>li>a:hover,
        .primary-menu>li>.active {
            color: blue !important;
        }

        .primary-menu>li>a:after {
            content: "" !important;
            position: absolute !important;
            width: 0% !important;
            height: 2px !important;
            background: blue !important;
            bottom: 0 !important;
            left: 0 !important;
            transition: all 0.5s !important;
        }

        .primary-menu li a:hover:after {
            width: 100% !important;
        }

        .primary-menu li .active:after {
            width: 100% !important;
        }

        .mobile-nav {
            float: right !important;
            margin: 10px !important;
            padding: 10px !important;
            cursor: pointer !important;
            font-size: 24px !important;
            outline: none !important;
            color: whitesmoke !important;
        }

        @media only screen and (max-width: 955px) {
            .site-nav-menu {
                float: none !important;
                position: absolute !important;
                background: #142440 !important;
                width: 100% !important;
                left: 0 !important;
                top: 76px !important;
                padding: 30px 0px 150px 0px !important;
                border-top: 1px solid #4a4848 !important;
                clip-path: circle(0% at 100% 0%) !important;
                transition: all 0.8s !important;
                z-index: 2;
            }

            .primary-menu li {
                display: block !important;
                text-align: center !important;
                margin: 25px 5px !important;
            }

            .mobile-nav {
                display: block !important;
            }

            .mobile-menu {
                clip-path: circle(112% at 100% 0%) !important;
            }

            .primary-menu li a::after {
                display: none !important;
            }
        }
    </style>
    <!-- /* css for the card-container and the cards */ -->
    <style>
        .card-container {
            display: flex !important;
            flex-wrap: wrap !important;
            justify-content: space-evenly !important;
            padding: 20px 30px !important;
            width: 100% !important;
            position: relative !important;
        }

        .card-item {
            max-width: 41%;
            /* padding: 30px !important; */
            font-size: 13px;
            border-radius: 15px;
            /*margin: 20px 10px !important;*/
            backdrop-filter: blur(10px) !important;
            background-color: rgba(33, 33, 78, 0.1) !important;
            box-shadow: 0px 0px 20px rgba(19, 2, 255, 0.438) !important;
            border-top: 1px solid rgba(21, 4, 255, 0.575) !important;
            border-left: 1px solid rgba(17, 1, 255, 0.568) !important;
            backdrop-filter: blur(5px) !important;
        }

        .text-blue {
            color: blue;
        }

        .card-container .icon {
            width: 70px !important;
            border-radius: 15px;
            margin-right: 10px !important;
        }

        .card-text {
            color: #ff548d !important;
            margin-top: 10px !important;
        }

        @media (max-width: 800px) {
            .card-item {
                min-width: 80% !important;
            }
        }
    </style>
    <!-- /* css for the footer areas */ -->
    <style>
        .footer-area {
            /* first two css is used with the think that it will be at the bottom of the page if creates any issue then remove it
            position: absolute;
            bottom: 0; */
            color: aliceblue !important;
            background-color: #142440 !important;
            width: 100% !important;
            padding: 10px 30px !important;
            z-index: 999 !important;
            border-bottom: #909090ad !important;
            display: flex !important;
            justify-content: center !important;
            color: white !important;
            font-size: 15px !important;
        }

        .footer-logo {
            color: aliceblue !important;
            font-weight: bolder !important;
            padding: 0 5px !important;
        }

        .footer-logo span {
            color: blue !important;
        }
    </style>
    <!--/* css for the buttons */ -->
    <style>
        .styleBtn {
            text-decoration: none;
            font-size: 14px;
            outline: none;
            color: #f2f2f2;
            font-weight: 500;
            border-radius: 12px;
            padding: 6px 15px !important;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease-in-out;
        }

        .styleBtn-pink {
            background-image: linear-gradient(135deg, #ff9a9e 10%, #F6416C 100%);
        }

        .styleBtn-black {
            background-image: linear-gradient(135deg, #574f4f 10%, #2e2829 100%);
        }

        .styleBtn-pink:hover {
            background-image: linear-gradient(135deg, #F6416C 10%, #ff9a9e 100%);
        }

        .styleBtn-black:hover {
            background-image: linear-gradient(135deg, #2e2829 10%, #574f4f 100%);
        }
    </style>
    <!-- css for the thread container and user_profile-->
    <style>
        .user_profile {
            padding: 3px 10px 3px 10px;
            color: white;
            font-weight: bolder;
            border-radius: 48%;
            background-image: linear-gradient(135deg, #040280 20%, #0e12f3 100%);
            max-width: 400px;
        }

        .user_profile:hover{
            background-image: linear-gradient(135deg, #0e12f3 20%,  #040280 80%);
        }
        .thread-item {
            font-size: 13px;
            width: 60%;
            border-radius: 15px;
            /*margin: 20px 10px !important;*/
            backdrop-filter: blur(10px) !important;
            background-color: rgba(33, 33, 78, 0.1) !important;
            box-shadow: 0px 0px 20px rgba(19, 2, 255, 0.438) !important;
            border-top: 1px solid rgba(21, 4, 255, 0.575) !important;
            border-left: 1px solid rgba(17, 1, 255, 0.568) !important;
            backdrop-filter: blur(5px) !important;
        }
    </style>
    <!-- css for verticle line -->
    <style>
        .vertical-line {
            border-left: 1px solid #686666;
            display: inline;
        }
    </style>
    <!-- /* Style the form container */ -->
    <style>
        .search-form{
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .search {
            background-color: white;
            border-radius: 10px;
            padding: 0px 10px 0px 10px;
            max-width: 250px;
        }

        /* Style the search input */
        .searchinput {
            padding: 5px 0px;
            color: rgba(0, 25, 247, 0.815);
            font-size: 14px;
            width: 140px;
            border: 0px;
            outline: none;
            border-radius: 10px;
        }

        /* Style the search button */
        #searchicon {
            cursor: pointer;
            border: 0px;
            background-color: white;
            padding-left: 10px;
            align-items: center;
        }

        /* Hover effect for the search button */
        #searchicon:hover {
            color: #1b03f3;
        }
    </style>
    <!-- css for contest-card -->
    <style>
        .contest-card{
            flex: 1 1 350px;
            border-radius: 15px;
            /*margin: 20px 10px !important;*/
            backdrop-filter: blur(10px) !important;
            background-color: rgba(33, 33, 78, 0.1) !important;
            box-shadow: 0px 0px 20px rgba(19, 2, 255, 0.438) !important;
            border-top: 1px solid rgba(21, 4, 255, 0.575) !important;
            border-left: 1px solid rgba(17, 1, 255, 0.568) !important;
            backdrop-filter: blur(5px) !important;
        }
        .contest-img{
            width: 100%;
            height: 150px;
            border-radius: 20px;
        }
    </style>
</head>