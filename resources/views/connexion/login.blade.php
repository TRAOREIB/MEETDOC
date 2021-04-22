<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MeetDoc</title>

        <!-- Bootstrap -->
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--     Font Awesome -->
        <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!--     NProgress -->
        <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
        <!--     Animate.css -->
        <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

        <!--     Custom Theme Style -->
        <link href="../build/css/custom.min.css" rel="stylesheet">
    </head>

    <body class="login" style="background-image: url({{asset('images/sante.jpg')}}); background-repeat: no-repeat;background-size:1400px">

        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>
        <br><br>
        <div class="login_wrapper">
            <div class="animate form login_form">
               
                <div class="offset-5 col-sm-7 ">
                     <label style="color: white;font-style: italic" ><h1><b>MeetDoc</b></h1></label>
                </div>
                <div class="offset-4">
                      <label style="color: white; font-style: italic"><h1>Information de Connexion</h1></label>
                </div>
                <div class="col-sm-8 col-xs-8 offset-4">
                   
                  

                    <form class="form-horizontal" role="form" method="POST" action=" {{url('connect')}} " enctype="application/x-www-form-urlencoded">
                        {{ csrf_field() }}

                        <div>
                        <div class="col-sm-5 col-xs-12">
                            <input type="text" class="form-control" style="border-radius: 10px" name="login" id="login" placeholder="Identifiant" required="" />
                        </div><br>

                        <div class="col-sm-5 col-xs-12">
                            <input type="password" class="form-control" style="border-radius: 10px" name="password" id="password" placeholder="Mot de Passe" required="" />
                        </div><br>

                        <div class="offset-1" >
                            <input class=" col-sm-2 btn btn-primary" type="submit"  value="connexion">                 
                        </div>
                        
                        </div>

                    </form>

                    <br><br>

                    <div class="col-sm-10 col-xs-12">
                        <div class="change_link col-sm-4 " style="background-color: whitesmoke;border-radius: 10px">
                            <a href="{{url('inscription')}}" class="to_register" style="margin-left: 45px"><b> Créer un Compte </b></a>
                        </div> <br><br>
                        <div class="change_link col-sm-4" style="background-color: whitesmoke;border-radius: 10px">
                            <a href="{{url('inscription')}}" class="to_register" style="margin-left: 35px"><b> Mot de Passe oublié</b> </a> 
                        </div>
                    </div>

                </div> 
            </div>
        </div>
    </body>
</html>
