<?php

/**
 * Kumpulan shortcode yang digunakan di theme ini.
 */
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
//[resize-thumbnail width="300" height="150" linked="true" class="w-100"]
add_shortcode('resize-thumbnail', 'resize_thumbnail');
function resize_thumbnail($atts)
{
    ob_start();
    global $post;
    $atribut = shortcode_atts(array(
        'output'    => 'image', /// image or url
        'width'        => '300', ///width image
        'height'    => '150', ///height image
        'crop'      => 'false',
        'upscale'       => 'true',
        'linked'       => 'true', ///return link to post	
        'class'       => 'w-100', ///return class name to img	
        'attachment'     => 'true'
    ), $atts);

    $output            = $atribut['output'];
    $attach         = $atribut['attachment'];
    $width          = $atribut['width'];
    $height         = $atribut['height'];
    $crop           = $atribut['crop'];
    $upscale        = $atribut['upscale'];
    $linked            = $atribut['linked'];
    $class            = $atribut['class'] ? 'class="' . $atribut['class'] . '"' : '';
    $urlimg            = get_the_post_thumbnail_url($post->ID, 'full');

    if (empty($urlimg) && $attach == 'true') {
        $attachments = get_posts(array(
            'post_type'         => 'attachment',
            'posts_per_page'     => 1,
            'post_parent'         => $post->ID,
            'orderby'          => 'date',
            'order'            => 'DESC',
        ));
        if ($attachments) {
            $urlimg = wp_get_attachment_url($attachments[0]->ID, 'full');
        }
    }

    if ($urlimg) :
        $urlresize      = aq_resize($urlimg, $width, $height, $crop, true, $upscale);
        if ($output == 'image') :
            if ($linked == 'true') :
                echo '<a href="' . get_the_permalink($post->ID) . '" title="' . get_the_title($post->ID) . '">';
            endif;
            echo '<img src="' . $urlresize . '" width="' . $width . '" height="' . $height . '" loading="lazy" ' . $class . '>';
            if ($linked == 'true') :
                echo '</a>';
            endif;
        else :
            echo $urlresize;
        endif;

    else :
        if ($linked == 'true') :
            echo '<a href="' . get_the_permalink($post->ID) . '" title="' . get_the_title($post->ID) . '">';
        endif;
        echo '<svg style="background-color: #ececec;width: 100%;height: auto;" width="' . $width . '" height="' . $height . '"></svg>';
        if ($linked == 'true') :
            echo '</a>';
        endif;
    endif;

    return ob_get_clean();
}

//[excerpt count="150"]
add_shortcode('excerpt', 'vd_getexcerpt');
function vd_getexcerpt($atts)
{
    ob_start();
    global $post;
    $atribut = shortcode_atts(array(
        'count'    => '150', /// count character
    ), $atts);

    $count        = $atribut['count'];
    $excerpt    = get_the_content();
    $excerpt     = strip_tags($excerpt);
    $excerpt     = substr($excerpt, 0, $count);
    $excerpt     = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt     = '' . $excerpt . '...';

    echo $excerpt;

    return ob_get_clean();
}

// [vd-breadcrumbs]
add_shortcode('vd-breadcrumbs', 'vd_breadcrumbs');
function vd_breadcrumbs()
{
    ob_start();
    echo justg_breadcrumb();
    return ob_get_clean();
}

//[ratio-thumbnail size="medium" ratio="16:9"]
add_shortcode('ratio-thumbnail', 'ratio_thumbnail');
function ratio_thumbnail($atts)
{
    ob_start();
    global $post;

    $atribut = shortcode_atts(array(
        'size'      => 'medium', // thumbnail, medium, large, full
        'ratio'     => '16:9', // 16:9, 8:5, 4:3, 3:2, 1:1
    ), $atts);

    $size       = $atribut['size'];
    $ratio      = $atribut['ratio'];
    $ratio      = $ratio ? str_replace(":", "-", $ratio) : '';
    $urlimg     = get_the_post_thumbnail_url($post->ID, $size);

    echo '<div class="ratio-thumbnail">';
    echo '<a class="ratio-thumbnail-link" href="' . get_the_permalink($post->ID) . '" title="' . get_the_title($post->ID) . '">';
    echo '<div class="ratio-thumbnail-box ratio-thumbnail-' . $ratio . '" style="background-image: url(' . $urlimg . ');">';
    echo '<img src="' . $urlimg . '" loading="lazy" class="ratio-thumbnail-image"/>';
    echo '</div>';
    echo '</a>';
    echo '</div>';

    return ob_get_clean();
}


