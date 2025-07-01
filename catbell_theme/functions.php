<?php
function is_first(){
    global $wp_query;
    return ($wp_query->current_post === 0);
}