<?php
/*
Copyright (c) 2013-2014 Luis E. S. Dias - smartbyte.systems@gmail.com

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
        $fields->addFieldToTab('Root.Main',CheckboxField('MoleskineTheme','Use Moleskine theme by Codrops ( forces width to 800 and height to 500 )'),'Content');
        $fields->addFieldsToTab('Root.General',
            array(
                TextField::create('Name','Name : name of the booklet to display in the document title bar'),
                NumericField::create('Width','Width : container width'),
                NumericField::create('Height','Height : container height'),
                NumericField::create('Speed','Speed : speed of the transition between pages'),
                DropdownField::create('Direction','Direction : direction of the overall content organization, default LTR, left to right, can be RTL for languages which read right to left',$directionOptions),
                NumericField::create('StartingPage','Starting Page : index of the first page to be displayed'),
                DropdownField::create('Easing','Easing : easing method for complete transition',$easingOptions),
                DropdownField::create('EaseIn','Ease In : easing method for first half of transition',$easingInOptions),
                DropdownField::create('EaseOut','Ease Out : easing method for second half of transition',$easingOutOptions),
            )
        );
        
        $fields->addFieldsToTab('Root.Closed',
            array(        
                CheckboxField::create('Closed','Closed : start with the book "closed", will add empty pages to beginning and end of book'),
                TextField::create('ClosedFrontTitle'),
                TextField::create('ClosedFrontChapter','Closed Front Chapter : used with "closed", "menu" and "pageSelector", determines title of blank starting page'),
                TextField::create('ClosedBackTitle','Closed Back Title : used with "closed", "menu" and "pageSelector", determines chapter name of blank ending page'),
                TextField::create('ClosedBackChapter','Closed Back Chapter : used with "closed", "menu" and "chapterSelector", determines chapter name of blank ending page'),
                CheckboxField::create('Covers','Covers : used with "closed", makes first and last pages into covers, without page numbers (if enabled)'),
                CheckboxField::create('AutoCenter','Auto Center : used with "closed", makes book position in center of container when closed'),
            )
        );
        
        $fields->addFieldsToTab('Root.Pages',
            array(         
                NumericField::create('PagePadding','Page Padding : padding for each page wrapper'),
                CheckboxField::create('PageNumbers','Page Numbers : display page numbers on each page'),
                NumericField::create('PageBorder','Page Border : the size of the border around each page')
            )
        );
        
        $fields->addFieldsToTab('Root.Controls',
            array(                
                CheckboxField::create('Manual','Manual : enables manual page turning, requires jQuery UI to function'),
                CheckboxField::create('Hovers','Hovers : enables preview pageturn hover animation, shows a small preview of previous or next page on hover'),
                NumericField::create('HoverWidth','Hover Width : the width of the page turn hover preview'),
                NumericField::create('HoverSpeed','Hover Speed : the speed in milliseconds of the page turn hover preview'),                
                NumericField::create('HoverTreshold','Hover Treshold : the percentage used with manual page dragging'),                
                CheckboxField::create('HoverClick','Hover Click : enables a click on the page turn hover preview'),
                CheckboxField::create('Overlays','Overlays : enables navigation using a page sized overlay, when enabled links inside the content will not be clickable'),
                CheckboxField::create('Tabs','Tabs : adds tabs along the top of the pages'),
                NumericField::create('TabWidth','Tab Width : set the width of the tabs'),
                NumericField::create('TabHeight','Tab Height : set the height of the tabs'),                
                TextField::create('NextControlText','Next Control Text : set the inline text for all next controls (tabs, arrows, etc'),
                TextField::create('PreviousControlText','Previous Control Text : set the inline text for all previous controls (tabs, arrows, etc.)'),
                TextField::create('NextControlTitle','Next Control Title : set the text for the title attributes of all next controls (tabs, arrows, etc)'),
                TextField::create('PreviousControlTitle','Previous Control Title : set text for title attributes of all previous controls (tabs, arrows, etc.)'),
                CheckboxField::create('Arrows','Arrows : adds arrows overlayed over the book edges'),
                CheckboxField::create('ArrowsHide','Arrows Hide : auto hides arrows when controls are not hovered'),
                TextField::create('Cursor','Cursor : cursor css setting for side bar areas'),
                CheckboxField::create('Hash','Hash : enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with "hash" enabled'),
                TextField::create('HashTitleText','Hash Title Text : text which forms the hash page title'),                
                TextField::create('Next','Next : selector for element to use as click trigger for next page'),
                TextField::create('Prev','Prev : selector for element to use as click trigger for previous page'),
                CheckboxField::create('Auto','Auto : enables automatic navigation, requires "delay"'),
                NumericField::create('Delay','Delay : amount of time between automatic page flipping'),
                TextField::create('Pause','Pause : selector for element to use as click trigger for pausing auto page flipping'),
                TextField::create('Play','Play : selector for element to use as click trigger for restarting auto page flipping'),
                TextField::create('BookletMenu','Menu : selector for element to use as the menu area, required for "pageSelector"'),
                CheckboxField::create('PageSelector','Page Selector : enables navigation with a dropdown menu of pages, requires "menu"'),
                CheckboxField::create('ChapterSelector','Chapter Selector : enables navigation with a dropdown menu of chapters, determined by the "rel" attribute, requires "menu"'),                
            )
        );
        
        $fields->addFieldsToTab('Root.Shadows',
            array(
                CheckboxField('Shadows','Shadows : display shadows on page animations'),
                NumericField('ShadowTopFwdWidth','Shadow Top Fwd Width : shadow width for top forward anim'),
                NumericField('ShadowTopBackWidth','Shadow Top Back Width : shadow width for top back anim'),
                NumericField('ShadowBtmWidth','Shadow Btm Width : shadow width for bottom shadow'),    
            )
        );
        
        return $fields;
    }
    
    function getCMSValidator() 
    { 
      return RequiredFields('Name','Width','Height','Speed'); 
    }    
}

class BookletHolder_Controller extends Page_Controller {

    public function init() {        
        parent::init();
        $qt = "'"; // quote character
        SSViewer::setOption('rewriteHashlinks', false);
        Validator::set_javascript_validation_handler('none'); 
        Requirements::block('sapphire/thirdparty/prototype/prototype.js'); 
        Requirements::block('sapphire/thirdparty/behaviour/behaviour.js'); 
        Requirements::block('sapphire/javascript/prototype_improvements.js'); 
        Requirements::block('sapphire/javascript/Validator.js'); 
        Requirements::block('sapphire/javascript/i18n.js'); 
        Requirements::block('sapphire/javascript/lang/en_US.js');                                 
        
        // Warning! Make sure your site has not loaded one of these 3 libraries
        // to prevent double loading
        Requirements::javascript("booklet/javascript/jquery-1.9.1.min");
        Requirements::javascript("booklet/javascript/jquery-ui-1.10.1.custom.min.js");
        Requirements::javascript("booklet/javascript/jquery.easing.1.3.js");
        
        Requirements::javascript("booklet/javascript/jquery.booklet.1.4.2.js");
        
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
        
            Requirements::css("booklet/css/jquery.booklet.1.4.2.css");        
        
            if ( $this->MoleskineTheme == 1 )
                Requirements::css("booklet/css/moleskine.css");

    }
}