function tglpos($atts)
{
    global $post;
    $atribut = shortcode_atts(array(
        'post_id' => $post->ID,
        'hari' => 'yes',
        'waktu' => 'yes',
    ), $atts);
    $post_id = $atribut['post_id'];
    $att_hari = $atribut['hari'];
    $att_waktu = $atribut['waktu'];
    $day = get_the_date('N', $post_id);
    $tgl = get_the_date('j', $post_id);
    $month = get_the_date('n', $post_id);
    $year = get_the_date('Y', $post_id);
    $hari = array(1 => 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $bulan = array(1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    if ($att_hari == 'yes') {
        $tampil_hari = $hari[$day] . ', ';
    } else {
        $tampil_hari = '';
    }
    if ($att_waktu == 'yes') {
        $tampil_waktu = ' ' . get_the_date('h:i', $post_id) . ' WIB';
    } else {
        $tampil_waktu = '';
    }

    $html = $tampil_hari . $tgl . ' ' . $bulan[$month] . ' ' . $year . $tampil_waktu;
    return $html;
}
add_shortcode('tanggal-pos', 'tglpos');

// [modal-pemesanan]
add_shortcode('modal-pemesanan', 'modal_pemesanan');
function modal_pemesanan()
{
    ob_start();
?>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-light text-dark btn-pemesanan" data-bs-toggle="modal" data-bs-target="#pemesanan">
        Info Lebih Lajut
    </button>

<?php return ob_get_clean();
}

function pemesanan()
{
    ob_start();
    $id = get_the_ID();
    $link_pemesanan = array(
        'whatsapp' => get_post_meta($id, 'pemesanan_wa', true) ? get_post_meta($id, 'pemesanan_wa', true) . '?text=Saya%20ingin%20tahu%20tentang%20produk%20' . get_the_title() : '',
        'shopee'   => get_post_meta($id, 'pemesanan_shopee', true),
        'tokopedia'   => get_post_meta($id, 'pemesanan_tokopedia', true),
        'lazada'   => get_post_meta($id, 'pemesanan_lazada', true),
        'bukalapak'   => get_post_meta($id, 'pemesanan_bukalapak'),
    ); ?>
    <div class="modal fade" id="pemesanan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Pemesanan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="pemesanan">
                        <div class="row">
                            <?php foreach ($link_pemesanan as $key => $value) { ?>
                                <?php if ($value) { ?>
                                    <div class="col-md-4 col-6">
                                        <div class="border rounded m-2 p-3 text-center">
                                            <a href="<?= $value; ?>" target="_blank">
                                                <img src="<?= get_stylesheet_directory_uri(); ?>/images/photo-<?= $key; ?>.png" width="50" />
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php return ob_get_clean();
}
add_shortcode('pemesanan', 'pemesanan');

function velocity_product_loop($atts)
{
    ob_start();
    $atribut = shortcode_atts(array(
        'kategori' => '',
    ), $atts);

    $kategori = $atribut['kategori'];

    $args = array(
        'post_type' => 'produk',
        'posts_per_page' => 6,  // Set post type to 'produk'
        'tax_query' => array(
            array(
                'taxonomy' => 'kategori',  // Set taxonomy to 'kategori'
                'field'    => 'slug',      // Use field 'slug'
                'terms'    => $kategori,   // Set term according to the given category slug
            ),
        ),
    );
    $query = new WP_Query($args);

    if ($query->have_posts()) {

        echo '<div class="velocity-product-loop row">';
        $term = get_term_by('slug', $kategori, 'kategori');
        $link_kategori = get_term_link($term);
        while ($query->have_posts()) {
            $query->the_post();
    ?>
            <div class="col-md-4 px-4 mb-3">
                <div class="row card-loop">
                    <div class="col-6 ps-4">
                        <div class="fl-post-text fw-bold">
                            <h2 class="fl-post-title"><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h2>
                        </div>
                        <div class="cat-post fw-bold">
                            <a href="<?php echo esc_url($link_kategori); ?>"><?php echo $term->name; ?></a>
                        </div>
                        <div class="btn-produk mt-4">
                            <a href="<?php echo get_the_permalink(); ?>" class="lihat-produk bg-warning fw-bold text-white">
                                Lihat Produk
                            </a>
                        </div>
                    </div>
                    <div class="col-6 px-0">
                        <div class="fl-post-image">
                            <?php
                            $thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'full');
                            if ($thumbnail) {
                                echo '<img class="w-100" src="' . esc_url($thumbnail) . '"/>';
                            } else {
                                echo '<svg style="background-color: #ececec;width: 100%;height: auto;"></svg>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

    <?php
        }
        echo '</div>';
        wp_reset_postdata(); // Reset post data
    } else {
        // If no posts found
        echo '<div class="alert alert-warning">Belum ada produk.</div>';
    }

    // Return the result
    return ob_get_clean();
}
add_shortcode('velocity-product-loop', 'velocity_product_loop'); // Register shortcode

function velocity_post_like()
{
    ob_start();
    $id = get_the_ID();
    $post_like = get_post_meta($id, 'jumlah_like', true) ? get_post_meta($id, 'jumlah_like', true) : 0; ?>
    <div class="post-like d-flex">
        <i class="fas fa-heart text-danger me-2 post-like-button"></i> <?= $post_like; ?> Orang menyukai postingan ini
    </div>
    <script>
        jQuery(function($) {
            $('.post-like-button').on('click', function() {
                $.ajax({
                    type: "POST",
                    data: "action=daftar&" + datas,
                    url: ajaxurl,
                    success: function(data) {
                        $(".hasil-daftar").html(data);
                        $(".loadd").html('<i class="fa fa-check"></i>');
                    }
                })
            })
        });
    </script>
<?php return ob_get_clean();
}
add_shortcode('velocity-post-like', 'velocity_post_like');
