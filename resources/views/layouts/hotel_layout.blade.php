<html>
    <head>
        <title>@yield('title')</title>
        <style>
            body{
                font-size: 16pt;
                color: #999;
                margin: 5px;
            }
            h1{
                font-size: 60pt;
                text-align: right;
                color: #f3d5d5;
                margin: -20px 0px -30px 0px;
                letter-spacing: -4pt;
            }
            
            ul{
                    font-size: 12pt;
            }
            hr{
                margin: 25px 100px;
                border-top: 1px dashed #ddd;
            }
            .menutitle{
                font-size: 14pt;
                font-weight: bold;
                margin: 0px;
            }
            .content{
                margin: 10px;
            }
            .footer{
                text-align: right;
                font-size: 10pt;
                margin: 10px;
                border-bottom: solid 1px #ccc;
                color: #ccc;
            }

            th{
                background-color: #999;
                color:#fff;
                padding: 5px 10px;
            }
            td{
                border: solid 1px #aaa ;
                color:#999;
                padding: 5px 10px;
            }

            th.error_message{
                background-color: rgb(245, 104, 104);
                color: white;
            }
            td.error_message{;
                color: red;
            }
            tr.form_margin{
                margin-bottom: 50px;
            }
            .login_error{
                color: rgb(245, 104, 104);
                
            }

        </style>
    </head>
    <body>
        <h1>@yield('title')</h1>
        @section('menubar')
        <h2 class="menutitle"></h2>
            <h2>@show</h2>
            <h1>@show</h1>
        
        <hr size="1">
        <div class="content">
            <h2>@show</h2>
            @yield('content')

            <hr size="2">
        </div>

        <div class="content2">
            @yield('content2')
        </div>

        <div class="footer">
            @yield('footer')
        </div>
    </body>
</html>