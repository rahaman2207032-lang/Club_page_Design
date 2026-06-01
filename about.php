<?php
session_start();
$is_logged_in = isset($_SESSION['fname']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Research & Innovation Club</title>
    <link rel="stylesheet" href="aboutdemo.css?v=<?php echo time(); ?>">
</head>
<body>


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
                <a href="logout.php" class="btn-logout">🚪 Logout</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

    <nav class="navbar">
        <div class="logo <?php if ($is_logged_in): ?>user-logged-in<?php endif; ?>" <?php if ($is_logged_in): ?>onclick="toggleDashboard()"<?php endif; ?>>

            <h2>Research & Innovation Club</h2>
        </div>
        <!-- Navigation Links to all pages -->
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


    <section class="hero-section">
        <h1>About Our Club</h1>
        <p class="subtitle">Empowering Innovation and Research Excellence</p>
    </section>

 
    <section class="mission-vision">
       <div class="staircase-container"> 
        
     
            <div class="mission-card stair-1" >
                <div class="floating-wrapper">
                <div class="card-icon">🎯</div>
                <h3>Our Mission</h3>
                <p>To foster a collaborative environment where students and researchers can explore cutting-edge technologies, develop innovative solutions, and contribute to advancing knowledge in research and innovation.</p>
            </div>
            </div>

       
            <div class="vision-card stair-2">
                  <div class="floating-wrapper">
                <div class="card-icon">✨</div>
                <h3>Our Vision</h3>
                <p>To become a leading hub for research and innovation, nurturing creative minds and producing groundbreaking projects that make a positive impact on society.</p>
            </div>
          </div>
          
            <div class="values-card stair-3">
                  <div class="floating-wrapper">
                <div class="card-icon">💡</div>
                <h3>Our Values</h3>
                <p>Collaboration, Innovation, Excellence, Integrity, and Continuous Learning. We believe in the power of teamwork and the importance of pushing boundaries.</p>
            </div>
          </div>
           </div> 
        </div>
    </section>


    <section class="team-section">
        <h2>Meet Our Leadership Team</h2>
        <div class="team-container">
          
            <div class="team-card">
         
                <div class="team-image"></div>
                <h3>Faysal Mahmud</h3>
                <p class="position">Club President</p>
                <p class="bio">Leading the club with vision and passion for innovation</p>
            
                <div class="social-links">
                    <a href="#">LinkedIn</a>
                    <a href="#">Twitter</a>
                </div>
            </div>

          
            <div class="team-card">
                <div class="team-image"></div>
                <h3>Rubaiya Raha</h3>
                <p class="position">Vice President</p>
                <p class="bio">Coordinating research initiatives and technical workshops</p>
                <div class="social-links">
                    <a href="#">LinkedIn</a>
                    <a href="#">Twitter</a>
                </div>
            </div>

          
            <div class="team-card">
                <div class="team-image"></div>
                <h3>Ali Hassan</h3>
                <p class="position">Events Coordinator</p>
                <p class="bio">Organizing engaging events and networking opportunities</p>
                <div class="social-links">
                    <a href="#">LinkedIn</a>
                    <a href="#">Twitter</a>
                </div>
            </div>

        
            <div class="team-card">
                <div class="team-image"></div>
                <h3>Zaina Rahaman</h3>
                <p class="position">Project Lead</p>
                <p class="bio">Mentoring project teams and fostering collaboration</p>
                <div class="social-links">
                    <a href="#">LinkedIn</a>
                    <a href="#">Twitter</a>
                </div>
            </div>
        </div>
    </section>


    <section class="stats-section">
        <h2>Our Impact</h2>
        <div class="stats-container">
   
            <div class="stat-card">
                <h3>500+</h3>
                <p>Active Members</p>
            </div>

          
            <div class="stat-card">
                <h3>50+</h3>
                <p>Completed Projects</p>
            </div>

          
            <div class="stat-card">
                <h3>30+</h3>
                <p>Annual Events</p>
            </div>

     
            <div class="stat-card">
                <h3>15+</h3>
                <p>Research Publications</p>
            </div>
        </div>
    </section>


    <section class="timeline-section">
        <h2>Our Journey</h2>
        <div class="timeline">
      
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2020</h3>
                    <p>Club Founded with core mission to promote research and innovation</p>
                </div>
            </div>

           
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2021</h3>
                    <p>Launched first AI research project and won national hackathon</p>
                </div>
            </div>

            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2022</h3>
                    <p>Expanded to 250+ members and published 5 research papers</p>
                </div>
            </div>

        
            <div class="timeline-item">
                <div class="timeline-content">
                    <h3>2024</h3>
                    <p>Reached 500+ members with 50+ successful projects</p>
                </div>
            </div>
        </div>
    </section>

   
    <section class="contact-section">
        <h2>Get In Touch</h2>
        <p>Have questions about our club? We'd love to hear from you!</p>
        <div class="contact-info">

            <div class="contact-card">
                <h4>📧 Email</h4>
                <p>contact@innovationclub.com</p>
            </div>

 
            <div class="contact-card">
                <h4>📍 Location</h4>
                <p>Research Building, Floor 3</p>
            </div>

       
            <div class="contact-card">
                <h4>🕐 Office Hours</h4>
                <p>Mon-Fri: 3 PM - 6 PM</p>
            </div>
        </div>
    </section>
     
   
    <footer>
        <p>&copy; 2024 Research & Innovation Club. All rights reserved.</p>
    </footer>
    <script src="script.js"></script>

    <script>
    function toggleDashboard() {
        const dashboard = document.getElementById('dashboard');
        const overlay = document.getElementById('overlay');
        if (dashboard) {
            dashboard.classList.toggle('active');
            overlay.classList.toggle('active');
        }
    }

    function closeDashboard() {
        const dashboard = document.getElementById('dashboard');
        const overlay = document.getElementById('overlay');
        if (dashboard) {
            dashboard.classList.remove('active');
            overlay.classList.remove('active');
        }
    }
    </script>
</body>
</html>