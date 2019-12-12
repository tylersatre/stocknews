<?php
/**
 * Plugin Name: Tyler's Stock News
 */


register_activation_hook( __FILE__, 'my_rewrite_flush' );
function my_rewrite_flush() {
    stock_post_types();
    flush_rewrite_rules();
}


// Create custom post types for news and recommendations
// Also create a hidden post type for company pages
// Theme is set up with specific options based off of custom post types
add_action('init','stock_post_types');
function stock_post_types(){
    register_post_type('sn_news',[
        'label' => 'Stock News',
        'description' => 'This is meant for news about a specific company',
        'public' => true,
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxnIGlkPSJuZXdzIj48cGF0aCBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yOSwwSDdDNS4zNDMsMCw0LDEuMzQyLDQsM3YySDNDMS4zNDMsNSwwLDYuMzQyLDAsOHYyMCAgIGMwLDIuMjA5LDEuNzkxLDQsNCw0aDI0YzIuMjA5LDAsNC0xLjc5MSw0LTRWM0MzMiwxLjM0MiwzMC42NTYsMCwyOSwweiBNMzAsMjhjMCwxLjEwMi0wLjg5OCwyLTIsMkg0Yy0xLjEwMywwLTItMC44OTgtMi0yVjggICBjMC0wLjU1MiwwLjQ0OC0xLDEtMWgxdjIwYzAsMC41NTMsMC40NDcsMSwxLDFzMS0wLjQ0NywxLTFWM2MwLTAuNTUyLDAuNDQ4LTEsMS0xaDIyYzAuNTUxLDAsMSwwLjQ0OCwxLDFWMjh6IiBmaWxsPSIjMzMzMzMzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48cGF0aCBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xOS40OTgsMTMuMDA1aDhjMC4yNzcsMCwwLjUtMC4yMjQsMC41LTAuNXMtMC4yMjMtMC41LTAuNS0wLjUgICBoLThjLTAuMjc1LDAtMC41LDAuMjI0LTAuNSwwLjVTMTkuMjIzLDEzLjAwNSwxOS40OTgsMTMuMDA1eiIgZmlsbD0iIzMzMzMzMyIgZmlsbC1ydWxlPSJldmVub2RkIi8+PHBhdGggY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTkuNDk4LDEwLjAwNWg4YzAuMjc3LDAsMC41LTAuMjI0LDAuNS0wLjVzLTAuMjIzLTAuNS0wLjUtMC41ICAgaC04Yy0wLjI3NSwwLTAuNSwwLjIyNC0wLjUsMC41UzE5LjIyMywxMC4wMDUsMTkuNDk4LDEwLjAwNXoiIGZpbGw9IiMzMzMzMzMiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTE5LjQ5OCw3LjAwNWg4YzAuMjc3LDAsMC41LTAuMjI0LDAuNS0wLjVzLTAuMjIzLTAuNS0wLjUtMC41aC04ICAgYy0wLjI3NSwwLTAuNSwwLjIyNC0wLjUsMC41UzE5LjIyMyw3LjAwNSwxOS40OTgsNy4wMDV6IiBmaWxsPSIjMzMzMzMzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48cGF0aCBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0xNi41LDI3LjAwNGgtOGMtMC4yNzYsMC0wLjUsMC4yMjUtMC41LDAuNSAgIGMwLDAuMjc3LDAuMjI0LDAuNSwwLjUsMC41aDhjMC4yNzUsMCwwLjUtMC4yMjMsMC41LTAuNUMxNywyNy4yMjksMTYuNzc2LDI3LjAwNCwxNi41LDI3LjAwNHoiIGZpbGw9IiMzMzMzMzMiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTE2LjUsMjQuMDA0aC04Yy0wLjI3NiwwLTAuNSwwLjIyNS0wLjUsMC41ICAgYzAsMC4yNzcsMC4yMjQsMC41LDAuNSwwLjVoOGMwLjI3NSwwLDAuNS0wLjIyMywwLjUtMC41QzE3LDI0LjIyOSwxNi43NzYsMjQuMDA0LDE2LjUsMjQuMDA0eiIgZmlsbD0iIzMzMzMzMyIgZmlsbC1ydWxlPSJldmVub2RkIi8+PHBhdGggY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMTYuNSwyMS4wMDRoLThjLTAuMjc2LDAtMC41LDAuMjI1LTAuNSwwLjUgICBjMCwwLjI3NywwLjIyNCwwLjUsMC41LDAuNWg4YzAuMjc1LDAsMC41LTAuMjIzLDAuNS0wLjVDMTcsMjEuMjI5LDE2Ljc3NiwyMS4wMDQsMTYuNSwyMS4wMDR6IiBmaWxsPSIjMzMzMzMzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48cGF0aCBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yNy41LDI3LjAwNGgtOGMtMC4yNzcsMC0wLjUsMC4yMjUtMC41LDAuNSAgIGMwLDAuMjc3LDAuMjIzLDAuNSwwLjUsMC41aDhjMC4yNzUsMCwwLjUtMC4yMjMsMC41LTAuNUMyOCwyNy4yMjksMjcuNzc1LDI3LjAwNCwyNy41LDI3LjAwNHoiIGZpbGw9IiMzMzMzMzMiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTI3LjUsMjQuMDA0aC04Yy0wLjI3NywwLTAuNSwwLjIyNS0wLjUsMC41ICAgYzAsMC4yNzcsMC4yMjMsMC41LDAuNSwwLjVoOGMwLjI3NSwwLDAuNS0wLjIyMywwLjUtMC41QzI4LDI0LjIyOSwyNy43NzUsMjQuMDA0LDI3LjUsMjQuMDA0eiIgZmlsbD0iIzMzMzMzMyIgZmlsbC1ydWxlPSJldmVub2RkIi8+PHBhdGggY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjcuNSwyMS4wMDRoLThjLTAuMjc3LDAtMC41LDAuMjI1LTAuNSwwLjUgICBjMCwwLjI3NywwLjIyMywwLjUsMC41LDAuNWg4YzAuMjc1LDAsMC41LTAuMjIzLDAuNS0wLjVDMjgsMjEuMjI5LDI3Ljc3NSwyMS4wMDQsMjcuNSwyMS4wMDR6IiBmaWxsPSIjMzMzMzMzIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiLz48cGF0aCBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGQ9Ik0yNy41LDE1LjAwNGgtMTljLTAuMjc2LDAtMC41LDAuMjI0LTAuNSwwLjVzMC4yMjQsMC41LDAuNSwwLjUgICBoMTljMC4yNzUsMCwwLjUtMC4yMjQsMC41LTAuNVMyNy43NzUsMTUuMDA0LDI3LjUsMTUuMDA0eiIgZmlsbD0iIzMzMzMzMyIgZmlsbC1ydWxlPSJldmVub2RkIi8+PHBhdGggY2xpcC1ydWxlPSJldmVub2RkIiBkPSJNMjcuNSwxOC4wMDRoLTE5Yy0wLjI3NiwwLTAuNSwwLjIyNS0wLjUsMC41ICAgYzAsMC4yNzcsMC4yMjQsMC41LDAuNSwwLjVoMTljMC4yNzUsMCwwLjUtMC4yMjMsMC41LTAuNUMyOCwxOC4yMjksMjcuNzc1LDE4LjAwNCwyNy41LDE4LjAwNHoiIGZpbGw9IiMzMzMzMzMiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjxwYXRoIGNsaXAtcnVsZT0iZXZlbm9kZCIgZD0iTTksMTNoN2MwLjU1MywwLDEtMC40NDcsMS0xVjUuMDA0YzAtMC41NTMtMC40NDctMS0xLTFIOSAgIGMtMC41NTMsMC0xLDAuNDQ3LTEsMVYxMkM4LDEyLjU1Miw4LjQ0NywxMyw5LDEzeiBNMTAsNmg1djVoLTVWNnoiIGZpbGw9IiMzMzMzMzMiIGZpbGwtcnVsZT0iZXZlbm9kZCIvPjwvZz48L3N2Zz4='
    ]);
    register_post_type('sn_recommendation',[
        'label' => 'Stock Recommendation',
        'description' => 'Stock recommendation for a specific company',
        'public' => true,
        'menu_icon' => 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDMyIDMyIiBoZWlnaHQ9IjMycHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCAzMiAzMiIgd2lkdGg9IjMycHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxwYXRoIGQ9Ik0zMS44ODEsMTIuNTU3Yy0wLjI3Ny0wLjc5OS0wLjk4OC0xLjM4NC0xLjg0NC0xLjUxMWwtOC4zMjYtMS4yMzhsLTMuNjE5LTcuNTE0ICBDMTcuNzExLDEuNTA1LDE2Ljg5NiwxLDE2LDFjLTAuODk2LDAtMS43MTEsMC41MDUtMi4wOTIsMS4yOTRsLTMuNjE5LDcuNTE0bC04LjMyNywxLjIzOGMtMC44NTUsMC4xMjctMS41NjYsMC43MTItMS44NDIsMS41MTEgIGMtMC4yNzUsMC44MDEtMC4wNjcsMS42ODMsMC41MzcsMi4yODVsNi4xMDIsNi4wOTJsLTEuNDE1LDguNDUxQzUuMiwzMC4yMzYsNS41NjksMzEuMDksNi4yOTIsMzEuNTg4ICBDNi42ODksMzEuODYxLDcuMTU2LDMyLDcuNjIzLDMyYzAuMzg0LDAsMC43NjktMC4wOTQsMS4xMTgtMC4yODFMMTYsMjcuODExbDcuMjYsMy45MDhDMjMuNjA5LDMxLjkwNiwyMy45OTQsMzIsMjQuMzc3LDMyICBjMC40NjcsMCwwLjkzNC0wLjEzOSwxLjMzMi0wLjQxMmMwLjcyMy0wLjQ5OCwxLjA5LTEuMzUyLDAuOTQ3LTIuMjAzbC0xLjQxNi04LjQ1MWw2LjEwNC02LjA5MiAgQzMxLjk0NywxNC4yMzksMzIuMTU0LDEzLjM1NywzMS44ODEsMTIuNTU3eiBNMjMuNTg4LDE5LjM2M2MtMC41MTIsMC41MS0wLjc0NCwxLjIyOS0wLjYyNywxLjkzNGwxLjQxNiw4LjQ1MWwtNy4yNi0zLjkwNiAgYy0wLjM0OC0wLjE4OC0wLjczMi0wLjI4MS0xLjExOC0wLjI4MWMtMC4zODQsMC0wLjc2OSwwLjA5NC0xLjExNywwLjI4MWwtNy4yNiwzLjkwNmwxLjQxNi04LjQ1MSAgYzAuMTE4LTAuNzA1LTAuMTE0LTEuNDI0LTAuNjI2LTEuOTM0bC02LjEwMi02LjA5Mmw4LjMyNi0xLjI0YzAuNzYxLTAuMTEzLDEuNDE2LTAuNTg5LDEuNzQzLTEuMjY4TDE2LDMuMjUxbDMuNjIsNy41MTMgIGMwLjMyOCwwLjY3OSwwLjk4MiwxLjE1NCwxLjc0MiwxLjI2OGw4LjMyOCwxLjI0TDIzLjU4OCwxOS4zNjN6IiBmaWxsPSIjMzMzMzMzIiBpZD0ic3RhciIvPjwvc3ZnPg=='
    ]);
    register_post_type('sn_company',[
        'label' => 'Company',
        'description' => 'Company profile page',
        'public' => true,
        'show_ui' => false
    ]);
}


