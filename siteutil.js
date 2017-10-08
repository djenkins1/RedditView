var currentSubreddit = "Yogscast";

var progressUpdatedTimes = 0;
var canUpdateProgress = true;

function requestSubreddit( subredditName, afterParam )
{
    currentSubreddit = subredditName;
    var paramObj = { "limit" : 100 };
    if ( afterParam != undefined )
    {
        paramObj[ "after" ] = afterParam;
    }

    updateProgress();
    var urlGet =  "https://www.reddit.com/r/" + encodeURIComponent( subredditName ) + "/new/.json" 
    $.get( urlGet, paramObj, handleSubreddit );
}

function hideProgress()
{
    $( "#waiting" ).css( "display" , "none" );
    setProgress( 0 );
}

function finishProgress()
{
    animateIncrementProgress( 105, hideProgress, 80 );
}

function setProgress( val )
{
    progressUpdatedTimes = 0;
    canUpdateProgress = false;
    $( '#waiting .progress-bar' ).each( function()
    {
        $( this ).css( 'width', val + '%' ).attr( 'aria-valuenow', val ); 
    }
    );
}

function animateIncrementProgress( maxValue, onFinish, time )
{
    if ( !canUpdateProgress )
    {
        return;
    }

    $( '#waiting .progress-bar' ).each( function()
    {
        var newVal = parseInt( $( this ).attr( 'aria-valuenow' ) ) + 1;
        if ( newVal <= maxValue )
        {
            $( this ).css( 'width', newVal + '%' ).attr( 'aria-valuenow', newVal ); 
            setTimeout( function() { animateIncrementProgress( maxValue, onFinish, time ) } , time );
        }
        else
        {
            onFinish();
        }
    }
    );
}

function updateProgress()
{
    if ( !canUpdateProgress )
    {
        return;
    }
    progressUpdatedTimes += 1;    
    var maxValue = progressUpdatedTimes * 5;
    animateIncrementProgress( maxValue, function() { }, 750 );
}

function searchSubreddit( subredditName, ignoreWaiting, afterParam )
{
    if ( !ignoreWaiting && $( "#waiting" ).css( "display" ) != "none" )
    {
        return;
    }

    setProgress( 0 );
    canUpdateProgress = true;
    $( "#waiting" ).css( "display" , "flex" );
    clearBody( "#mainBodyDown" );
    requestSubreddit( subredditName, afterParam );
}

function clearBody( ofObj )
{
    $( ofObj ).html( "" );
}

function searchSubredditByClick()
{
    searchSubreddit( $( this ).text(), false );
}

function searchSubredditByForm()
{
    searchSubreddit( $( "#redditSearch" ).val(), false );
}

function shufflePeriods()
{
    if ( $( "#waiting" ).css( "display" ) == "none" )
    {
        return;
    }

    $( "#waiting" ).text( $( "#waiting" ).text() + "." );
}

function rightClickLink()
{
    $( this ).css( "color" , "black" );
    $( this ).css( "opacity" , "0.25" );
}

//convert the date to a unix timestamp and return said timestamp
function convertDateToTime( dateStr )
{
    var dateObj = new Date( dateStr );
    //have to divide by 1000 because getTime returns milliseconds not seconds
    return Math.floor( dateObj.getTime() / 1000 );
}

// returns string of the current date formatted like so: M/D/YYYY
// ex: 5/16/2015
function getFormatCurrentDate()
{
    var d = new Date();
    return ( d.getMonth() + 1 ) + "/" + d.getDate() + "/" + d.getFullYear();
}

function handleSubreddit( data, status )
{
    if ( status != "success" )
    {
        console.log( status );
        return;
    }

    console.log( data );
    //var responseObjAll = JSON.parse( data );
    var responseObjAll = data;
    //var responseObj = responseObjAll.body.data.children;
    var responseObj = responseObjAll.data.children;
    updateProgress();
    //outputSubreddit( responseObj,responseObjAll.body.data.after );
    outputSubreddit( responseObj,responseObjAll.data.after );
}


