# voting-website
# 🗳️ Online Voting System

## 🚀 Features

- User and Admin Login/Signup
- Admin can:
  - Add candidate groups
  - Monitor voting activity
- Voters can:
  - Login and vote once
  - View groups with vote count
- Session management
- Simple and clean UI
## 📁 Project Structure

voteing/
├── api/                    # Backend PHP scripts for API
│   ├── connect.php         # DB connection
│   ├── login.php           # User login logic
│   ├── register.php        # User registration logic
│   └── vote.php            # Voting logic
├── css/
│   └── stylesheet.css      # Main stylesheet
├── routes/                 # Additional UI pages
│   ├── dashboard.php       # Dashboard page
│   ├── logout.php          # Logout handler
│   └── register.html       # Registration form
├── uploads/                # Uploaded images/files
│   ├── 2.png
│   ├── BH.jpeg
│   ├── bjp.jpeg
│   └── conn.jpg
├── index.html              # Landing/Home page

