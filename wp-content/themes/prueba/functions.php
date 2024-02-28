<?php
// Enqueue Normalize.css
function add_normalize_css() {
  wp_enqueue_style('normalize-styles', "https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css");
}
add_action('wp_enqueue_scripts', 'add_normalize_css');

// Load jQuery from CDN
function load_jquery() {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true);
    wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'load_jquery');

// Ajax action to filter users
add_action('wp_ajax_filter_users', 'filter_users_callback');
add_action('wp_ajax_nopriv_filter_users', 'filter_users_callback');

function filter_users_callback() {
  $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';

  // Get users
  $users = get_option('simulated_users');

  // Filtered users
  $filtered_users = array_filter($users, function ($user) use ($keyword) {
      return strpos(strtolower($user['name']), strtolower($keyword)) !== false
          || strpos(strtolower($user['surname1']), strtolower($keyword)) !== false
          || strpos(strtolower($user['surname2']), strtolower($keyword)) !== false
          || strpos(strtolower($user['email']), strtolower($keyword)) !== false;
  });

  // Filtered users in json
  wp_send_json_success(array_values($filtered_users));
  wp_die();
}

// Generate simulated users
function generate_simulated_users() {
  $users = array();

  for ($i = 1; $i <= 40; $i++) {
    $username = 'user_' . $i;
    $name = 'Nombre_' . $i;
    $surname1 = 'Apellido1_' . $i;
    $surname2 = 'Apellido2_' . $i;
    $email = 'user' . $i . '@mail.com';

    $user_data = array(
      'username'  => $username,
      'name'      => $name,
      'surname1'  => $surname1,
      'surname2'  => $surname2,
      'email'     => $email,
    );

    array_push($users, $user_data);
  }

  return $users;
}

// Add simulated users
add_action('init', 'add_simulated_users');

function add_simulated_users() {
  $users = generate_simulated_users();
  update_option('simulated_users', $users);
}
