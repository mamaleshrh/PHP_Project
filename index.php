<?php
require 'db.php'; // Include the database connection

// Fetch blog posts from the database
try {
    $stmt = $conn->query("SELECT id, title, image FROM blog_posts ORDER BY created_at DESC");
    $blogPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Debugging: Print fetched data
    // echo "<pre>";
    // print_r($blogPosts);
    // echo "</pre>";
} catch (PDOException $e) {
    echo "Error fetching blog posts: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        /* General Animations */
        @keyframes fadeInUp {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .section {
            opacity: 0;
            animation: fadeInUp 0.8s ease-in-out forwards;
            animation-delay: var(--animation-delay, 0s);
        }

        .skills-grid, .education-grid, .achievement-list, .projects-grid, .blog-grid, .social-links {
            display: grid;
            gap: 20px;
        }

        .skills-grid, .education-grid, .projects-grid, .blog-grid {
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        }

        .social-links {
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        }

        .profile-img, .education-logo, .social-icon, .blog-post img {
            max-width: 100%;
            border-radius: 8px;
        }

        .social-link, .blog-post, .project, .education {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .social-link:hover, .blog-post:hover, .project:hover, .education:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Animation Delays for Sections */
        #about {
            --animation-delay: 0.2s;
        }

        #skills {
            --animation-delay: 0.4s;
        }

        #education {
            --animation-delay: 0.6s;
        }

        #experiances {
            --animation-delay: 0.8s;
        }

        #achievements {
            --animation-delay: 1s;
        }

        #projects {
            --animation-delay: 1.2s;
        }

        #blog {
            --animation-delay: 1.4s;
        }

        #social {
            --animation-delay: 1.6s;
        }

        #contact {
            --animation-delay: 1.8s;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Welcome to My Portfolio</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#about">About Me</a></li>
                    <li><a href="#skills">Skills</a></li>
                    <li><a href="#education">Education</a></li>
                    <li><a href="#experiances">Experiences</a></li>
                    <li><a href="#achievements">Achievements</a></li>
                    <li><a href="#projects">Projects</a></li>
                    <li><a href="#blog">Blog</a></li>
                    <li><a href="#social">Social</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- About Section -->
    <section id="about" class="section">
        <div class="container">
            <h2>About Me</h2>
            <div class="about-content">
                <img src="images/main.jpg" alt="Profile Picture" class="profile-img">
                <p>
                    Hello! I'm a passionate web developer with expertise in building modern, responsive, and user-friendly websites.
                    I love turning ideas into reality through code. Let's create something amazing together!
                </p>
            </div>
        </div>
    </section>

    <!-- Skills Section -->
    <section id="skills" class="section">
        <div class="container">
            <h2>Skills</h2>
            <div class="skills-grid">
                <div class="skill">
                    <h3>HTML & CSS</h3>
                    <p>Proficient in creating responsive and visually appealing web designs.</p>
                </div>
                <div class="skill">
                    <h3>JavaScript</h3>
                    <p>Experienced in building interactive and dynamic web applications.</p>
                </div>
                <div class="skill">
                    <h3>PHP & MySQL</h3>
                    <p>Skilled in backend development and database management.</p>
                </div>
                <div class="skill">
                    <h3>React</h3>
                    <p>Building modern, component-based user interfaces.</p>
                </div>
            </div>
        </div>
    </section>    

    <section id="education" class="section">
        <div class="container">
            <h2>Education</h2>
            <div class="education-grid">
                <div class="education">
                    <img src="images/iitbhu.jpeg" alt="IIT BHU Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Indian Institute of Technology (BHU), Varanasi</h3>
                        <p>BTech in Electronics Engineering</p>
                        <p><strong>2021 - 2025</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/fiitjee.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>FIITJEE</h3>
                        <p>High School</p>
                        <p><strong>2019 - 2021</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/scottish.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Scottish Academy</h3>
                        <p>School</p>
                        <p><strong>2017 - 2019</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/sarang.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Shri Sarang Swami Vidyalay, Parbhani</h3>
                        <p>School</p>
                        <p><strong>2009 - 2017</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </section>    


    <section id="experiances" class="section">
        <div class="container">
            <h2>Experiances</h2>
            <div class="education-grid">
                <div class="education">
                    <img src="images/zomato.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Zomato</h3>
                        <p>SDE1</p>
                        <p><strong>Upcoming</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/oracle.png" alt="IIT BHU Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Oracle</h3>
                        <p>MTS Intern</p>
                        <p><strong>May 2024 - Jul 2024</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/hackerrank.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>HackerRank</h3>
                        <p>Problem Setter</p>
                        <p><strong>Remote</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/codechef.jpeg" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Codechef</h3>
                        <p>Problem Author</p>
                        <p><strong>Remote</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/Udyam.png" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>Udyam, IIT(BHU)</h3>
                        <p>Event Coordinator - Devbits</p>
                        <p><strong>Oct 2023 - May 2024</strong></p>
                    </div>
                </div>
                <div class="education">
                    <img src="images/EES.jpeg" alt="School Logo" class="education-logo" />
                    <div class="education-content">
                        <h3>EES, IIT(BHU)</h3>
                        <p>Web Coordinator</p>
                        <p><strong>Nov 2022 - Apr 2023</strong></p>
                    </div>
                </div>

            </div>
        </div>
    </section>    

    <section id="achievements" class="section">
    <div class="container">
        <h2>Achievements</h2>
        <ul class="achievement-list">
            <li>
            Candidate Master on Codeforces – Max Rating : 1925.
            </li>
            <li>
            5 Star on CodeChef – Max Rating : 2076.
            </li>
            <li>
            AIR 1 (Global Rank 18) in Codeforces Round 906 (Div.2).
            </li>
            <li>
            AIR 96 in Meta Hacker Cup 2023 Round 2.
            </li>
            <li>
            Qualified for the Regional Mathematics Olympiad (RMO) 2018, recognized for mathematical aptitude.
            </li>
            <li>
            Achieved Rank 1 in Funckit (Digital Electronics), Rank 2 in Codigo (CP Contest), Rank 2 in Cassandra (Data Science), Rank 3 in Devbits (CP & Web Dev), and Rank 4 in Hackoverflow (Web Dev) at IIT BHU tech fests..
            </li>
        </ul>
    </div>
