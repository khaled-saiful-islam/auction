<?php
if (isset($home['slider']) && $home['slider']) {
    $sliders = $this->Common->findSlider(1);
    ?>
    <div id="fwslider">
        <div class="slider_container">
            <?php
            $cnt = 0;
            foreach ($sliders as $slider) {
                ?>
                <div class="slide">
                    <?php echo $this->Html->image('uploaded_images/sliders/' . $slider['image_path'], ['alt' => "Slider Image"]); ?>
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <h4 class="title"><?php echo $slider['title']; ?></h4>
                            <p class="description"><?php echo $slider['description']; ?></p>
                        </div>
                    </div>
                </div>
                <?php
                $cnt++;
            }

            if ($cnt == 0) {
                ?>
                <div class="slide">
                    <?php echo $this->Html->image('banner.jpg', ['alt' => ""]); ?>
                    <div class="slide_content">
                        <div class="slide_content_wrap">
                            <h4 class="title">Slider </h4>
                            <p class="description">Test data</p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <div class="timers"></div>
        <div class="slidePrev"><span></span></div>
        <div class="slideNext"><span></span></div>
    </div>
<?php } ?>