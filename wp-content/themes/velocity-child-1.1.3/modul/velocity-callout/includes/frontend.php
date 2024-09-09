<div class="velocity-callout velocity-callout-<?= $id; ?>">
    <div class="row">
        <div class="col-4">
            <?php if ($settings->image_src) {
                echo '<img src="' . $settings->image_src . '" width="90"/>';
            } ?>
        </div>
        <div class="col-8 ps-3 pe-0">
            <div class="velocity-callout-content position-relative p-4">
                <?= $settings->content; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .velocity-callout-<?php echo $id; ?>.velocity-callout .velocity-callout-content {
        background-color: #<?= $settings->background_content; ?>;
        border-radius: 20px;
    }

    .velocity-callout-<?php echo $id; ?>.velocity-callout .velocity-callout-content:before {
        border-right: 30px solid #<?= $settings->background_content; ?>;
        content: "";
        position: absolute;
        width: 0;
        height: 0;
        border-top: 30px solid transparent;
        border-bottom: 30px solid transparent;
        top: 10px;
        left: -28px;
    }
</style>