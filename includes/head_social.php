			<?php $themnific_redux = get_option( 'themnific_redux' ); ?>
            <ul class="social-menu tranz">
            
            <?php if (!empty($themnific_redux['tmnf-social-rss'])) { ?>
            <li class="sprite-rss"><a title="<?php esc_attr_e('Rss Feed','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-rss']);?>"><i class="fas fa-rss"></i><span><?php esc_html_e('Rss Feed','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-facebook'])) { ?>
            <li class="sprite-facebook"><a target="_blank" class="mk-social-facebook" title="<?php esc_attr_e('Facebook','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-facebook']);?>"><i class="fab fa-facebook-f"></i><span><?php esc_html_e('Facebook','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-twitter'])) { ?>
            <li class="sprite-twitter"><a target="_blank" class="mk-social-twitter-alt" title="<?php esc_attr_e('Twitter','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-twitter']);?>"><i class="fab fa-twitter"></i><span><?php esc_html_e('Twitter','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-google'])) { ?>
            <li class="sprite-google"><a target="_blank" class="mk-social-googleplus" title="<?php esc_attr_e('Google+','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-google']);?>"><i class="fab fa-google-plus-square"></i><span><?php esc_html_e('Google+','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-flickr'])) { ?>
            <li class="sprite-flickr"><a target="_blank" class="mk-social-flickr" title="<?php esc_attr_e('Flickr','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-flickr']);?>"><i class="fab fa-flickr"></i><span><?php esc_html_e('Flickr','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-500'])) { ?>
            <li class="sprite-px"><a target="_blank" class="differ2" title="<?php esc_attr_e('500px','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-500']);?>"><i class="fab fa-500px"></i><span><?php esc_html_e('500px','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-instagram'])) { ?>
            <li class="sprite-instagram"><a class="mk-social-photobucket" title="<?php esc_attr_e('Instagram','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-instagram']);?>"><i class="fab fa-instagram"></i><span><?php esc_html_e('Instagram','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-pinterest'])) { ?>
            <li class="sprite-pinterest"><a target="_blank" class="mk-social-pinterest" title="<?php esc_attr_e('Pinterest','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-pinterest']);?>"><i class="fab fa-pinterest"></i><span><?php esc_html_e('Pinterest','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-youtube'])) { ?>
            <li class="sprite-youtube"><a target="_blank" class="mk-social-youtube" title="<?php esc_attr_e('YouTube','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-youtube']);?>"><i class="fab fa-youtube"></i><span><?php esc_html_e('YouTube','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-vimeo'])) { ?>
            <li class="sprite-vimeo"><a target="_blank" class="mk-social-vimeo" title="<?php esc_attr_e('Vimeo','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-vimeo']);?>"><i class="fab fa-vimeo-square"></i><span><?php esc_html_e('Vimeo','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-github'])) { ?>
            <li class="sprite-github"><a title="<?php esc_attr_e('GitHub','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-github']);?>"><i class="fab fa-github"></i><span><?php esc_html_e('GitHub','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-linkedin'])) { ?>
            <li class="sprite-linkedin"><a target="_blank" class="mk-social-linkedin" title="<?php esc_attr_e('LinkedIn','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-linkedin']);?>"><i class="fab fa-linkedin-in"></i><span><?php esc_html_e('LinkedIn','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-skype'])) { ?>
            <li class="sprite-skype"><a target="_blank" class="mk-social-skype" title="<?php esc_attr_e('Skype','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-skype']);?>"><i class="fab fa-skype"></i><span><?php esc_html_e('Skype','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-tumblr'])) { ?>
            <li class="sprite-tumblr"><a target="_blank" class="mk-social-tumblr" title="<?php esc_attr_e('Tumblr','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-tumblr']);?>"><i class="fab fa-tumblr"></i><span><?php esc_html_e('Tumblr','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-foursquare'])) { ?>
            <li class="sprite-foursquare"><a  title="<?php esc_attr_e('Foursquare','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-foursquare']);?>"><i class="fab fa-foursquare"></i><span><?php esc_html_e('Foursquare','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-dribbble'])) { ?>
            <li class="sprite-dribbble"><a target="_blank" class="mk-social-dribbble" title="<?php esc_attr_e('Dribbble','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-dribbble']);?>"><i class="fab fa-dribbble"></i><span><?php esc_html_e('Dribbble','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-stumbleupon'])) { ?>
            <li class="sprite-stumbleupon"><a target="_blank" title="<?php esc_attr_e('StumbleUpon','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-stumbleupon']);?>"><i class="fab fa-stumbleupon"></i><span><?php esc_html_e('StumbleUpon','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-soundcloud'])) { ?>
            <li><a target="_blank" title="<?php esc_attr_e('SoundCloud','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-soundcloud']);?>"><i class="fab fa-soundcloud"></i><span><?php esc_html_e('SoundCloud','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-spotify'])) { ?>
            <li class="sprite-spotify"><a target="_blank" title="<?php esc_attr_e('Spotify','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-spotify']);?>"><i class="fab fa-spotify"></i><span><?php esc_html_e('Spotify','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-xing']))  { ?>
            <li class="sprite-xing"><a target="_blank" title="<?php esc_attr_e('Xing','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-xing']);?>"><i class="fab fa-xing"></i><span><?php esc_html_e('Xing','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-whatsapp']))  { ?>
            <li class="sprite-whatsapp"><a target="_blank" title="<?php esc_attr_e('WhatsApp','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-whatsapp']);?>"><i class="fab fa-whatsapp"></i><span><?php esc_html_e('WhatsApp','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-vk'])) { ?>
            <li class="sprite-vk"><a target="_blank" title="<?php esc_attr_e('VKontakte','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-vk']);?>"><i class="fab fa-vk"></i><span><?php esc_html_e('VKontakte','superblog');?></span></a></li><?php } ?>
            
            <?php if (!empty($themnific_redux['tmnf-social-snapchat']))  { ?>
            <li class="sprite-snapchat"><a target="_blank" title="<?php esc_attr_e('Snapchat','superblog');?>" href="<?php echo esc_url($themnific_redux['tmnf-social-snapchat']);?>"><i class="fab fa-snapchat-ghost"></i><span><?php esc_html_e('Snapchat','superblog');?></span></a></li><?php } ?>
            
            </ul>