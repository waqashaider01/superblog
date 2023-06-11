<div class="clearfix"></div>

    <div class="postinfo p-border">  
    
    <?php
        $themnific_redux = get_option( 'themnific_redux' );
    
        // related
        if (empty($themnific_redux['tmnf-post-related-dis'])) {
			
        } else {
			
        	get_template_part('/includes/mag-relatedposts');}
		
        // prev/next	
        if (empty($themnific_redux['tmnf-post-nextprev-dis'])) {
			
        } else {
			
        	get_template_part('/includes/mag-nextprev');
        	echo '<div class="clearfix"></div>';}
        
        //comments
        comments_template(); 
    ?>
                
    </div>

<div class="clearfix"></div>
 			
            

                        
