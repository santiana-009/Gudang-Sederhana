<?php
return [
    'page_format'           => 'A4',
    'page_orientation'      => 'P',
    'page_units'            => 'mm',
    'unicode'               => true,
    'encoding'              => 'UTF-8',
    'font_directory'        => '',
    'image_directory'       => '',
    'tcpdf_throw_exception' => true,
    'use_fpdi'              => true,
    'use_original_header'   => true,
    'use_original_footer'   => true,
    'pdfa'                  => false, // Options: false, 1, 3

    // See more info at the tcpdf_config.php file in TCPDF (if you do not set this here, TCPDF will use it default)
    // https://raw.githubusercontent.com/tecnickcom/TCPDF/master/config/tcpdf_config.php

    //    'path_main'           => '', // K_PATH_MAIN
    //    'path_url'            => '', // K_PATH_URL
       'header_logo'         => public_path('logo/pngwing.png'), // PDF_HEADER_LOGO
       'header_logo_width'   => '', // PDF_HEADER_LOGO_WIDTH
       'path_cache'          => 'a', // K_PATH_CACHE
       'blank_image'         => 'a', // K_BLANK_IMAGE
       'creator'             => 'Fadhil', // PDF_CREATOR
       'author'              => 'Fadhil', // PDF_AUTHOR
       'header_title'        => 'Information Technology', // PDF_HEADER_TITLE
       'header_string'       => 'Incoming - Outgoing materials & Equipmant Form', // PDF_HEADER_STRING
       'page_units'          => 'mm', // PDF_UNIT
       'margin_header'       => 5, // PDF_MARGIN_HEADER
       'margin_footer'       => 10, // PDF_MARGIN_FOOTER
       'margin_top'          => 27, // PDF_MARGIN_TOP
       'margin_bottom'       => 25, // PDF_MARGIN_BOTTOM
       'margin_left'         => 15, // PDF_MARGIN_LEFT
       'margin_right'        => 15, // PDF_MARGIN_RIGHT
       'font_name_main'      => 'times', // PDF_FONT_NAME_MAIN
       'font_size_main'      => 15, // PDF_FONT_SIZE_MAIN
       'font_name_data'      => 'times', // PDF_FONT_NAME_DATA
       'font_size_data'      => 12, // PDF_FONT_SIZE_DATA
       'foto_monospaced'     => 'courier', // PDF_FONT_MONOSPACED
       'image_scale_ratio'   => 1.25, // PDF_IMAGE_SCALE_RATIO
       'head_magnification'  => 1.1, // HEAD_MAGNIFICATION
       'cell_height_ratio'   => 1.25, // K_CELL_HEIGHT_RATIO
       'title_magnification' => 1.3, // K_TITLE_MAGNIFICATION
       'small_ratio'         => 2/3, // K_SMALL_RATIO
       'thai_topchars'       => true, // K_THAI_TOPCHARS
       'tcpdf_calls_in_html' => false, // K_TCPDF_CALLS_IN_HTML
       'timezone'            => 'UTC-8', // K_TIMEZONE
];
