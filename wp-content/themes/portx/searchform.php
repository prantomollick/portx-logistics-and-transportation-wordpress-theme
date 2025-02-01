<div class="sidebar__search">
    <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
        <div class="sidebar__search-input-2">
            <input type="text" 
                placeholder="<?php esc_attr_e('Search here', 'portx'); ?>" 
                value="<?php echo esc_attr(get_search_query());?>" 
                name="<?php esc_attr_e('s', 'portx')?>" id="s" />
            <button type="submit"><i class="far fa-search"></i></button>
        </div>
    </form>
</div>
