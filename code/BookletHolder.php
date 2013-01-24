<?php
/*
Copyright (c) 2013 Luis E. S. Dias - smartbyte.systems@gmail.com

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
*/
class BookletHolder extends Page {
    static $db = array(
        'MoleskineTheme' => 'Boolean',
        'Name' => 'Varchar',
        'Width' => 'Int',
        'Height' => 'Int',
        'Speed' => 'Int',
        'Direction' => 'Varchar',
        'StartingPage' => 'Int',
        'Easing' => 'Varchar',
        'EaseIn' => 'Varchar', 
        'EaseOut' => 'Varchar',
        'Closed' => 'Boolean',
        'ClosedFrontTitle' => 'Varchar',
        'ClosedFrontChapter' => 'Varchar',
        'ClosedBackTitle' => 'Varchar',
        'ClosedBackChapter' => 'Varchar',
        'Covers' => 'Boolean',
        'AutoCenter' => 'Boolean',
        'PagePadding' => 'Int',
        'PageNumbers' => 'Boolean',
        'PageBorder' => 'Int',
        'Manual' => 'Boolean',
        'Hovers' => 'Boolean',
        'HoverWidth' => 'Int',
        'HoverSpeed' => 'Int',
        'HoverTreshold' => 'Currency',
        'HoverClick' => 'Boolean',        
        'Overlays' => 'Boolean',
        'Tabs' => 'Boolean',
        'TabWidth' => 'Int',
        'TabHeight' => 'Int',
        'NextControlText' => 'Varchar',
        'PreviousControlText' => 'Varchar',
        'NextControlTitle' => 'Varchar',
        'PreviousControlTitle' => 'Varchar',
        'Arrows' => 'Boolean',
        'ArrowsHide' => 'Boolean',
        'Cursor' => 'Varchar',
        'Hash' => 'Boolean',
        'HashTitleText' => 'Varchar',
        'Next' => 'Varchar',
        'Prev' => 'Varchar',
        'Auto' => 'Boolean',
        'Delay' => 'Int',
        'Pause' => 'Varchar',
        'Play' => 'Varchar',
        'BookletMenu' => 'Varchar',
        'PageSelector' => 'Boolean',
        'ChapterSelector' => 'Boolean',
        'Shadows' => 'Boolean',
        'ShadowTopFwdWidth' => 'Int',
        'ShadowTopBackWidth' => 'Int',
        'ShadowBtmWidth' => 'Int'
    );
    
    public function populateDefaults() {
        parent::populateDefaults();
        $this->MoleskineTheme = 1;
        // General
        $this->Name = null;
        $this->Width = 600;
        $this->Height = 400;
        $this->Speed = 1000;
        $this->Direction = 'LTR';
        $this->StartingPage = 0;
        $this->Easing = 'easeInOutQuad';
        $this->EaseIn = 'easeInQuad';
        $this->EaseOut = 'easeOutQuad';
        // Closed / Covers
        $this->Closed = false;
        $this->ClosedFrontTitle = null;
        $this->ClosedFrontChapter = null;
        $this->ClosedBackTitle = null;
        $this->ClosedBackChapter = null;
        $this->Covers = false;
        $this->AutoCenter = false;
        // Pages
        $this->PagePadding = 10;
        $this->PageNumbers = true;
        $this->PageBorder = 0;
        // Controls
        $this->Manual = true;
        $this->Hovers = true;
        $this->HoverWidth = 50;
        $this->HoverSpeed = 500;
        $this->hoverTreshold = 0.25;
        $this->HoverClick = true;        
        $this->Overlays = false;
        $this->Tabs = false;
        $this->TabWidth = 60;
        $this->TabHeight = 20;
        $this->NextControlText = "Next";
        $this->PreviousControlText = "Previous";
        $this->NextControlTitle = "Next Page";
        $this->PreviousControlTitle = "Previous Page";        
        $this->Arrows = false;
        $this->ArrowsHide = false;
        $this->Cursor = 'pointer';
        $this->Hash = false;
        $this->HashTitleText = " - Page";
        $this->Next = null;
        $this->Prev = null;
        $this->Auto = false;
        $this->Delay = 5000;
        $this->Pause = null;
        $this->Play = null;
        $this->BookletMenu = null;
        $this->PageSelector = false;
        $this->ChapterSelector = false;
        // Shadows
        $this->Shadows = true;
        $this->ShadowTopFwdWidth = 166;
        $this->ShadowTopBackWidth = 166;
        $this->ShadowBtmWidth = 50;
    }
    
