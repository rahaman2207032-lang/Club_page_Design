<?php
session_start();
$is_logged_in = isset($_SESSION['fname']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="home.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
   
<nav class="nav">
     <div class="logo <?php if ($is_logged_in): ?>user-logged-in<?php endif; ?>" <?php if ($is_logged_in): ?>onclick="toggleDashboard()"<?php endif; ?>>
        <h2>RIC</h2>
     </div>

     <input type="checkbox" id="nav-toggle">
     <label for="nav-toggle" class="hm-menu">
         <span class="bar"></span>
         <span class="bar"></span>
         <span class="bar"></span>
     </label>

    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="projects.php">Projects</a></li>
         <li><a href="events.php">Events</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="register.php">Register</a></li>
        <li><a href="login.php">Login</a></li>

    </ul>
</nav>

<!-- Sliding Sidebar -->
<?php if ($is_logged_in): ?>
<div class="dashboard-overlay" id="overlay" onclick="closeDashboard()"></div>
<div class="sliding-dashboard" id="dashboard">
    <div class="dashboard-content">
        <div class="dashboard-header">
            <h3>Menu</h3>
            <button class="close-dashboard" onclick="closeDashboard()">&times;</button>
        </div>
        <div class="dashboard-body">
            <div class="user-profile">
                <div class="user-name"><?php echo htmlspecialchars($_SESSION['fname'] . ' ' . $_SESSION['lname']); ?></div>
                <div class="user-email"><?php echo htmlspecialchars($_SESSION['email']); ?></div>
            </div>
            <div class="dashboard-actions">
                <a href="update_profile.php" class="btn-logout">⚙️ Update Profile</a>
                <a href="logout.php" class="btn-logout">🚪 Logout</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

 <section class="hero-section">
  <div><h2>Research & Innovation Club</h2>
    <p> Collaborate, Innovate, Create.</p>
   
</section>



    <section class="pulse-section">
        <div class="pulse-container">
            <div class="pulse-header">
                <span class="pulse-dot"></span>
                <h3>Research Pulse: Live Activity</h3>
            </div>
            <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-number" data-target="15">0</span>
                <p>Active Projects</p>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-target="1200">0</span>
                <p>Research Hours</p>
            </div>
            <div class="stat-item">
                <span class="stat-number" data-target="8">0</span>
                <p>Ongoing Patents</p>
            </div>
        </div>
        </div>
    </section>

<section class="quick-links-section">
    <div class="quick-links-container">


        <div class="quick-links-column">
            <h3 class="column-title">About Club</h3>
            <p class="column-description">  
                The premier research and innovation club at KUET, dedicated to fostering creativity and technological advancement.
            </p>
            <div class="contact-info">
     <div class="info-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span>Main Campus, KUET</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-phone"></i>
                        <span>+880 1622-076101</span>
                    </div>
                    <div class="info-item">
                        <i class="fas fa-envelope"></i>
                        <span>ric.kuet@gmail.com</span>
                    </div>
                </div>
            </div>

            <!-- Column 2: Explore -->
            <div class="quick-links-column">
                <h3 class="column-title">Explore</h3>
                <ul class="links-list">
                    <li><a href="home.php">Home</a></li>
                    <li><a href="events.php">Events</a></li>
                    <li><a href="projects.php">Projects</a></li>

                </ul>
            </div>

            <!-- Column 3: Follow Us -->
            <div class="quick-links-column">
                <h3 class="column-title">Follow Us</h3>
                <div class="social-links">
                    <a href="https://facebook.com/yourpage" target="_blank" class="social-icon" title="Facebook">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/yourpage" target="_blank" class="social-icon" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://instagram.com/yourpage" target="_blank" class="social-icon" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://linkedin.com/company/yourpage" target="_blank" class="social-icon" title="LinkedIn">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://youtube.com/yourchannel" target="_blank" class="social-icon" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
                <div class="newsletter">
                    <h4>Subscribe to Newsletter</h4>
                    <form class="newsletter-form" id="newsletter-form">
                        <input type="email" id="newsletter-email" name="email" placeholder="Enter your email" required>
                        <button type="submit" id="subscribe-btn">Subscribe</button>
                    </form>
                    <div id="newsletter-message" style="margin-top: 10px; font-size: 0.85rem; text-align: center;"></div>
                </div>
            </div>

        </div>
   
        <footer class="footer-divider"><!-- Footer -->
        
            <div class="footer-bottom">
                <p>&copy; 2026 Research & Innovation Club, KUET. All rights reserved.</p>
                <div class="footer-links">
                    <a href="#">Privacy Policy</a>
                    <span>•</span>
                    <a href="#">Terms of Service</a>
                </div>
            </div>
        </footer>
    </section>


<script src="script.js"></script>

</body>
</html>