// Add stock symbol field to news/recommendation post types
add_action("add_meta_boxes", "add_custom_meta_box");
function custom_meta_box_markup($object)
{
    wp_nonce_field(basename(__FILE__), "meta-box-nonce");
    ?>
    <div>
            <label for="stock-symbol">Stock Symbol</label>
            <input name="stock-symbol" type="text" value="<?php echo get_post_meta($object->ID, "stock-symbol", true); ?>" maxlength="5">
    </div>
    <?php
}
function add_custom_meta_box()
{
    add_meta_box("stock-meta-box", "Stock Symbol", "custom_meta_box_markup", ['sn_news','sn_recommendation'], "side", "high", null);
}


// Save stock symbol when sent
add_action("save_post", "save_stock_symbol", 10, 3);
function save_stock_symbol($post_id, $post, $update)
{
    if (!isset($_POST["meta-box-nonce"]) || !wp_verify_nonce($_POST["meta-box-nonce"], basename(__FILE__)))
        return $post_id;

    if(!current_user_can("edit_post", $post_id))
        return $post_id;

    if(defined("DOING_AUTOSAVE") && DOING_AUTOSAVE)
        return $post_id;

    $post_types = ['sn_news','sn_recommendation'];
    if(!in_array($post->post_type,$post_types))
        return $post_id;

    $stock_symbol_value = "";

    if(isset($_POST["stock-symbol"]))
    {
        // Making sure to save the ticker symbol in all caps
        $stock_symbol_value = strtoupper($_POST["stock-symbol"]);
    }   
    update_post_meta($post_id, "stock-symbol", $stock_symbol_value);

    // Create a company page if one doesn't exist, make sure it's published too
    $post = post_exists($stock_symbol_value,'','','sn_company');
    if ($post == 0){
        wp_insert_post(['post_type' => 'sn_company', 'post_title' => $stock_symbol_value,'post_status' => 'publish']);
    } else {
        if (get_post_status($post) != 'publish') wp_publish_post($post);
    }
}