    public function getCMSFields() {
        $directionOptions = array('LTR'=>'Left to Right','RTL'=>'Right to Left');
        $easingOptions = array(
            'easeInOutQuad' => 'easeInOutQuad' ,
            'easeInOutCubic' => 'easeInOutCubic',
            'easeInOutQuart' => 'easeInOutQuart',
            'easeInOutQuint' => 'easeInOutQuint',
            'easeInOutSine' => 'easeInOutSine',
            'easeInOutExpo' => 'easeInOutExpo',
            'easeInOutCirc' => 'easeInOutCirc',
            'easeInOutElastic' => 'easeInOutElastic',
            'easeInOutBack' => 'easeInOutBack',
            'easeInOutBounce' => 'easeInOutBounce'
        );
        $easingInOptions = array(
            'easeInQuad' => 'easeInQuad' ,
            'easeInCubic' => 'easeInCubic',
            'easeInQuart' => 'easeInQuart',
            'easeInQuint' => 'easeInQuint',
            'easeInSine' => 'easeInSine',
            'easeInExpo' => 'easeInExpo',
            'easeInCirc' => 'easeInCirc',
            'easeInElastic' => 'easeInElastic',
            'easeInBack' => 'easeInBack',
            'easeInBounce' => 'easeInBounce'
        );                
        $easingOutOptions = array(
            'easeOutQuad' => 'easeOutQuad' ,
            'easeOutCubic' => 'easeOutCubic',
            'easeOutQuart' => 'easeOutQuart',
            'easeOutQut' => 'easeOutQut',
            'easeOutSe' => 'easeOutSe',
            'easeOutExpo' => 'easeOutExpo',
            'easeOutCirc' => 'easeOutCirc',
            'easeOutElastic' => 'easeOutElastic',
            'easeOutBack' => 'easeOutBack',
            'easeOutBounce' => 'easeOutBounce'
        );
        
        $fields = parent::getCMSFields();
        $fields->addFieldToTab('Root.Content.Main',new CheckboxField('MoleskineTheme','Use Moleskine theme by Codrops ( forces width to 800 and height to 500 )'),'Content');
        $fields->addFieldsToTab('Root.Content.General',
            array(
                new TextField('Name','Name : name of the booklet to display in the document title bar'),
                new NumericField('Width','Width : container width'),
                new NumericField('Height','Height : container height'),
                new NumericField('Speed','Speed : speed of the transition between pages'),
                new DropdownField('Direction','Direction : direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left',$directionOptions),
                new NumericField('StartingPage','Starting Page : index of the first page to be displayed'),
                new DropdownField('Easing','Easing : easing method for complete transition',$easingOptions),
                new DropdownField('EaseIn','Ease In : easing method for first half of transition',$easingInOptions),
                new DropdownField('EaseOut','Ease Out : easing method for second half of transition',$easingOutOptions),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Closed',
            array(        
                new CheckboxField('Closed','Closed : start with the book "closed", will add empty pages to beginning and end of book'),
                new TextField('ClosedFrontTitle'),
                new TextField('ClosedFrontChapter','Closed Front Chapter : used with "closed", "menu" and "pageSelector", determines title of blank starting page'),
                new TextField('ClosedBackTitle','Closed Back Title : used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page'),
                new TextField('ClosedBackChapter','Closed Back Chapter : used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page'),
                new CheckboxField('Covers','Covers : used with "closed", makes first and last pages into covers, without page numbers (if enabled)'),
                new CheckboxField('AutoCenter','Auto Center : used with "closed", makes book position in center of container when closed'),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Pages',
            array(         
                new NumericField('PagePadding','Page Padding : padding for each page wrapper'),
                new CheckboxField('PageNumbers','Page Numbers : display page numbers on each page'),
                new NumericField('PageBorder','Page Border : the size of the border around each page')
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Controls',
            array(                
                new CheckboxField('Manual','Manual : enables manual page turning, requires jQuery UI to function'),
                new CheckboxField('Hovers','Hovers : enables preview pageturn hover animation, shows a small preview of previous or next page on hover'),
                new NumericField('HoverWidth','Hover Width : the width of the page turn hover preview'),
                new NumericField('HoverSpeed','Hover Speed : the speed in milliseconds of the page turn hover preview'),                
                new NumericField('HoverTreshold','Hover Treshold : the percentage used with manual page dragging'),                
                new CheckboxField('HoverClick','Hover Click : enables a click on the page turn hover preview'),
                new CheckboxField('Overlays','Overlays : enables navigation using a page sized overlay, when enabled links inside the content will not be clickable'),
                new CheckboxField('Tabs','Tabs : adds tabs along the top of the pages'),
                new NumericField('TabWidth','Tab Width : set the width of the tabs'),
                new NumericField('TabHeight','Tab Height : set the height of the tabs'),                
                new TextField('NextControlText','Next Control Text : set the inline text for all next controls (tabs, arrows, etc'),
                new TextField('PreviousControlText','Previous Control Text : set the inline text for all previous controls (tabs, arrows, etc.)'),
                new TextField('NextControlTitle','Next Control Title : set the text for the title attributes of all next controls (tabs, arrows, etc)'),
                new TextField('PreviousControlTitle','Previous Control Title : set text for title attributes of all previous controls (tabs, arrows, etc.)'),
                new CheckboxField('Arrows','Arrows : adds arrows overlayed over the book edges'),
                new CheckboxField('ArrowsHide','Arrows Hide : auto hides arrows when controls are not hovered'),
                new TextField('Cursor','Cursor : cursor css setting for side bar areas'),
                new CheckboxField('Hash','Hash : enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with "hash" enabled'),
                new TextField('HashTitleText','Hash Title Text : text which forms the hash page title'),                
                new TextField('Next','Next : selector for element to use as click trigger for next page'),
                new TextField('Prev','Prev : selector for element to use as click trigger for previous page'),
                new CheckboxField('Auto','Auto : enables automatic navigation, requires "delay"'),
                new NumericField('Delay','Delay : amount of time between automatic page flipping'),
                new TextField('Pause','Pause : selector for element to use as click trigger for pausing auto page flipping'),
                new TextField('Play','Play : selector for element to use as click trigger for restarting auto page flipping'),
                new TextField('BookletMenu','Menu : selector for element to use as the menu area, required for "pageSelector"'),
                new CheckboxField('PageSelector','Page Selector : enables navigation with a dropdown menu of pages, requires "menu"'),
                new CheckboxField('ChapterSelector','Chapter Selector : enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires "menu"'),                
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Shadows',
            array(
                new CheckboxField('Shadows','Shadows : display shadows on page animations'),
                new NumericField('ShadowTopFwdWidth','Shadow Top Fwd Width : shadow width for top forward anim'),
                new NumericField('ShadowTopBackWidth','Shadow Top Back Width : shadow width for top back anim'),
                new NumericField('ShadowBtmWidth','Shadow Btm Width : shadow width for bottom shadow'),    
            )
        );
        
        return $fields;
    }
    
    function getCMSValidator() 
    { 
      return new RequiredFields('Name','Width','Height','Speed'); 
    }    
}

class BookletHolder_Controller extends Page_Controller {

    public function init() {
        $qt = "'"; // quote character
        parent::init();
        SSViewer::setOption('rewriteHashlinks', false);
        Validator::set_javascript_validation_handler('none'); 
        Requirements::block('sapphire/thirdparty/prototype/prototype.js'); 
        Requirements::block('sapphire/thirdparty/behaviour/behaviour.js'); 
        Requirements::block('sapphire/javascript/prototype_improvements.js'); 
        Requirements::block('sapphire/javascript/Validator.js'); 
        Requirements::block('sapphire/javascript/i18n.js'); 
        Requirements::block('sapphire/javascript/lang/en_US.js');                                 
        
        // Warning! Make sure your site has not loaded one of these 3 libraries
        Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js");
        Requirements::javascript("https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.21/jquery-ui.min.js");
        Requirements::javascript("booklet/javascript/jquery.easing.1.3.js");
        
        Requirements::javascript("booklet/javascript/jquery.booklet.1.4.0.js");
        
        Requirements::javascriptTemplate('booklet/javascript/booklet.js', array(
            name =>               $qt .$this->Name . $qt,
            width =>              ($this->MoleskineTheme ? "800" : $this->Width),
            height =>             ($this->MoleskineTheme ? "500" : $this->Height),
            speed =>              $this->Speed,
            direction =>          $qt . $this->Direction . $qt,
            startingPage =>       $this->StartingPage,
            easing =>             $qt . $this->Easing . $qt,
            easeIn =>             $qt . $this->EaseIn . $qt,
            easeOut =>            $qt . $this->EaseOut . $qt,
            closed =>             $this->Closed,
            cFrontTitle =>   ( $this->ClosedFrontTitle ? $qt . $this->ClosedFrontTitle . $qt : "null"),
            cFrontChapter => ( $this->ClosedFrontChapter ? $qt .$this->ClosedFrontChapter . $qt : "null"),
            cBackTitle =>    ( $this->ClosedBackTitle ? $qt .$this->ClosedBackTitle . $qt : "null"),
            cBackChapter =>  ( $this->ClosedBackChapter ? $qt .$this->ClosedBackChapter . $qt : "null"),
            covers =>             $this->Covers,
            autoCenter =>         $this->AutoCenter,
            pagePadding =>        $this->PagePadding,
            pageNumbers =>        $this->PageNumbers,
            pageBorder =>         $this->PageBorder,
            manual =>             $this->Manual,
            hovers =>             $this->Hovers,
            hoverWidth =>         $this->HoverWidth,
            hoverSpeed =>         $this->HoverSpeed,
            hoverTreshold =>      $this->HoverTreshold,
            hoverClick =>         $this->HoverClick,            
            overlays =>           $this->Overlays,
            tabs =>               $this->Tabs,
            tabWidth =>           $this->TabWidth,
            tabHeight =>          $this->TabHeight,
            nextControlText =>     $qt . $this->NextControlText . $qt,
            previousControlText => $qt . $this->PreviousControlText . $qt,
            nextControlTitle =>    $qt . $this->NextControlTitle . $qt,
            previousControlTitle => $qt . $this->PreviousControlTitle . $qt,            
            arrows =>             $this->Arrows,
            aHide =>              $this->ArrowsHide,
            cursor =>             $qt . $this->Cursor  . $qt,
            hash =>               $this->Hash,
            hTitleText =>         $qt . $this->HashTitleText . $qt,
            next =>               ( $this->MoleskineTheme ? "bttn_next" : ( $this->Next ? $qt . $this->Next . $qt : "null")),
            prev =>               ( $this->MoleskineTheme ? "bttn_prev" : ( $this->Prev ? $qt . $this->Prev . $qt : "null")), 
            auto =>               $this->Auto,
            delay =>              $this->Delay,
            pause =>              ( $this->Pause ? $qt . $this->Pause . $qt : "null" ),
            play =>               ( $this->Play ? $qt . $this->Play . $qt : "null" ),
            menu =>               ( $this->BookletMenu ? $qt . $this->BookletMenu . $qt : "null"),
            pageSelector =>       $this->PageSelector,
            chapterSelector =>    $this->ChapterSelector,
            shadows =>            $this->Shadows,
            shadowTopFwdWidth =>  $this->ShadowTopFwdWidth,
            shadowTopBackWidth => $this->ShadowTopBackWidth,
            shadowBtmWidth =>     $this->ShadowBtmWidth
            ));
        
            Requirements::css("booklet/css/jquery.booklet.1.4.0.css");        
        
            if ( $this->MoleskineTheme == 1 )
                Requirements::css("booklet/css/moleskine.css");

    }
}