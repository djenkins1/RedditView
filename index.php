<?php
require_once "./banner.php";

banner( "Quickview" , "main.js" );

?>
<nav class="navbar sticky-top navbar-dark bg-primary justify-content-between navbar-expand-lg">
    <a class="navbar-brand">Quickview</a>
    <form class="form-inline">
        <input id="searchDate" class="form-control" style="margin-right: 10px;" type="date" size="8" value="10/3/2017">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Favorites
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item redditSelect" type="button">Yogscast</button>
            <button class="dropdown-item redditSelect" type="button">cscareerquestions</button>
            <button class="dropdown-item redditSelect" type="button">Something else here</button>
          </div>
        </div>
        <input id="redditSearch" class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
        <button id="searchButton" class="btn btn-dark my-2 my-sm-0" type="button">Search</button>
    </form>
</nav>
<div id="waiting" class="progress">
    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
</div>
<div id="mainBodyDown">
</div>
<?php

footer();


