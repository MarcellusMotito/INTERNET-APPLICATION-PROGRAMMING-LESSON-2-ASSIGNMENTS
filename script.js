document.getElementById('loginForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const username = this.username.value.trim();
    const password = this.password.value;
    
    if (username.length < 4) {
        alert('Username must be at least 4 characters');
        return;
    }
    if (password.length < 8) {
        alert('Password must be at least 8 characters');
        return;
    }
    this.submit();
});

document.getElementById('signupForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const username = this.username.value.trim();
    const password = this.password.value;
    
    if (username.length < 4) {
        alert('Username must be at least 4 characters');
        return;
    }
    if (password.length < 8) {
        alert('Password must be at least 8 characters');
        return;
    }
    this.submit();
});

if (document.getElementById('submissionForm')) {
    document.getElementById('submissionForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const aspiration = this.aspiration.value.trim();
        const hobby = this.hobby.value.trim();
        const talents = this.talents.value.trim();
        const school = this.school.value.trim();
        const major_course = this.major_course.value.trim();

        if (aspiration.length < 10) {
            alert('Aspirations must be at least 10 characters');
            return;
        }
        if (hobby.length < 3) {
            alert('Hobby must be at least 3 characters');
            return;
        }
        if (talents.length < 10) {
            alert('Talents must be at least 10 characters');
            return;
        }
        if (school.length < 3) {
            alert('School name must be at least 3 characters');
            return;
        }
        if (major_course.length < 3) {
            alert('Major course must be at least 3 characters');
            return;
        }

        this.submit();
    });
}

function showSignup() {
    document.querySelector('.login-box').style.display = 'none';
    document.querySelector('.signup-box').style.display = 'block';
}

function showLogin() {
    document.querySelector('.login-box').style.display = 'block';
    document.querySelector('.signup-box').style.display = 'none';
}