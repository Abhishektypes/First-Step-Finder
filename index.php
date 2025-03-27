<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sustainable Living Guide</title>
    <link rel="stylesheet" href="styles2.css">
    <!-- Bootstrap CSS for the modal -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container d-flex justify-content-between align-items-center">
            <div class="logo">
                <img src="logo.jpg" alt="Logo" height="100">
            </div>
            <h1>Green Hope Nation</h1>
            <nav>
                <ul class="d-flex">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="initiatives.html">Initiatives</a></li>
                    <li><a href="blogs.html">Blog</a></li>
                    <li><a href="events.html">Events</a></li>
                    <li><a href="gallery.php">Gallery</a></li> <!-- Added Gallery tab -->
                </ul>
            </nav>

            <!-- Display the logged-in user's email -->
            <div class="auth-buttons">
                <?php if (isset($_SESSION['email'])): ?>
                    <p class="me-3">Logged in as: <?php echo $_SESSION['email']; ?></p>
                    <a href="logout.php" class="btn btn-primary">Logout</a>
                <?php else: ?>
                    <a href="login.html" class="btn btn-primary me-2">Login</a>
                    <a href="signup.html" class="btn btn-primary">Signup</a>
                <?php endif; ?>
            </div>
        </div>
    </header>
 <!-- Login and Signup Buttons -->
            <!-- <div class="auth-buttons">
                <a href="login.html" class="btn btn-primary me-2">Login</a>
                <a href="signup.html" class="btn btn-primary">Signup</a>
            </div>
        </div>
    </header> -->

    <section class="hero" style="background-image: url('Sustainable\ Living\ Tips.jpg');">
        <div class="hero-content">
            <h2>Live Green, Think Green</h2>
            <p>Join our mission to create a sustainable future. Explore our tips and campaigns to make a positive impact on the environment.</p>
            <a href="about.html" class="btn btn-primary">Learn More</a>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <h2>About Us</h2>
            <p>We are a community of environmental advocates focused on educating and inspiring individuals to adopt eco-friendly habits. Together, we can lead the way to a sustainable future.</p>
        </div>
    </section>

    <section class="campaigns">
        <div class="container">
            <h2>Our Campaigns</h2>
            <div class="campaign-list">
                <div class="campaign-item">
                    <h3>Reduce Plastic Waste</h3>
                    <p>Join our efforts to reduce plastic consumption by encouraging reusable alternatives and proper waste management.</p>
                </div>
                <div class="campaign-item">
                    <h3>Tree Planting Drive</h3>
                    <p>Help us plant trees to restore natural habitats and combat climate change. Every tree makes a difference!</p>
                </div>
                <div class="campaign-item">
                    <h3>Clean Water Initiative</h3>
                    <p>Promote clean water access and preservation by supporting water conservation efforts in local communities.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS for Modal functionality -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Call-to-Action Buttons -->
    <section class="cta-buttons bg-success text-white py-5">
        <div class="container text-center">
            <a href="donate now.html" class="btn btn-light btn-lg mx-2">Donate Now</a>
            <a href="become_member.html" class="btn btn-light btn-lg mx-2">Become a Member</a>
            <a href="take_action.html" class="btn btn-light btn-lg mx-2">Take Action</a>
        </div>
    </section>


    <!-- Testimonial carousel with a shorter interval (3 seconds) -->
<section class="testimonials py-5">
    <div class="container">
        <h2 class="text-center mb-5">What People Are Saying</h2>
        <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="testimonial">
                        <p>"GreenHopeNetwork has changed my perspective on sustainability!"</p>
                        <cite>- Alex J.</cite>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"I've never felt more connected to my community and the environment!"</p>
                        <cite>- Sarah L.</cite>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="testimonial">
                        <p>"Their initiatives truly make a difference in the world!"</p>
                        <cite>- Michael R.</cite>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

    <!-- Contact Section (Accessible after sign-up) -->
<section class="contact py-5" id="contact">
    <div class="container">
        <h2 class="text-center mb-5">Get in Touch</h2>
        <div id="contactContent">
            <form id="contactForm" action="get_in_touch.php" method="POST">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="contactName" class="form-label">Name</label>
                        <input type="text" class="form-control" id="contactName" placeholder="Your Name" name="name" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="contactEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="contactEmail" placeholder="name@example.com" name="email" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="contactSubject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="contactSubject" placeholder="Subject" name="subject" required>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="contactMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="contactMessage" rows="5" placeholder="Your message here..." name="message" required></textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
        <div id="contactPrompt" class="contactPrompt">
            <p>Please <a href="signup.html">sign up</a> to access the contact form.</p>
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer class="bg-dark text-light py-4">
        <div class="container">
            <div class="row">
                <!-- Footer Links -->
                <div class="col-md-4 mb-3">
                    <h5>About GreenHopeNetwork</h5>
                    <p>We are a non-profit organization focused on building a sustainable future through community-based initiatives and environmental awareness programs.</p>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html" class="text-light">Home</a></li>
                        <li><a href="about.html" class="text-light">About Us</a></li>
                        <li><a href="initiatives.html" class="text-light">Initiatives</a></li>
                        <li><a href="blogs.html" class="text-light">Blog</a></li>
                        <li><a href="events.html" class="text-light">Events</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-3">
                    <h5>Contact Information</h5>
                    <p>Email: info@greenhopenetwork.org</p>
                    <p>Phone: +123 456 7890</p>
                    <p>Address: 123 Green Lane, Sustainability City</p>
                    <div class="social-icons">
                        <a href="#" class="text-light me-2"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-light me-2"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <hr class="bg-light">
            <p class="text-center mb-0">&copy; 2024 GreenHopeNetwork. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript for modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="scripts/scripts.js"></script>

    <!-- Rest of the HTML content -->
    <!-- Hero Section and others -->
</body>
</html>