</section>



<section id="projects" class="section">
    <div class="container">
        <h2>Projects</h2>
        <div class="projects-grid">
            <!-- Project 1 -->
            <div class="project">
                <h3>COIN BAZAAR | STOCK TRADING APP</h3>
                <p>
                    Developed a website that enables real-time buying and selling of cryptocurrency under the Web Hackathon.
                    <br>Achieved 3rd place in Devbits 2023 among 50+ teams for showcasing exceptional UI design and website performance.
                </p>
                <p><strong>Technologies:</strong> ReactJS, NodeJS, MongoDB, HTML, CSS, JS, API, Git, GitHub</p>
                <a href="https://github.com/mamaleshrh/Coin-Bazaar" target="_blank" class="project-link">View Repository</a>
            </div>

            <!-- Project 2 -->
            <div class="project">
                <h3>SMART ATTENDANCE SYSTEM</h3>
                <p>
                    Built a computer vision-based attendance system for efficient and practical attendance tracking.
                    <br>Achieved over 90% accuracy in face recognition with liveness detection.
                </p>
                <p><strong>Technologies:</strong> Python, FaceNet, OpenCV, FaceRecognition</p>
                <a href="https://github.com/mamaleshrh/AttendanceSystem-main" target="_blank" class="project-link">View Repository</a>
            </div>

            <!-- Project 3 -->
            <div class="project">
                <h3>DIAGNOSIS OF LUNG CONDITION</h3>
                <p>
                    Created a model to detect crackles and wheezes in patients’ lungs using audio samples of respiration cycles.
                    <br>Achieved 80% accuracy for crackles detection and 86% accuracy for wheezes detection.
                </p>
                <p><strong>Technologies:</strong> Python, TensorFlow, Numpy, CNN, Google Colab, OpenCV, Librosa, MFCC</p>
                <a href="https://drive.google.com/drive/u/0/folders/13MAUCrHY2ftJ-GTDVO15HvL_3F0mPw9g" target="_blank" class="project-link">View Project</a>
            </div>

            <!-- Existing Project 1 -->
            <div class="project">
                <h3>Front-End Developer Application</h3>
                <p>
                    Worked as a Front-End Developer and built a fully responsive application using ReactJS.
                    <br>Developed a complete registration system supporting team registration for various events, allowing 
                    all CRUD (Create, Read, Update, Delete) operations via communication with Back-End APIs.
                    <br>The application served as the backbone for all events under UDYAM, UDGAM, and MASHAL.
                </p>
                <p><strong>Technologies:</strong> HTML, CSS, BootStrap, JavaScript, ReactJS, HTTP Requests</p>
                <a href="https://github.com/Udyam/ees23-frontend" target="_blank" class="project-link">View Repository</a>
            </div>


            <!-- Existing Project 2 -->
            <div class="project">
            <h3>Member Of Technical Staff Intern</h3>
            <p><strong>Oracle</strong> | Bengaluru, Karnataka, India</p>
            <p><em>May 2024 – July 2024</em></p>
            <ul>
                <li>Designed and implemented a thread-safe LRU cache to optimize performance and reduce database queries.</li>
                <li>Developed a robust user status management system utilizing heartbeat signals and caching mechanisms.</li>
                <li>Employed concurrency testing methodologies to ensure optimal cache performance in multi-threaded environments.</li>
            </ul>
            <p><strong>Technologies:</strong> Java, SQL, Oracle Cloud Infrastructure, JUnit, Maven</p>
            </div>
            <!-- Existing Project 3 -->
            <div class="project">
            <h3>Compression of Machine Learning Model</h3>
            <p>
                Implemented a research paper under the guidance of a professor to compress machine learning models, 
                optimizing them for resource-constrained environments.
            </p>
            <p><strong>Technologies:</strong> Python, TensorFlow, Model Optimization</p>
            <p><a href="https://github.com/mamaleshrh/compression-of-machine-learning-model" target="_blank">Repository</a></p>
        </div>        </div>
    </div>
