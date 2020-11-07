<section class="schedule container">
  <div class="schedule_contents overlay">

    <h2 class="section_ttl"> SCHEDULE </h2>

    <?php $cf_group = SCF::get('スケジュール',7);
    foreach ($cf_group as $field_name => $field_value) : ?>
      <!-- ▽ ループ開始 ▽ -->
      <dl class="schedule_list">
        <dd><?php echo $field_value['schedule_date']; ?></dd>
        <dt><?php echo $field_value['schedule_time']; ?></dt>
        <dd><?php echo $field_value['schedule_place']; ?></dd>
        <dt><a href="<?php echo esc_url(home_url('/')); ?>">
            <?php echo $field_value['scehdule_reception']; ?></a></dt>
      </dl>
      <!-- △ ループ終了 △ -->
    <?php endforeach; ?>



  </div>
  <div class="schedule_btns">
    <a href="<?php echo esc_url(home_url('inquiry')); ?>" class="btn">お問い合わせはこちら</a>
    <a href="<?php echo esc_url(home_url('/')); ?>" class="btn">もっと見る</a>
  </div>
</section>