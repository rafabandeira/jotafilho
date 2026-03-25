<?php require_once 'header.php'; ?>

<main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('/assets/img/hero-carousel/hero-carousel-1.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center" data-aos="fade">

    <h2>Contato</h2>
    <ol>
      <li><a href="/">Home</a></li>
      <li>Contato</li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="row gy-4">
      <div class="col-lg-6">
        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
          <i class="bi bi-map"></i>
          <h3>Endereço</h3>
          <p>Rua São Paulo, 189, Pituba, Salvador, BA</p>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3 col-md-6">
        <div class="info-item d-flex flex-column justify-content-center align-items-center">
          <i class="bi bi-envelope"></i>
          <h3>E-mail</h3>
          <p>jambofilho@uol.com.br</p>
        </div>
      </div><!-- End Info Item -->

      <div class="col-lg-3 col-md-6">
        <div class="info-item  d-flex flex-column justify-content-center align-items-center">
          <i class="bi bi-telephone"></i>
          <h3>Telefone</h3>
          <p>71 99923-8125</p>
        </div>
      </div><!-- End Info Item -->

    </div>

    <div class="row gy-4 mt-1">

      <div class="col-lg-6 ">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3887.4945313507433!2d-38.46087638473492!3d-13.004149090834584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7161b6429d36191%3A0xd0da8f6f8e0425ff!2sR.%20S%C3%A3o%20Paulo%2C%20189%20-%20Pituba%2C%20Salvador%20-%20BA%2C%2041830-180%2C%20Brazil!5e0!3m2!1sen!2sbg!4v1660164303292!5m2!1sen!2sbg" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
      </div><!-- End Google Maps -->
      
      <div class="col-lg-6">
        <form action="/forms/contact.php" method="post" role="form" class="php-email-form">
          <div class="row gy-4">
            <div class="col-lg-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
            </div>
            <div class="col-lg-6 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
            </div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
          </div>
          <div class="my-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your message has been sent. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Send Message</button></div>
        </form>
      </div><!-- End Contact Form -->
      
    </div>

  </div>
</section><!-- End Contact Section -->

</main><!-- End #main -->

<script>document.getElementById('contato').classList.add('active')</script>

<?php require_once 'footer.php'; ?>