// Pulls in company information from an outside API and returns it as an array
// Add in data checking and specified output, so data source can be changed without having to redo templates dependent upon current data structure
add_filter('sn_company_info', 'pull_company_info');
function pull_company_info($ticker){
    // Check for a valid ticker symbol
    if (!preg_match("/[A-Z]{1,5}/",$ticker)) {
        return null;
    }
    // Issue with development environment made it so that SSL needed to be ignored to test
    $context = stream_context_create(array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
        ),
    ));
    $returned = json_decode(file_get_contents('https://financialmodelingprep.com/api/v3/company/profile/'.$ticker,false,$context),true);
    return $returned;
}


// Used to generate the HTML lists for previous news or recommendation articles
add_filter('sn_company_previous', 'pull_company_previous',10,4);
function pull_company_previous($stockSymbol,$type,$name,$showTicker = false){
    // The below line makes sure that on the company profile page recommendations don't show if you go past the first page of news, this only applies on a company page
    if ($type == 'sn_recommendation' && get_post_type() == 'sn_company' &&( $_GET['news_page'] ?? 1) > 1) return;
    
    
    $pagingType = $type == 'sn_news' ? 'news_page' : 'rec_page';
    $page =  $_GET[$pagingType] ?? 1;

    $args = array(
        'post_type' => $type,
        'meta_key' => 'stock-symbol',
        'posts_per_page' => 10,
        'paged' => $page,
        'post_status' => 'publish',
    );
    if (!is_null($stockSymbol)) $args['meta_value'] = $stockSymbol;
    $related = new WP_Query($args);


    $numPages = $related->max_num_pages;
    $numPosts = $related->found_posts;

    $toBeReturned = '';

    if ($numPosts >= 1){
        $toBeReturned .= '<div id="news-holder">';
        if (!is_null($name)) $toBeReturned .= "<div id='previous-news'>$name</div>";
        foreach ($related->get_posts() as $post) {
            $postTemp = '<div><a href="'.get_permalink($post).'">';
            $postTemp .= $post->post_title;
            if ($showTicker) $postTemp .= ' ('.get_post_meta($post->ID,'stock-symbol',true).')';
            $postTemp .= ' - '.get_the_date('n/j/y',$post).'</a></div>';
            $toBeReturned .= $postTemp;
        }
        if ($numPages > 1){
            $toBeReturned .= '<div class="paging-holder">';
            $toBeReturned .= "Page $page of $numPages";
            $toBeReturned .= '<div>';
            //  Need to make sure the proper base URL is used, depending on if this is on the home page or an article page
            $baseURL = is_home() ? home_url( '/' ).'?' : get_permalink().'&';
            if ($page > 1){
                $toBeReturned .= '<a href="'.$baseURL.http_build_query([$pagingType => ($page - 1)]).'">Previous</a>'; 
            }
            if ($page > 1 && $page < $numPages){
                $toBeReturned .= "  ";
            }
            if ($page < $numPages){
                $toBeReturned .= '<a href="'.$baseURL.http_build_query([$pagingType => ($page + 1)]).'">Next</a>'; 
            }
            $toBeReturned .= '</div>';

            $toBeReturned .= '</div>';
        }
        $toBeReturned .= "</div>";
    }

    return $toBeReturned;
}



// Changes large numbers into a more readable currency format
add_filter('sn_format_currency', 'format_currency');
function format_currency($amount){
    setlocale(LC_MONETARY, 'en_US.UTF-8');
    $float = floatval($amount);
    if ($float > 1000000000000) {
        $number = round($float/1000000000000,3);
        $type = ' Trillion';
    } else if ($float > 1000000000) {
        $number = round($float/1000000000,2);
        $type = ' Billion';
    } else if ($float > 1000000) {
        $number = round($float/1000000,2);
        $type = ' Million';
    } else {
        $number = round($float,2);
        $type = '';
    }
    return money_format('%n',$number).$type;
}


