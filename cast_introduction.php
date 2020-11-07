    <?php $cast_group = SCF::get('キャスト', 7);
    foreach ($cast_group as $field_name => $field_value) : ?>
      <div class="cast_main_card">
        <?php echo wp_get_attachment_image($field_value['cast_photo'], 'medium'); ?>
        <ul>
          <li class="cast_main_cat"><?php echo $field_value['cast_from']; ?> </li>
          <li class="cast_main_name"><?php echo $field_value['cast_name']; ?> </li>
          <li class="cast_main_cat"><?php echo $field_value['cast_title']; ?> </li>
        </ul>
        <p class="cast_main_lead"><?php echo $field_value['cast_lead']; ?></p>
      </div>
    <?php endforeach; ?>