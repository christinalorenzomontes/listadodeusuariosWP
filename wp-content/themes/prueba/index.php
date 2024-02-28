<?php get_header(); ?>

<main id="main" class="site-main" role="main">
  <section class="users-list">
    <div class="container">
      <form id="user-search-form" class="user-search-form">
        <p>¡Puedes buscar por nombre, apellidos o mail!</p>
          <input type="text" id="search-keyword" name="search-keyword" placeholder="Buscar por nombre, apellido o email">
          <button type="submit">Buscar</button>
      </form>
      <div id="user-list-container">
        <?php $users = get_option('simulated_users');
          if ($users) {
            $users_per_page = 5;
            $total_users = count($users);
            $total_pages = ceil($total_users / $users_per_page);
            $current_page = isset($_GET['paged']) ? max(1, intval($_GET['paged'])) : 1;

            $start_index = ($current_page - 1) * $users_per_page;
            $end_index = min($start_index + $users_per_page, $total_users);

            echo '<table>';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Usuario</th>';
            echo '<th>Nombre</th>';
            echo '<th>Apellido1</th>';
            echo '<th>Apellido2</th>';
            echo '<th>Correo Electrónico</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            for ($i = $start_index; $i < $end_index; $i++) {
              $user = $users[$i];
              echo '<tr>';
              echo '<td class="td">' . $user['username'] . '</td>';
              echo '<td class="td">' . $user['name'] . '</td>';
              echo '<td class="td">' . $user['surname1'] . '</td>';
              echo '<td class="td">' . $user['surname2'] . '</td>';
              echo '<td class="td">' . $user['email'] . '</td>';
              echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';

            if ($total_pages > 1) {
              echo '<div class="pagination">';
              echo '<span class="pagination-links">';
              if ($current_page > 1) {
                echo '<a href="?paged=' . ($current_page - 1) . '">Anterior</a>';
              }
              echo '<span class="current-page">Página ' . $current_page . ' de ' . $total_pages . '</span>';
              if ($current_page < $total_pages) {
                echo '<a href="?paged=' . ($current_page + 1) . '">Siguiente</a>';
              }
              echo '</span>';
              echo '</div>';
            }
          } else {
            echo 'No hay usuarios para mostrar.';
          }
          ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>

<script>
  jQuery(document).ready(function($) {
      $('#user-search-form').submit(function(event) {
        event.preventDefault();
        var searchKeyword = $('#search-keyword').val().trim();
        if (searchKeyword !== '') {
            filterUsers(searchKeyword);
        } else {
            getInitialUserList();
        }
      });

      function filterUsers(keyword) {
        $.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'filter_users',
            keyword: keyword
          },
          success: function(response) {
            renderUserList(response.data);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }

      function getInitialUserList() {
        $.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            action: 'get_users_list'
          },
          success: function(response) {
            renderUserList(response.data);
          },
          error: function(xhr, status, error) {
            console.error(error);
          }
        });
      }

      function renderUserList(users) {
        var userListContainer = $('#user-list-container');
        userListContainer.empty();
        var html = '<table>';
        html += '<thead><tr><th>Usuario</th><th>Nombre</th><th>Apellido1</th><th>Apellido2</th><th>Correo Electrónico</th></tr></thead>';
        html += '<tbody>';
        users.forEach(function(user) {
            html += '<tr>';
            html += '<td>' + user.username + '</td>';
            html += '<td>' + user.name + '</td>';
            html += '<td>' + user.surname1 + '</td>';
            html += '<td>' + user.surname2 + '</td>';
            html += '<td>' + user.email + '</td>';
            html += '</tr>';
        });
        html += '</tbody></table>';
        userListContainer.append(html);
      }
  });
</script>
