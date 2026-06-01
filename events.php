<?php
session_start();
$is_logged_in = isset($_SESSION['fname']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events - Research & Innovation Club</title>
    <link rel="stylesheet" href="events.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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

  
     <label for="nav-toggle" class="hm-menu">
         <span></span>
         <span></span>
         <span></span>
     </label>

 
     <input type="checkbox" id="nav-toggle">

   
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
        <h1>Our Events</h1>
        <p class="subtitle">Join us for exciting workshops, seminars, and networking events</p>
    </section>


    <section class="upcoming-events">
        <h2>Upcoming Events</h2>
        <div class="events-container">
        
            <div class="event-card">
              
                <div class="event-image"></div>
                <div class="event-content">
                 
                    <div class="event-meta">
                        <span class="event-date">📅 April 25, 2026</span>
                        <span class="event-time">⏰ 2:00 PM - 4:00 PM</span>
                      
                        <span class="event-category-badge">Workshop</span>
                    </div>
                  
                    <h3>AI & Machine Learning Fundamentals</h3>
                 
                    <p>Learn the basics of AI and ML. This workshop covers neural networks, supervised learning, and practical applications.</p>
                 
                    <div class="event-details">
                        <p><strong>Location:</strong> Tech Lab, Room 301</p>
                        <p><strong>Speaker:</strong> Dr. Sarah Williams</p>
                        <p><strong>Capacity:</strong> 50 participants</p>
                    </div>
                 
                    <button class="register-btn">Register Now</button>
                </div>
            </div>

        
            <div class="event-card">
                <div class="event-image"></div>
                <div class="event-content">
                    <div class="event-meta">
                        <span class="event-date">📅 May 5-6, 2026</span>
                        <span class="event-time">⏰ 10:00 AM - 6:00 PM</span>
                      
                        <span class="event-category-badge hackathon-badge">Hackathon</span>
                    </div>
                    <h3>48-Hour Innovation Hackathon 2026</h3>
                    <p>Build innovative solutions in 48 hours! Teams of 3-5 can compete for prizes and recognition. Themes: IoT, Sustainability, Healthcare.</p>
                    <div class="event-details">
                        <p><strong>Location:</strong> Innovation Center</p>
                        <p><strong>Prize Pool:</strong> $5000</p>
                        <p><strong>Capacity:</strong> 20 teams</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
            </div>

            
            <div class="event-card">
                <div class="event-image"></div>
                <div class="event-content">
                    <div class="event-meta">
                        <span class="event-date">📅 April 28, 2026</span>
                        <span class="event-time">⏰ 3:00 PM - 4:30 PM</span>
                      
                        <span class="event-category-badge seminar-badge">Seminar</span>
                    </div>
                    <h3>Future of Quantum Computing</h3>
                    <p>Explore the cutting-edge world of quantum computing. Understand quantum bits, entanglement, and practical quantum applications.</p>
                    <div class="event-details">
                        <p><strong>Location:</strong> Auditorium A</p>
                        <p><strong>Speaker:</strong> Prof. James Kumar</p>
                        <p><strong>Capacity:</strong> 100 participants</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
            </div>

       
            <div class="event-card">
                <div class="event-image"></div>
                <div class="event-content">
                    <div class="event-meta">
                        <span class="event-date">📅 May 1, 2026</span>
                        <span class="event-time">⏰ 5:00 PM - 7:00 PM</span>
                       
                        <span class="event-category-badge networking-badge">Networking</span>
                    </div>
                    <h3>Tech Professionals Networking Mixer</h3>
                    <p>Connect with industry professionals, fellow researchers, and innovation leaders. Light refreshments and casual conversations.</p>
                    <div class="event-details">
                        <p><strong>Location:</strong> Club Lounge</p>
                        <p><strong>Guests:</strong> Tech industry leaders</p>
                        <p><strong>Capacity:</strong> 80 participants</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
            </div>

          
            <div class="event-card">
                <div class="event-image"></div>
                <div class="event-content">
                    <div class="event-meta">
                        <span class="event-date">📅 May 10, 2026</span>
                        <span class="event-time">⏰ 1:00 PM - 3:00 PM</span>
                        <span class="event-category-badge">Workshop</span>
                    </div>
                    <h3>Web Development with React</h3>
                    <p>Hands-on workshop on building interactive web applications using React. Learn components, hooks, and state management.</p>
                    <div class="event-details">
                        <p><strong>Location:</strong> Computer Lab 2</p>
                        <p><strong>Instructor:</strong> Emma Lee</p>
                        <p><strong>Capacity:</strong> 40 participants</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
            </div>

           
            <div class="event-card">
                <div class="event-image"></div>
                <div class="event-content">
                    <div class="event-meta">
                        <span class="event-date">📅 May 8, 2026</span>
                        <span class="event-time">⏰ 2:30 PM - 4:00 PM</span>
                        <span class="event-category-badge seminar-badge">Seminar</span>
                    </div>
                    <h3>Blockchain Technology & Cryptocurrencies</h3>
                    <p>Understand blockchain technology, smart contracts, and the future of decentralized applications in various industries.</p>
                    <div class="event-details">
                        <p><strong>Location:</strong> Auditorium B</p>
                        <p><strong>Speaker:</strong> Alex Bitcoin (Blockchain Expert)</p>
                        <p><strong>Capacity:</strong> 75 participants</p>
                    </div>
                    <button class="register-btn">Register Now</button>
                </div>
            </div>
        </div>
    </section>

    
    <section class="past-events">
        <h2>Past Events Highlights</h2>
        <div class="past-events-container">
            <!-- Past Event 1 -->
            <div class="past-event">
                <h3>AI Conference 2025</h3>
                <p>Hosted by 200+ attendees. Great insights on the future of AI in various industries.</p>
                
                <a href="#">View Photos</a>
            </div>

            <div class="past-event">
                <h3>Spring Hackathon 2025</h3>
                <p>12 teams competed and created amazing projects. Winners received mentorship and funding.</p>
              
                <a href="#">View Winners</a>
            </div>

      
            <div class="past-event">
                <h3>Data Science Workshop</h3>
                <p>80 participants learned advanced data analysis and visualization techniques.</p>
               
                <a href="#">View Resources</a>
            </div>
        </div>
    </section>


    <section class="newsletter-section">
        <h2>Stay Updated</h2>
        <p>Subscribe to our newsletter to get notified about upcoming events</p>
      
        <form class="newsletter-form">
            <input type="email" placeholder="Enter your email" required>
     
            <button type="submit">Subscribe</button>
        </form>
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