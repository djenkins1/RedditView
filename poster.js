//
//DO NOT INCLUDE MAIN.JS ALONGSIDE THIS SCRIPT FILE

var posterDict = {};

function showPosterResults( allPosterDict )
{
    //add an <ol> element to the page
    var myGroup = $( "<ol />" );
    myGroup.addClass( "list-group" );
    $( "#mainBodyDown" ).append( myGroup );

    //stop showing the waiting text
    $( "#waiting" ).css( "display" , "none" );
    setProgress( 0 );

    //put each of the key value pairs of allPosterDict into an array of tuples
    var keyValues = [];
    for ( var key in allPosterDict ) 
    {
        keyValues.push( [ key, allPosterDict[key] ] );
    }

    //sort the key value pairs
    keyValues.sort( function compare(kv1, kv2) 
    {
        // This comparison function has 3 return cases:
        // - Negative number: kv1 should be placed BEFORE kv2
        // - Positive number: kv1 should be placed AFTER kv2
        // - Zero: they are equal, any order is ok between these 2 items
        return kv1[1] - kv2[1];
    });

    //go through the list backwards since it is sorted and we want the people who have posted the most
    for ( var i = keyValues.length - 1; i >= 0; i-- )
    {
        //stop when the top 10 posters have been displayed
        if ( i < keyValues.length - 11 )
        {
            break;
        }
        var currentValuePair = keyValues[ i ];
        var myItem = $( "<li />" );
        myItem.addClass( "list-group-item" );
        myItem.text( currentValuePair[ 0 ] + " : " + currentValuePair[ 1 ] );
        $( myGroup ).append( myItem ); 
    }
}

function outputSubreddit( responseObj, afterParam )
{
    //if the number of posts in the responseObj is zero,then return and stop searching
    if ( responseObj.length == 0 )
    {
        console.log( "STOPPED LENGTH" );
        showPosterResults( posterDict );
        return;
    }

    if ( afterParam == undefined )
    {
        console.log( "STOPPED AFTER" );
        showPosterResults( posterDict );
        return;
    }

    for ( i = 0; i < responseObj.length; i++ )
    {
        var myData = responseObj[ i ].data;
        if ( posterDict[ myData.author ] == undefined )
        {
            posterDict[ myData.author ] = 0;
        }
        posterDict[ myData.author ]++;
    }
    console.log( afterParam );
    setTimeout( function() { requestSubreddit( currentSubreddit, afterParam ) }, 1000 );
}

$( document ).ready( function()
{
    $( "#waiting" ).css( "display" , "none" );
    $( "#mainBodyDown" ).html( "Select or search for a subreddit to begin." );
    $( "button.redditSelect" ).on( "click" , searchSubredditByClick );
    $( "#searchButton" ).on( "click" , searchSubredditByForm );
});


