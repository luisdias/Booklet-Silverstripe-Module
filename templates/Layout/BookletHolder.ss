<div id="custom-menu"></div>
<div class="book_wrapper">
    <a id="next_page_button"></a>
    <a id="prev_page_button"></a>
    <div id="mybook">
        <div class="b-load">
            <% loop Children %>
                <div title="$Title"> 
                    <h3>$Title</h3>
                    $Content
                </div>
            <% end_loop %>            
        </div>
    </div>
    $Content
</div>