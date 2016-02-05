<?php 


  // Get Page ID
  $pageID = get_the_ID();

  // If is child page
  if( $post->post_parent ) {

    $parent = array_reverse(get_post_ancestors($post->ID));
    $first_parent = get_post($parent[0]);
    $pid = $first_parent;

  // Else, get this page ID
  } else {
    $pid = $pageID;
  }

  // Page link
  $link = get_page_link($pid);
  // Schedule a service
  $sas = get_field('s_a_s','option');
?>

<div class="mobile-signs">

  <div class="mobile-sign blocks">
        <a target="_blank" href="http://visitor.r20.constantcontact.com/d.jsp?llr=xhogi6uab&p=oi&m=1121968142583&sit=ayoava6jb&f=395118fb-29cc-49b7-b662-f3c205d812ee">Join Our Mailing List</a>
  </div><!-- sign -->

  <div class="mobile-sign blocks">
          <a href="<?php echo $sas; ?>" target="_blank">Schedule a Service</a>
  </div><!-- sign -->

  <div class="mobile-sign blocks">
    <a href="<?php echo $link; ?>new-client-registration">New Client Registration</a>
  </div><!-- sign -->

</div><!-- mobile signs -->
