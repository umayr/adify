<!doctype html>
<html lang="en" ng-app="adify">
    <head>
        <meta charset="UTF-8">
        <title>Adify</title>
        {{ HTML::style('packages/bootstrap/dist/css/bootstrap.css'); }}
        {{ HTML::style('packages/font-awesome/css/font-awesome.css'); }}
        {{ HTML::style('styles/css/bootstrap-flatly.css'); }}
        {{ HTML::style('styles/css/extra.css'); }}
        {{ HTML::style('styles/css/app.css'); }}
    </head>
    <body>

        @include('layout.top')
        @include('layout.side')
        <div class="content-wrap container">
            @yield('content')
        </div>

        {{ HTML::script('packages/jquery/dist/jquery.js'); }}
        {{ HTML::script('packages/bootstrap/dist/js/bootstrap.js'); }}
        {{ HTML::script('packages/angular/angular.js'); }}
        {{ HTML::script('packages/moment/moment.js'); }}


        {{ HTML::script('scripts/app.js'); }}
        {{ HTML::script('scripts/constants.js'); }}
        {{ HTML::script('scripts/filters.js'); }}
        {{ HTML::script('scripts/directives.js'); }}

        {{ HTML::script('scripts/controllers/ad.js'); }}

        {{ HTML::script('scripts/services/api.js'); }}
    </body>
</html>