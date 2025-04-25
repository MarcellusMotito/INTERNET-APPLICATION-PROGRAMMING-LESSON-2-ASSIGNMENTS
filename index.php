<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DynamicWeb</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    background: #111;
    overflow: auto;
}

.background-blur {
    position: fixed;
    width: 150%;
    height: 150%;
    background: linear-gradient(45deg, #8b5cf6,rgb(29, 20, 24), #3b82f6);
    filter: blur(80px);
    animation: float 8s ease-in-out infinite;
    transform-style: preserve-3d;
    z-index: -1;
}

@keyframes float {
    0%, 100% { transform: translate3d(0, 0, 0) scale(1); }
    50% { transform: translate3d(50px, 50px, 100px) scale(1.1); }
}

.container {
    position: relative;
    z-index: 1;
    padding: 20px;
    width: 100%;
    max-width: 600px;
}

.form-box {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 25px;
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
    width: 100%;
    max-width: 400px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    animation: fadeIn 0.5s ease;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

.form-box h2 {
    color: #fff;
    text-align: center;
    margin-bottom: 30px;
    font-size: 2em;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.input-group {
    position: relative;
    margin: 15px 0;
}

.input-group label {
    color: #ffffff;
    font-size: 14px;
    margin-bottom: 5px;
    display: block;
    font-weight: 500;
}

input, textarea {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 15px;
    background: rgba(255, 255, 255, 0.15);
    color: #ffffff;
    font-size: 16px;
    transition: all 0.3s ease;
}

textarea {
    min-height: 80px;
    resize: vertical;
}

input:focus, textarea:focus {
    outline: none;
    background: rgba(255, 255, 255, 0.25);
    transform: scale(1.02);
}

input::placeholder, textarea::placeholder {
    color: #cccccc;
}

.form-btn {
    width: 100%;
    padding: 15px;
    border: none;
    border-radius: 15px;
    background: linear-gradient(45deg, #8b5cf6, #ec4899);
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.form-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(139, 92, 246, 0.4);
}

.form-box p {
    color: #ddd;
    text-align: center;
    margin-top: 20px;
}

.form-box a {
    color: #ec4899;
    text-decoration: none;
    font-weight: 600;
}

.logged-in {
    background: rgba(255, 255, 255, 0.05);
    backdrop-filter: blur(15px);
    padding: 40px;
    border-radius: 25px;
    width: 100%;
    max-width: 500px;
    max-height: 80vh;
    overflow-y: auto;
}

.welcome-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
}

.welcome-header h2 {
    color: #fff;
}

.logout-btn {
    padding: 10px 25px;
    background: #dc2626;
    color: #fff;
    text-decoration: none;
    border-radius: 15px;
    transition: all 0.3s ease;
}

.logout-btn:hover {
    background: #b91c1c;
    transform: translateY(-2px);
}

.submission-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 100%;
}

.submit-btn {
    width: 200px;
    align-self: center;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    margin-top: 20px;
    cursor: pointer;
}

.submit-btn:hover {
    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
    transform: translateY(-2px);
}

.success-message {
    text-align: center;
    color: #fff;
    padding: 20px;
    animation: fadeIn 0.5s ease;
}

.success-message h3 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #4ade80; 
}

.success-message p {
    color: #ddd;
    margin-bottom: 20px;
}

.reset-btn {
    padding: 10px 20px;
    border: none;
    border-radius: 15px;
    background: linear-gradient(45deg, #3b82f6, #8b5cf6);
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.reset-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
}

@media (max-width: 600px) {
    .container {
        padding: 10px;
    }
    
    .logged-in {
        padding: 20px;
        max-height: 90vh;
    }
    
    .form-box {
        padding: 20px;
        max-width: 100%;
    }
}
    </style>
</head>
<body>
    <div class="background-blur"></div>
    
    <?php if(isset($_SESSION['user_id'])): ?>
        <div class="container logged-in">
            <div class="welcome-header">
                <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?></h2>
                <a href="logout.php" class="logout-btn">Logout</a>
            </div>
            <?php if(isset($_SESSION['submission_success']) && $_SESSION['submission_success']): ?>
                <div class="success-message">
                    <h3>Successfully Submitted Profile!</h3>
                    <p>Your profile has been saved. Submit another?</p>
                    <button onclick="location.reload()" class="reset-btn">Reset Form</button>
                </div>
            <?php else: ?>
                <form id="submissionForm" action="submit.php" method="POST" class="submission-form">
                    <div class="input-group">
                        <label for="aspiration">Aspirations</label>
                        <textarea id="aspiration" name="aspiration" placeholder="What are your aspirations?" required></textarea>
                    </div>
                    <div class="input-group">
                        <label for="hobby">Hobby</label>
                        <input type="text" id="hobby" name="hobby" placeholder="Your favorite hobby" required>
                    </div>
                    <div class="input-group">
                        <label for="talents">Talents</label>
                        <textarea id="talents" name="talents" placeholder="What are your talents?" required></textarea>
                    </div>
                    <div class="input-group">
                        <label for="school">School</label>
                        <input type="text" id="school" name="school" placeholder="Your school" required>
                    </div>
                    <div class="input-group">
                        <label for="major_course">Major Course</label>
                        <input type="text" id="major_course" name="major_course" placeholder="Your major course" required>
                    </div>
                    <button type="submit" class="submit-btn">Submit Profile</button>
                </form>
            <?php endif; ?>
            <?php unset($_SESSION['submission_success']); ?>
        </div>
    <?php else: ?>
        <div class="container">
            <div class="form-box login-box">
                <h2>Welcome Back</h2>
                <form id="loginForm" action="login.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="form-btn">Login</button>
                    <p>Don't have an account? <a href="#" onclick="showSignup()">Sign up</a></p>
                </form>
            </div>
            
            <div class="form-box signup-box" style="display: none;">
                <h2>Create Account</h2>
                <form id="signupForm" action="signup.php" method="POST">
                    <div class="input-group">
                        <input type="text" name="username" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <button type="submit" class="form-btn">Sign Up</button>
                    <p>Have an account? <a href="#" onclick="showLogin()">Login</a></p>
                </form>
            </div>
        </div>
    <?php endif; ?>

    <script src="script.js"></script>
</body>
</html>