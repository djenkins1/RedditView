<?php
require_once "./config.php";
require_once "./reddit.php";
require_once "./banner.php";

/*
TODO:
    (DONE)expand limit on listing to 100 by passing limit parameter
    (DONE)maybe be able to show photos if available
    (DONE)Scrape for posts after a certain date for each subreddit given
    (DONE)use date input type to pass a specific date
    (DONE)prepend results onto page to get oldest to most recent
    (DONE)keep searching and passing along the after date every second
    (DONE)change link different color after it has been clicked
    (DONE)automatically set date picker to today's date when page is first loaded
    (DONE)uneven number of cards should have dummy cards prepended before(ONLY AFTER ALL CARDS)
    (DONE)Change to progress bar instead of waiting,rest to zero percent and do not show when done
    (DONE)Update progress bar by 5 percent on start of reach equest and 5 percent on end of each request
    TODO: Smoother animations of progress bars,setTimeout for 500 ms and update progress bar by 1 percent
        how to chain the requests so that the setTimeout does not call again after 5 until ready?
        could give a final value for the setTimeout to stop at
    TODO: Final animation for finished progress,setTimeout for 200ms and update progress bar by 1 percent until full
    TODO: Quickview: wait for input on which subreddit before actually searching
    TODO: Postview: need to search through each reddit post as well in order to keep track of those commenters
    TODO: BOTH: move over completely to only javascript/css/html no php
    TODO: Do something about dummy posts,hide them at end of page and swap items around periodically
    TODO: be able to add subreddits to favorites
        maybe use cookies to keep track between times
    TODO: error handling,nonexistent subreddits?
    (CANCEL)maybe keep track of last time the subreddit was searched by the program
        automatically switch the date picker to this when subreddit is selected(but not searched)



    To page through a listing, 
    start by fetching the first page without specifying values for after and count. 
    The response will contain an after value which you can pass in the next request. 
    It is a good idea, but not required, to send an updated value for count which should be the number of items already fetched.
    after / before - only one should be specified. these indicate the fullname of an item in the listing to use as the anchor point of the slice.
*/

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

//$userAgent = 'QuickViewer/0.1 by starfoxius';
//https://djenkins1.github.io/
//$redirectUrl = "https://localhost:8080/Site/index.php";

