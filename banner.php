<?php
function banner( $title, $script )
{
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $title;?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <script src="jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <script src="siteutil.js"></script>
    <script src="<?php echo $script;?>"></script>
    <style>
    #waiting
    {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    #mainBodyDown
    {
        padding-left: 30px;
        padding-top: 15px;
    }

    a.card-link
    {
        color: white;
        text-decoration: underline;
    }

    a.card-link:visited
    {
        color: black;
        text-decoration: underline;    
    }

    a.card-link:hover
    {
        color: gray;
        text-decoration: underline;
    }

    .card-deck
    {
        width: 100%;
        margin-bottom: 5px !important;
    }

    .card
    {
        margin-left: 5px !important;
        margin-right: 5px !important;
        display: inline-block;
    }
    </style>
</head>
<body>
<div id="mainBody">
<?php
}

function footer()
{
?>
</div>
</body>
</html>
<?php
}
