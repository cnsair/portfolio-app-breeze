<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ 'Chisom Samson | ' .env('APP_NAME') }}</title>
  <meta content="a seasoned PHP laravel software engineer" name="description">
  <meta content="software engineer, web developer, php, sql, javascript, laravel, css, html" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/moi-favicon.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Custom File -->
    <link href="assets/css/custom.css" rel="stylesheet">

    <!-- =======================================================
    * Developer: Chisom Samson Nwachukwu
    ======================================================== -->
</head>

<body>

   

  <!-- ======= Header ======= -->
  <header id="header">
    <div class="container">

      <h1><a href="#index.html">Chisom Samson Nwachukwu</a></h1>
      <h2>I am a <span>Software Engineer, PHP (Laravel)</span> from Nigeria</h2>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#header">Home</a></li>
          <li><a class="nav-link" href="#about">About</a></li>
          <li><a class="nav-link" href="#resume">Resume</a></li>
          <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link" href="#testimonial">Testimonials</a></li>
          <li><a class="nav-link" href="#contact">Contact Me</a></li>
		  <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <div class="social-links">
        <a target="_blank" href="https://g.dev/cnsair" class="google"><i class="bi bi-google"></i></a>
        <a target="_blank" href="https://t.me/cnsair/" class="telegram"><i class="bi bi-telegram"></i></a>
        <a target="_blank" href="https://instagram.com/cnsair" class="instagram"><i class="bi bi-instagram"></i></a>
        <a target="_blank" href="https://twitter.com/cnsair" class="twitter"><i class="bi bi-twitter"></i></a>
        <a target="_blank" href="https://facebook.com/samson.chisom/" class="facebook"><i class="bi bi-facebook"></i></a> 
        <a target="_blank" href="https://www.github.com/cnsair" class="github"><i class="bi bi-github"></i></a>
        <a target="_blank" href="https://www.linkedin.com/in/samson-chisom/" class="linkedin"><i class="bi bi-linkedin"></i></a>
        <a target="_blank" href="https://www.reddit.com/user/cnsair" class="reddit"><i class="bi bi-reddit"></i></a>
      </div>
    </div>
  </header><!-- End Header -->




   <!-- ======= About Section ======= -->
  <section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

        <div class="section-title">
            <h2>About</h2>
            <p>Learn more about me!</p>
        </div>

        <div class="row">
          <div class="col-lg-4" data-aos="fade-right">
            <img style="border-radius: 50%;" height="100%" width="100%" src="assets/img/moi_1.jpg" class="img-fluid" alt="">
          </div>

          @forelse ($summary_section as $summary)

            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
              <h3>Software Engineer &amp; Graphic Designer</h3>
              <p class="fst-italic">
                  Hello, I am {{ $summary->myname }}...<br/>

                  {{ $summary->biography }}
              </p>
              <div class="row">
                  <div class="col-lg-6">
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>March 8</span></li>
                        <li><i class="bi bi-chevron-right"></i> <strong>Website:</strong> <span><a
                            href="#">chisomsamson.me</a></span></li>
                        <li><i class="bi bi-chevron-right"></i> 
                          <strong>WhatsApp:</strong>
                          @php
                            $phone = $summary->phone;
                            $exp_phone = explode("|", "$phone" );
                          @endphp

                          @foreach ( $exp_phone as $phone )
                            <span>
                                <a target="_blank" href="https://wa.me/{{ $phone }}">{{ $phone }}</a>
                            </span>
                          @endforeach
                        </li>
                        <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> 
                          <span><a href="#">{{ $summary->address }}</a></span>
                        </li>
                    </ul>
                  </div>
                  <div class="col-lg-6">
                  <ul>
                      <li><i class="bi bi-chevron-right"></i> <strong>Profession:</strong> <span>Software engineer</span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Degrees:</strong> <span>Information Technology,<br/> Computer Science</span></li>
                      <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span><a
                          href="mailto:{{ $summary->email }}">{{ $summary->email }}</a></span>
                      </li>

                  </ul>
                  </div>
              </div>
              <p>
                  Currently a Technical Co-founder at Africa Blockchain Consortium & Digital Economy. I’m interested in Blockchain, ML, AI, Advanced Algorithms.
              </p>
              <p>
                  I am also interested in Cyber Security and I like to play with Hardware. <br>
                  Feel free to reach out for any inquiry.
              </p>
                  
            </div>
            
          @empty
              <p>Nothing. Please check back</p>
          @endforelse

        </div>

    </div><!-- End About Me -->






    <!-- ======= Counts ======= -->
    <div class="counts container">

        <div class="row">

            <div class="col-lg-3 col-md-6">
              <div class="count-box">
                  <i class="bi bi-emoji-smile"></i>
                  <span data-purecounter-start="0" data-purecounter-end="23" data-purecounter-duration="4"
                  class="purecounter"></span>
                  <p>Happy Clients</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
              <div class="count-box">
                  <i class="bi bi-journal-richtext"></i>
                  <span data-purecounter-start="0" data-purecounter-end="35" data-purecounter-duration="3"
                  class="purecounter"></span>
                  <p>Projects</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                  <i class="bi bi-headset"></i>
                  <span data-purecounter-start="0" data-purecounter-end="7" data-purecounter-duration="3"
                  class="purecounter"></span>
                  <p>Years Of Support</p>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
              <div class="count-box">
                  <i class="bi bi-award"></i>
                  <span data-purecounter-start="0" data-purecounter-end="5" data-purecounter-duration="4"
                  class="purecounter"></span>
                  <p>Awards</p>
              </div>
            </div>

        </div>

    </div><!-- End Counts -->




    <!-- ======= Skills  ======= -->
    <div class="skills container">

        <div class="section-title">
            <h2>Skills</h2>
        </div>

        <div class="row skills-content">

            <div class="col-lg-6">

              <div class="progress">
                  <span class="skill">PHP <i class="val">99%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">SQL <i class="val">85%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">HTML <i class="val">98%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">CSS <i class="val">85%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">JavaScript <i class="val">60%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">Laravel <i class="val">50%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

            </div>

            <div class="col-lg-6">

              <div class="progress">
                  <span class="skill">CorelDraw <i class="val">99%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="99" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">Adobe Photoshop <i class="val">75%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">Adobe Illustrator<i class="val">50%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

              <div class="progress">
                  <span class="skill">Adobe After Effect<i class="val">80%</i></span>
                  <div class="progress-bar-wrap">
                  <div class="progress-bar" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
                  </div>
                  </div>
              </div>

            </div>

        </div>

    </div><!-- End Skills -->







    <!-- ======= Interests ======= -->
    <div class="interests container">

      <div class="section-title">
        <h2>Interests</h2>
      </div>

      <div class="row">
        <div class="col-lg-3 col-md-4">
          <div class="icon-box">
            <i class="ri-cloud-line" style="color: #ffbb2c;"></i>
            <h3>Cloud Computing</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-github-fill" style="color: #e361ff;"></i>
            <h3>Git</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
          <div class="icon-box">
            <i class="ri-database-2-line" style="color: #47aeff;"></i>
            <h3>Databases</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
          <div class="icon-box">
            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
            <h3>Data Analytics</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-ubuntu-line" style="color: #e80368;"></i>
            <h3>Linux Ubuntu OS</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-windows-line" style="color: #11dbcf;"></i>
            <h3>Windows OS</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-google-line" style="color: #ffa76e;"></i>
            <h3>Google Products</h3>
          </div>
        </div>

        <div class="col-lg-3 col-md-4 mt-4">
          <div class="icon-box">
            <i class="ri-fingerprint-2-line" style="color: #4233ff;"></i>
            <h3>Authentication Systems</h3>
          </div>
        </div>

      </div>

    </div><!-- End Interests -->

  </section><!-- End About Section -->







    





  <!-- ======= Resume Section ======= -->
  <section id="resume" class="resume">
    <div class="container">

      <div class="section-title">
        <h2>Resume</h2>
        <p>Check My Resume</p>
      </div>

      <div class="row">
        <div class="col-lg-6">
          <h3 class="resume-title">Sumary</h3>

          @forelse ($summary_section as $summary)

            <div class="resume-item pb-0">
              <h4>{{ $summary->myname }}</h4>
              <p>
                <em>{{ $summary->biography }}</em>
              </p>
              <p>
              <ul>
                <li>{{ $summary->address }}</li>
                <li>{{ $summary->phone }}</li>
                <li>{{ $summary->email }}</li>
              </ul>
              </p>
            </div>
            
          @empty
              <p>Nothing. Please check back</p>
          @endforelse


          <h3 class="resume-title">Education</h3>

          @forelse ($education_section as $education)

            <div class="resume-item">
              <h4>
                @if ( $education->status == 1 )
                    Attending College 
                @else
                    Graduated College
                @endif
              </h4>
              <h5>{{ $education->date }}</h5>
              <p><em>{{ $education->course }}</em></p>
              <p><em>{{ $education->school }}</em></p>
              <p>
                <ul>
                  @php
                      $edu = $education->activity;
                      $explode = explode('|', $edu);
                  @endphp

                  @foreach ( $explode as $edu )
                      <li>{{ $edu }}</li>
                  @endforeach
                </ul>
              </p>
            </div>
            
          @empty
              <p>Nothing. Please check back</p>
          @endforelse
          
        </div><!-- col-lg-6 -->


        <div class="col-lg-6">
          <h3 class="resume-title">Professional Experience</h3>

          @forelse ( $experience_section as $experience )
		  
            <div class="resume-item">
              <h4>{{ $experience->role }}</h4>
              <h5>{{ $experience->date }}</h5>
              <p><em>{{ $experience->location }}</em></p>
              <p>
                <ul>
                  @php
                      $pro = $experience->activity;
                      $explode = explode('|', $pro);
                  @endphp

                  @foreach ( $explode as $prof )
                      <li>{{ $prof }}</li>
                  @endforeach
                </ul>
              </p>
            </div>
            
          @empty
            <p>Nothing. Please check back</p>
          @endforelse
		  
        </div>
        
        <!-- ==================================
                        RESUME SECTION 
        ======================================-->
        @forelse ( $resume_section as $resume )

          <div class="resume-item">
            <h6>{{ $resume->title }}</h6>
            
            @php
                $file = $resume->file;
                $file_url = \Illuminate\Support\Facades\Storage::url("$file");
                $file_ext = pathinfo($file, PATHINFO_EXTENSION);
            @endphp
          
            @if ( $file_ext == 'pdf' || $file_ext == 'docx' )
                <a href="{{ $file_url }}" class="text-center" download >
                  <button type="button">Download Resume</button>
                </a>
            @endif
          </div>
        @empty
          <p>Nothing. Please check back</p>
        @endforelse

      </div>

    </div>
  </section><!-- End Resume Section -->






  





  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container">

      <div class="section-title">
        <h2>Portfolio</h2>
        <p>My Works</p>
      </div>

      <div class="row">
        <div class="col-lg-12 d-flex justify-content-center">
          <ul id="portfolio-flters">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-web">Web</li>
            <li data-filter=".filter-graphics">Graphics</li>
            <li data-filter=".filter-others">Others</li>
          </ul>
        </div>
      </div>

      <div class="row portfolio-container">

        @forelse ($portfolio_section as $portfolio)
 
          @php
              $file = $portfolio->file;
              $file_url = \Illuminate\Support\Facades\Storage::url("$file");
              $file_ext = pathinfo($file, PATHINFO_EXTENSION);
          @endphp

          <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $portfolio->project }}">
            <div class="portfolio-wrap">
        
              @if ( $file_ext == 'pdf' )
                <img src="assets/img/portfolio/portfolio-7.jpg" class="img-fluid" alt="Image not available">
              @else
                <img src="{{ $file_url }}" class="img-fluid" alt="{{ $portfolio->name }}">
              @endif

              <div class="portfolio-info">
                <h4>{{ $portfolio->name }}</h4>
                <p>{{ $portfolio->project }}</p>
                <div class="portfolio-links">

                  @if ( $file_ext == 'pdf' )
                    <!-- do nothing -->
                  @else
                    <a href="{{ $file_ext == "pdf" ? "#Not an image" : $file_url }}" data-gallery="portfolioGallery" target="_blank" class="portfolio-lightbox" title="{{ $portfolio->name }}"><i class="bx bx-plus"></i></a>
                  @endif

                  <a href="{{ $portfolio->web_address ? $portfolio->web_address : "#No web address" }}" target="_blank" data-gallery="portfolioDetailsGallery" data-glightbox="type: external"
                    class="portfolio-details-lightbox" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div>
          
        @empty
            <p>Nothing. Please check back</p>
        @endforelse

      </div>

    </div>
  </section><!-- End Portfolio Section -->








    





  <!-- ======= Resume Section ======= -->
  <section id="testimonial" class="resume">
    <div class="container"></div>



    <!-- ======= Testimonials ======= -->
    <div class="testimonials container">

      <div class="section-title">
        <h2>Testimonials</h2>
      </div>

      <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper-wrapper">

          @forelse ($testimony_section as $testimony)
        
            <div class="swiper-slide">
              <div class="testimonial-item">
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  {{ $testimony->message }}
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
                <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>{{ $testimony->name }}</h3>
                <h4> {{ $testimony->comp_position }} </h4>
              </div>
            </div><!-- End testimonial item -->

          
          @empty
            <p>Nothing. Please check back</p>
          @endforelse

        </div>
        <div class="swiper-pagination"></div>
      </div>

      <div class="owl-carousel testimonials-carousel"></div>

    </div><!-- End Testimonials  -->


    <div class="text-center">
      <a href="{{ route('testimony') }}"> 
        <button type="button">Give a testimony!</button>
      </a>
    </div>

  </section><!-- End Portfolio Section -->





  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container">

      <div class="section-title">
        <h2>Contact</h2>
        <p>Contact Me</p>
      </div>

      @forelse ($summary_section as $summary)

        <div class="row mt-2">
        
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="info-box">
              <i class="bx bx-map"></i>
              <h3>My Address</h3>
              <p> <a href="#">{{ $summary->address }}</a></p>
            </div>
          </div>

          <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
            <div class="info-box">
              <i class="bx bx-share-alt"></i>
              <h3>Social Profiles</h3>
              <div class="social-links">
                <a target="_blank" href="https://g.dev/cnsair" class="google"><i class="bi bi-google"></i></a>
                <a target="_blank" href="https://t.me/cnsair/" class="telegram"><i class="bi bi-telegram"></i></a>
                <a target="_blank" href="https://instagram.com/cnsair" class="instagram"><i class="bi bi-instagram"></i></a>
                <a target="_blank" href="https://twitter.com/cnsair" class="twitter"><i class="bi bi-twitter"></i></a>
                <a target="_blank" href="https://facebook.com/samson.chisom/" class="facebook"><i class="bi bi-facebook"></i></a> 
                <a target="_blank" href="https://www.github.com/cnsair" class="github"><i class="bi bi-github"></i></a>
                <a target="_blank" href="https://www.linkedin.com/in/samson-chisom/" class="linkedin"><i class="bi bi-linkedin"></i></a>
                <a target="_blank" href="https://www.reddit.com/user/cnsair" class="reddit"><i class="bi bi-reddit"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 mt-4 d-flex align-items-stretch">
            <div class="info-box">
              <i class="bx bx-envelope"></i>
              <h3>Email Me</h3>
              <p><a href="mailto:{{ $summary->email }}">{{ $summary->email }}</a></p>
            </div>
          </div>

          <div class="col-md-6 mt-4 d-flex align-items-stretch">
            <div class="info-box">
              <i class="bx bx-phone-call"></i>
              <h3>Call Me</h3>

              @php
                $phone = $summary->phone;
                $exp_phone = explode("|", "$phone" );
              @endphp

              @foreach ( $exp_phone as $phone )
                <p><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
              @endforeach

            </div>
          </div>

        </div>

      @empty
          <p>Nothing. Please check back</p>
      @endforelse

    </div><!-- container -->


    <div class="text-center">
      <a href="{{ route('hire') }}"> 
        <button type="button">Hire or reach out to me!</button>
      </a>
    </div>


  </section><!-- End Contact Section -->






  <footer>
      <div class="credits">
        <p>&copy; 2024. Developed by <a href="#">Yours Truly (Me)</a> with Laravel. UI by the amazing  <a href="#">Mahmudur Rahman Labib</a></p>
      </div>
  </footer>





  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.html"></script>
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
