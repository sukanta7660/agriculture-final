<div class="navbar navbar-inverse navbar-fixed-top header-highlight">
    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="{{asset('public/assets/images/logo_light.png')}}" alt=""></a>
    </div>
    <ul class="nav navbar-nav"><h4 class="m-0 text-center">{{session('projectName')}}</h4></ul>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="{{action('ProjectsController@index')}}"><i class="icon-arrow-left16"></i> Back</a></li>
    </ul>
</div>