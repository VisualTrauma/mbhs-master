
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{URL::to('css/theme-default.css')}}"/>
        <!-- EOF CSS INCLUDE -->                                     
    </head>
    <body>
        
        <div class="login-container login-v2">
            
            <div class="login-box animated fadeInDown">
                <div class="login-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-4">
                        <img src="{{URL::to('assets/img/mbhs_logo.jpg')}}" alt="MBHS LOGO">
                    </div>
                </div>
                <br>
                    <div class="login-title"><strong>Welcome</strong>, Please login.</div>
                    <form action="{{URL::to('login')}}" class="form-horizontal" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-user"></span>
                                </div>
                                <input type="text" class="form-control" placeholder="Username" name="username"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <span class="fa fa-lock"></span>
                                </div>                                
                                <input type="password" class="form-control" placeholder="Password" name="password"/>
                            </div>
                        </div>
                    </div> <br>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 Muntinlupa Business High School
                    </div>
                    <div class="pull-right">
                        <a href="#">Contact Developer</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </body>
</html>






