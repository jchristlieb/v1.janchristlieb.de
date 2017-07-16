<?php
if ( is_page('projekte')) :
    dynamic_sidebar('sidebar-portfolio');
elseif ( is_page('test')) :
    dynamic_sidebar('sidebar-primary');
else: endif; ?>
