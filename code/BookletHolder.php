<?php
/*
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
*/
class BookletHolder extends Page {
    static $db = array(
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
        'Manual' => 'Boolean',
        'Hovers' => 'Boolean',
        'Overlays' => 'Boolean',
        'Tabs' => 'Boolean',
        'TabWidth' => 'Int',
        'TabHeight' => 'Int',
        'Arrows' => 'Boolean',
        'ArrowsHide' => 'Boolean',
        'Cursor' => 'Varchar',
        'Hash' => 'Boolean',
        'Keyboard' => 'Boolean',
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
        $this->Name = null;        
        $this->Width = 600;
        $this->Height = 400;
        $this->Speed = 1000;
        $this->Direction = 'LTR';
        $this->StartingPage = 0;
        $this->Easing = 'easeInOutQuad';
        $this->EaseIn = 'easeInQuad';
        $this->EaseOut = 'easeOutQuad';
        $this->Closed = false;
        $this->ClosedFrontTitle = null;
        $this->ClosedFrontChapter = null;
        $this->ClosedBackTitle = null;
        $this->ClosedBackChapter = null;
        $this->Covers = false;
        $this->AutoCenter = false;
        $this->PagePadding = 10;
        $this->PageNumbers = true;
        $this->Manual = true;
        $this->Hovers = true;
        $this->Overlays = true;
        $this->Tabs = false;
        $this->TabWidth = 60;
        $this->TabHeight = 20;
        $this->Arrows = false;
        $this->ArrowsHide = false;
        $this->Cursor = 'pointer';
        $this->Hash = false;
        $this->Keyboard = true;
        $this->Next = null;
        $this->Prev = null;
        $this->Auto = false;
        $this->Delay = 5000;
        $this->Pause = null;
        $this->Play = null;
        $this->BookletMenu = null;
        $this->PageSelector = false;
        $this->ChapterSelector = false;
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
        $fields->addFieldsToTab('Root.Content.MainOptions',
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
        
        $fields->addFieldsToTab('Root.Content.Page',
            array(         
                new NumericField('PagePadding','Page Padding : padding for each page wrapper'),
                new CheckboxField('PageNumbers','Page Numbers : display page numbers on each page'),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Manual',
            array(                
                new CheckboxField('Manual','Manual : enables manual page turning, requires jQuery UI to function'),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Controls',
            array(                
                new CheckboxField('Hovers','Hovers : enables preview pageturn hover animation, shows a small preview of previous or next page on hover'),
                new CheckboxField('Overlays','Overlays : enables navigation using a page sized overlay, when enabled links inside the content will not be clickable'),
                new CheckboxField('Tabs','Tabs : adds tabs along the top of the pages'),
                new NumericField('TabWidth','Tab Width : set the width of the tabs'),
                new NumericField('TabHeight','Tab Height : set the height of the tabs'),
                new CheckboxField('Arrows','Arrows : adds arrows overlayed over the book edges'),
                new CheckboxField('ArrowsHide','Arrows Hide : auto hides arrows when controls are not hovered'),
                new TextField('Cursor','Cursor : cursor css setting for side bar areas'),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Navigation',
            array(
                new CheckboxField('Hash','Hash : enables navigation using a hash string, ex: #/page/1 for page 1, will affect all booklets with "hash" enabled'),
                new CheckboxField('Keyboard','Keyboard : enables navigation with arrow keys (left: previous, right: next)'),
                new TextField('Next','Next : selector for element to use as click trigger for next page'),
                new TextField('Prev','Prev : selector for element to use as click trigger for previous page'),
                new CheckboxField('Auto','Auto : enables automatic navigation, requires "delay"'),
                new NumericField('Delay','Delay : amount of time between automatic page flipping'),
                new TextField('Pause','Pause : selector for element to use as click trigger for pausing auto page flipping'),
                new TextField('Play','Play : selector for element to use as click trigger for restarting auto page flipping'),
            )
        );
        
        $fields->addFieldsToTab('Root.Content.Menu',
            array(
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
}

class BookletHolder_Controller extends Page_Controller {

    public function init() {
        parent::init();
        SSViewer::setOption('rewriteHashlinks', false);
    }
    
}