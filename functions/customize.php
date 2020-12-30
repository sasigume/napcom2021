<?php
function sanitize_select_logo($input) {
  if($input == null ) {
    return 'dotcom';
  } else {
    return $input;
  }
}
function themeslug_customize_register($wp_customize)
{
  $wp_customize->add_section(
    'logo_section',
    array(
      'title' => __('ロゴ設定'),
      'priority' => '1',
      'description' => esc_html__('ロゴの設定をします'),
    )
  );

  $wp_customize->add_setting(
    'select_logo',
    array(
      'default' => 'dotcom',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_select_logo'
    )
  );

  $wp_customize->add_control(
    'select_logo',
    array(
      'label' => __('ロゴ'),
      'description' => esc_html__('ロゴを選んでください。'),
      'default' => 'dotcom',
      'section' => 'logo_section',
      'priority' => 1,
      'type' => 'radio',
      'choices' => array(
        'dotcom' => __( 'NAPOAN.COM' ),
        'nomaikura' => __( 'ナポアンのマイクラ' ),
        'manoikura' => __( 'ナポアンマのイクラ' ),
     )
    )
  );

  $wp_customize->add_setting(
    'fill_logo',
    array(
      'default' => '#000000',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );

  $wp_customize->add_control(
    'fill_logo',
    array(
      'label' => __('ロゴカラー'),
      'description' => esc_html__('ロゴの色。'),
      'default' => '#000000',
      'section' => 'logo_section',
      'priority' => 2,
      'type' => 'color',
    )
  );

  $wp_customize->add_setting(
    'content_underlogo',
    array(
      'default' => '',
      'transport' => 'refresh',
      'sanitize_callback' => 'wp_filter_nohtml_kses'
    )
  );

  $wp_customize->add_control(
    'content_underlogo',
    array(
      'label' => __('ロゴ下のテキスト'),
      'description' => esc_html__('ロゴの下に出ます'),
      'section' => 'logo_section',
      'priority' => 3, // Optional. Order priority to load the control. Default: 10
      'type' => 'text', // Can be either text, email, url, number, hidden, or date
      'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
      'input_attrs' => array( // Optional.
        'class' => 'my-custom-class',
        'style' => 'border: 1px solid rebeccapurple',
        'placeholder' => __('HTMLはダメ！'),
      ),
    )
  );

  // -----------------

  $wp_customize->add_section(
    'list_section',
    array(
      'title' => __('記事一覧設定'),
      'priority' => '2',
      'description' => esc_html__('記事一覧の設定をします'),
    )
  );

  $wp_customize->add_setting(
    'bg_author',
    array(
      'default' => '#f3f4f6', // TWのgray-100
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );

  $wp_customize->add_control(
    'bg_author',
    array(
      'label' => __('筆者背景'),
      'description' => esc_html__('筆者の背景の色。'),
      'section' => 'list_section',
      'priority' => 1,
      'type' => 'color',
    )
  );

  $wp_customize->add_setting(
    'color_author',
    array(
      'default' => '#000000',
      'transport' => 'refresh',
      'sanitize_callback' => 'sanitize_hex_color'
    )
  );

  $wp_customize->add_control(
    'color_author',
    array(
      'label' => __('筆者文字'),
      'description' => esc_html__('筆者の文字の色。'),
      'section' => 'list_section',
      'priority' => 1,
      'type' => 'color',
    )
  );
}
add_action('customize_register', 'themeslug_customize_register');
