
<footer id="footer" class="footer">

  <div class="footer-content position-relative">
    <div class="container">
      <div class="row">

        <div class="col-lg-4 col-md-6">
          <?php if (is_active_sidebar('sidebar-footer-info')) : ?>
            <?php dynamic_sidebar('sidebar-footer-info'); ?>
          <?php else : ?>
            <div class="footer-info">
              <h3>J Filho Engenharia</h3>
              <p>
                Rua São Paulo, 189<br>
                Pituba, Salvador, BA<br><br>
                <strong><?php esc_html_e('Telefone:', 'jotafilho'); ?></strong> 71 99923-8125<br>
                <strong><?php esc_html_e('Email:', 'jotafilho'); ?></strong> jambofilho@uol.com.br<br>
              </p>
            </div>
          <?php endif; ?>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><?php esc_html_e('Links', 'jotafilho'); ?></h4>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer-links-1',
            'container'      => false,
            'fallback_cb'    => false,
            'items_wrap'     => '<ul>%3$s</ul>',
          ]);
          ?>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4><?php esc_html_e('Nossos serviços', 'jotafilho'); ?></h4>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer-services',
            'container'      => false,
            'fallback_cb'    => false,
            'items_wrap'     => '<ul>%3$s</ul>',
          ]);
          ?>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-legal text-center position-relative">
    <div class="container">
      <div class="copyright">
        &copy; <?php echo esc_html(date('Y')); ?> <?php esc_html_e('Todos os direitos reservados', 'jotafilho'); ?> <strong><span>J Filho Engenharia</span></strong>.
      </div>
      <div class="credits">
        Desenhado por <a href="https://banddeiragroup.com.br/">BandeiraGroup Web & Design</a>
      </div>
    </div>
  </div>

</footer>

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<?php wp_footer(); ?>

</body>
</html>