</section>
    <section id="blog" class="section">
        <div class="container">
            <h2>Blog</h2>
            <div class="blog-grid">
                <?php foreach ($blogPosts as $post): ?>
                    <div class="blog-post">
                        <a href="blog.php?id=<?php echo $post['id']; ?>">
                            <img src="images/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                            <h3><?php echo $post['title']; ?></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <section id="social" class="section">
    <div class="container">
        <h2>Connect with Me</h2>
        <div class="social-links">
            <a href="https://www.linkedin.com/in/mamalesh" target="_blank" class="social-link">
                <img src="images/linkedin.png" alt="LinkedIn" class="social-icon" />
                LinkedIn
            </a>
            <a href="mailto:mamaleshhake@gmail.com" target="_blank" class="social-link">
                <img src="images/gmail.png" alt="Email" class="social-icon" />
                Email
            </a>
            <a href="https://www.instagram.com/mamaleshhake" target="_blank" class="social-link">
                <img src="images/insta.jpeg" alt="LinkedIn" class="social-icon" />
                InstaGram
            </a>
            <a href="https://github.com/mamaleshrh" target="_blank" class="social-link">
                <img src="images/github.png" alt="GitHub" class="social-icon" />
                GitHub
            </a>
            <a href="https://codeforces.com/profile/Mamalesh" target="_blank" class="social-link">
                <img src="images/cf.png" alt="GitHub" class="social-icon" />
                CodeForces
            </a>
            <a href="https://www.codechef.com/users/mamaleshrh" target="_blank" class="social-link">
                <img src="images/codechef.jpeg" alt="GitHub" class="social-icon" />
                CodeChef
            </a>
            <a href="https://atcoder.jp/users/mamalesh" target="_blank" class="social-link">
                <img src="images/atcoder.png" alt="GitHub" class="social-icon" />
                AtCoder
            </a>
        </div>
    </div>
</section>
    <section id="contact" class="section">
        <div class="container">
            <h2>Contact Me</h2>
            <form action="contact.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2023 My Portfolio. All rights reserved.</p>
        </div>
    </footer>

    <script src="js/scripts.js"></script>
</body>
</html>