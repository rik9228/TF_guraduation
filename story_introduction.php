<div class="story_other_contents">
  <div class="container">
    <p class="story_other_lead">
      <?php
      $cf_group = SCF::get('Intro_group');
      foreach ($cf_group as $field_name => $field_value) {
        echo $field_value['introduction'];
      }
      ?>
    </p>
  </div>
</div>