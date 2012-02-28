<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!--
Copyright (c) 2012 Luis E. S. Dias - smartbyte.systems@gmail.com

Permission is hereby granted, free of charge, to any person obtaining
a copy of this software and associated documentation files (the
"Software"), to deal in the Software without restriction, including
without limitation the rights to use, copy, modify, merge, publish,
distribute, sublicense, and/or sell copies of the Software, and to
permit persons to whom the Software is furnished to do so, subject to
the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF
MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION
OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION
WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
-->
<head>
    <% base_tag %>
    <title>Booklet - Silverstripe module</title>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <script type="text/javascript" src="{$BaseHref}booklet/javascript/jquery-1.7.1.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
    <script type="text/javascript" src="{$BaseHref}booklet/javascript/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="{$BaseHref}booklet/javascript/jquery.booklet.1.2.0.js"></script>

    <link rel="stylesheet" href="{$BaseHref}booklet/css/jquery.booklet.1.2.0.css" type="text/css" media="screen" />

    <script type="text/javascript">

    $(function(){
	$("#mybook").booklet({
            <% if Name %>
                name:               '$Name',
            <% else %>
                name:               null,
            <% end_if %>
            width:              $Width,
            height:             $Height,
            speed:              $Speed,
            direction:          '$Direction',
            startingPage:       $StartingPage,
            easing:             '$Easing',
            easeIn:             '$EaseIn',
            easeOut:            '$EaseOut',

            closed:             $Closed,
            <% if ClosedFrontTitle %>
                closedFrontTitle:   '$ClosedFrontTitle',
            <% else %>
                closedFrontTitle:   null,
            <% end_if %>
            <% if ClosedFrontChapter %>
                closedFrontChapter: '$ClosedFrontChapter',
            <% else %>
                closedFrontChapter: null,
            <% end_if %>
            <% if ClosedBackTitle %>
                closedBackTitle:    '$ClosedBackTitle',
            <% else %>
                closedBackTitle: null,
            <% end_if %>
            <% if ClosedBackChapter %>
                closedBackChapter:  '$ClosedBackChapter',
            <% else %>
                closedBackChapter: null,
            <% end_if %>
            covers:             $Covers,
            autoCenter:         $AutoCenter,

            pagePadding:        $PagePadding,
            pageNumbers:        $PageNumbers,

            manual:             $Manual,

            hovers:             $Hovers,
            overlays:           $Overlays,
            tabs:               $Tabs,
            tabWidth:           $TabWidth,
            tabHeight:          $TabHeight,
            arrows:             $Arrows,
            arrowsHide:         $ArrowsHide,
            cursor:             '$Cursor',

            hash:               $Hash,
            keyboard:           $Keyboard,
            <% if Next %>
                next:               '$Next',
            <% else %>
                next:               null,
            <% end_if %>
            <% if Prev %>
                prev:               '$Prev',
            <% else %>
                prev:               null,
            <% end_if %>
            auto:               $Auto,
            delay:              $Delay,

            <% if Pause %>
                pause:               '$Pause',
            <% else %>
                pause:               null,
            <% end_if %>
            <% if Play %>
                play:               '$Play',
            <% else %>
                play:               null,
            <% end_if %>
            <% if Menu %>
                menu:               '$Menu',
            <% else %>
                menu:               null,
            <% end_if %>
            pageSelector:       $PageSelector,
            chapterSelector:    $ChapterSelector,

            shadows:            $Shadows,
            shadowTopFwdWidth:  $ShadowTopFwdWidth,
            shadowTopBackWidth: $ShadowTopBackWidth,
            shadowBtmWidth:     $ShadowBtmWidth
	
	});
    });
    </script>

</head>
<body>
<div id="mybook">
    <div class="b-load">
    <% control Children %>
        <div> 
            <h3>$Title</h3>
            $Content
        </div>
    <% end_control %>
    </div>
</div>
</body>
</html>