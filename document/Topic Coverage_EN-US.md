### Topics Coverage

Systems and Web Development Workshop **Team 4**

| Topic              | Features                  | Code filename – line numbers              | Slide numbers |
| ------------------ | ------------------------- | ----------------------------------------- | ------------- |
| HTML – link        | Navigation links          | index.html 13-20, aboutus.html 5-10       | Page 7        |
| HTML – table       | Display team member table | aboutus.html 8-34                         | Page 9        |
| HTML – option list | Select hometown           | hometown.html 15-21                       | Page 6        |
| HTML – img         | Show member photos        | aboutus.html 16-34                        | Page 9        |
| HTML – form        | Login form                | login.html 9-23                           | Page 8        |
| HTML – form        | Register form             | register.html 9-34                        | Page 8        |
| CSS                | page styling              | styles.css 1-136                          | Page 8        |
| JavaScript         | Dynamic page loading      | script.js 7-19, 132-146                   | Page 6        |
| JavaScript         | Login validation          | script.js 90-104                          | Page 8        |
| JavaScript         | Register validation       | script.js 68-89                           | Page 8        |
| JavaScript         | Hometown selection logic  | script.js 40-67                           | Page 7        |
| JavaScript         | Subscribe function        | script.js 105-127                         | Page 18       |
| JavaScript         | Logout function           | script.js 128-130                         | Page 8        |
| PHP                | Login processing          | php/login.php 1-27                        | Page 13       |
| PHP                | Register processing       | php/register.php 1-34                     | Page 8        |
| PHP                | Subscribe processing      | php/subscribe.php 1-20                    | Page 10       |
| PHP                | Check login status        | php/checklogin.php 1-15                   | Page 19       |
| PHP                | Logout processing         | php/logout.php 1-10                       | Page 8        |
| MySQL              | User table structure      | php/login.php 5-15, php/register.php 5-15 | Page 14       |
| MySQL              | Login verification        | php/login.php 10-27                       | Page 12       |
| MySQL              | Register insert           | php/register.php 16-34                    | Page 12       |

==Explanation==

| Topic         | Features                                   | Code filename – line numbers | Slide numbers |
| ------------- | ------------------------------------------ | ---------------------------- | ------------- |
| Extra Feature | Comment section (only visible after login) | guestbook.html 1-40          | Page 15       |
| Extra Feature | Comment section (only visible after login) | script.js 150-200            | Page 15       |
| Extra Feature | Comment section (only visible after login) | php/comment.php 1-40         | Page 15       |
| Extra Feature | Logout button                              | alreadylogin.html 20-30      | Page 18       |
| Extra Feature | Logout button                              | script.js 128-130            | Page 18       |

We implemented a comment section that is only visible to logged-in users, and a logout button.

- The comment section is shown in guestbook.html and is controlled by login status checked in script.js.
- The backend logic is handled in php/comment.php.
- The logout button is implemented in alreadylogin.html and handled by the logout() function in script.js.