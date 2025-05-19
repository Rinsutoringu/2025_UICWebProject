### Topics Coverage

Systems and Web Development Workshop **Team 4**

| Topic              | Features                  | Code filename – line numbers              | Slide numbers |
| ------------------ | ------------------------- | ----------------------------------------- | ------------- |
| HTML – link        | Navigation links          | index.html 13-20, aboutus.html 5-10       |               |
| HTML – table       | Display team member table | aboutus.html 8-34                         |               |
| HTML – option list | Select hometown           | hometown.html 15-21                       |               |
| HTML – img         | Show member photos        | aboutus.html 16-34                        |               |
| HTML – form        | Login form                | login.html 9-23                           |               |
| HTML – form        | Register form             | register.html 9-34                        |               |
| CSS                | page styling              | styles.css 1-136                          |               |
| JavaScript         | Dynamic page loading      | script.js 7-19, 132-146                   |               |
| JavaScript         | Login validation          | script.js 90-104                          |               |
| JavaScript         | Register validation       | script.js 68-89                           |               |
| JavaScript         | Hometown selection logic  | script.js 40-67                           |               |
| JavaScript         | Subscribe function        | script.js 105-127                         |               |
| JavaScript         | Logout function           | script.js 128-130                         |               |
| PHP                | Login processing          | php/login.php 1-27                        |               |
| PHP                | Register processing       | php/register.php 1-34                     |               |
| PHP                | Subscribe processing      | php/subscribe.php 1-20                    |               |
| PHP                | Check login status        | php/checklogin.php 1-15                   |               |
| PHP                | Logout processing         | php/logout.php 1-10                       |               |
| MySQL              | User table structure      | php/login.php 5-15, php/register.php 5-15 |               |
| MySQL              | Login verification        | php/login.php 10-27                       |               |
| MySQL              | Register insert           | php/register.php 16-34                    |               |

==Explanation==

| Topic         | Features                                                     | Code filename – line numbers         |
| ------------- | ------------------------------------------------------------ | ------------------------------------ |
| Extra Feature | Comment section (only visible after login)                   | guestbook.html 1-40                  |
| Extra Feature | Comment section (only visible after login)                   | script.js 150-200                    |
| Extra Feature | Comment section (only visible after login)                   | php/comment.php 1-40                 |
| Extra Feature | Logout button                                                | alreadylogin.html 20-30              |
| Extra Feature | Logout button                                                | script.js 128-130                    |

We implemented a comment section that is only visible to logged-in users, and a logout button.

- The comment section is shown in guestbook.html and is controlled by login status checked in script.js.
- The backend logic is handled in php/comment.php.
- The logout button is implemented in alreadylogin.html and handled by the logout() function in script.js.