<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
        <li @if(Request::is('managed/article*') == true)class="active"@endif>
            <a href="/managed/article">articles</a>
        </li>
        <li @if(Request::is('managed/inquiry*') == true)class="active"@endif>
            <a href="/managed/inquiry">inquirys</a>
        </li>
    </ul>
</div>