<?php


class TrainingTemplate {

  /*
  Replace 'Training - ' with '' in the page title, but not in the WP pages directory.
  Bit hacky, but it works.
  */
  public static function getFixedTitleHack() {
    $title = get_the_title();
    $title = str_replace('Training &#8210; ', '', $title);
    $title = str_replace('Training &#8211; ', '', $title);
    $title = str_replace('Training &#8212; ', '', $title);
    $title = str_replace('Training &#8213; ', '', $title);

    //Wordpress uses HTML entities, so these won't exactly work. It do be wack
    //~ Eric Golde
    //$title = str_replace('Training ‐ ', '', $title); //Special Hyphen (2010)
    //$title = str_replace('Training ‑ ', '', $title); //Special Non-Breaking Hyphen (2011)
    //$title = str_replace('Training ‒ ', '', $title); //Special Figure Dash (2012)
    //$title = str_replace('Training – ', '', $title); //Special En Dash (2013)
    //$title = str_replace('Training — ', '', $title); //Special Em Dash (2014)
    //$title = str_replace('Training ― ', '', $title); //Special Horizontal Bar (2015)
    //$title = str_replace('Training - ', '', $title); //Normal Dash HYPHEN-MINUS (002D)

    echo($title);
  }

}

/**
 * This generates the custom menu in the style of the events page, but as a wordpress object, so we can change the menu items later.
 */
class Erics_Custom_Walker_Menu extends Walker_Nav_Menu {

  var $total_elements = null;

  //so these are only called for sub menues weirdly. The top level is handled in the arguments?
  function start_lvl( &$output, $depth = 0, $args = null ) {
    //no sub menu
  }

  function end_lvl( &$output, $depth = 0, $args = null ) {
    //no sub menu
  }

  function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    
    //calculate the total number of items
    if(!isset($this->total_elements)) {
      $menu_elements = wp_get_nav_menu_items( $args->menu ); //returns a array
      $this->total_elements = count($menu_elements);
    }

    //This page had some documentation about what the item object has in it: https://www.ibenic.com/how-to-create-wordpress-custom-menu-walker-nav-menu-class/
    $element_id = $item->id;
    $title = $item->title;
    $permalink = $item->url;
    $element_number = $item->menu_order;

    //output the item
    $output .= '<p><a id="' . $element_id . '" class="red" href="' . $permalink . '">' . $title . '</a></p>';

    //Add the | breaks between items
    if($element_number < $this->total_elements) {
      $output .= '<p> | </p>';
    }
      
  }

  function end_el( &$output, $data_object, $depth = 0, $args = null ) {
    //Everythings done in start element
  }

    public static function create() {
        //Create the menu with a few arguments
        $args = array(
            'menu'  =>  '14', //ID of the menu. Unsure how to specify the name, but we should at somepoint
            'depth' => 0, //Hopefully tell WP to never try to do sub menues
            'items_wrap' => '<div id="%1$s" class="series text-center sm-mrg-top sm-mrg-bottom">%3$s</div>', //This is the top level wrapper class.
            'walker' => new Erics_Custom_Walker_Menu() //Tell Wp to use my custom walker
            );
        wp_nav_menu( $args ); //write the HTML to the screen

        /*
        Hack: Highlight the training main bar, when we are on a training sub page.
        
        -- Eric Golde
        */
        echo("
        <script>
        /*
        Hack: Highlight the training main bar, when we are on a training sub page.
        
        -- Eric Golde
        */
        
        const trainingMenu = document.getElementById('menu-item-18491');
        const trainingMenuALink = trainingMenu.children[0];
        
        //Highlight the Training menu for all SUB categories
        trainingMenu.classList.add('current-menu-item');
        trainingMenu.classList.add('page_item');
        trainingMenu.classList.add('page-item-18477');
        trainingMenu.classList.add('current_page_item');
        
        //add aria-current='page' to the <a> tag. Not sure if I need to do this or not, but wordpress does this.
        trainingMenuALink.ariaCurrent = 'page';

        </script>
        ");
    }

}

    
  
?>