(function ($) {
    
    let taxTerm = '';
    let tagTerm = '';
    
    var initializeBlock = function ($block) {
        //console.log($block);
    }
        
    // Initialize each block on page load (front end).
    $(document).ready(function () {
        $('.ppx-adv-slider').each(function () {
        initializeBlock($(this));
        });
                    
        let theId = '';

        //let settings = ppx_acs_params.settings;
        $('.uk-slider-items').each( function(){
            theId = $(this).attr('id');
            initializeBlock($(this));
        } )
        
    });
        
    $(window).click((e) => {
        const target = $( e.target );
        const tagFilterBut  = target.attr('data-tags-term');
        const taxFilterBut  = target.attr('data-taxonomy-term');
        
        if( tagFilterBut || taxFilterBut){
            e.preventDefault();
            let replaceContent = target.attr("data-replace");
            let input ='';
            let setting = '';
            
            initializeBlock($('#' + replaceContent));
            
            let block = $('#ul-' + replaceContent);
            
            // CASE 1: filter by tag
            if ( tagFilterBut ) {
                e.preventDefault();
                taxTerm = '';
                settingElem = $('#set-' + replaceContent );
                setting = settingElem.attr("data-setting");                
                tagTerm = target.attr("data-tags-term")=='all' ? '': target.attr("data-tags-term");
                }

            // CASE 2: filter by taxonomy
            if ( taxFilterBut ){
                e.preventDefault();
                tagTerm = '';
                settingElem = $('#set-' + replaceContent );
                setting = settingElem.attr("data-setting");                
                taxTerm = target.attr("data-taxonomy-term")=='all' ? '': target.attr("data-taxonomy-term");
                }
            
            $.ajax({
                  url: ajaxurl,
                  type: 'POST',
                  data: {
                    'nonce'         : ppx_acs_params.nonce,
                    'query'         : ppx_acs_params.query,
                    'action'        : ppx_acs_params.action,
                    'id'            : replaceContent,
                    'className'     : ppx_acs_params.className,
                    'settings'      : setting,
                    'tax-term'      : taxTerm,
                    'tag'           : tagTerm,
                  },
                  success: function(data) {                       
                    block.html(data);

                  },
                  error: function(errorThrown){
                      window.alert(errorThrown);
                  }
              }); // end ajax
            
           } // end if
        
    }); //end if window click
    
    
})(jQuery);

