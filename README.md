# CodeForest - Backup Repository 

## Description:

This is the repository for backup use for CodeForest, my Heroku app for CS-401 and for the submission of HW6 (and hopefully beyond). Currently it is still under work and while I've currently switched tracks from trying to implement a way to utilize/create Jupyter notebooks (I still want to implement this someday) I have tried to at least get some syntax highlighting done for common languages through the use of **Prism.js**. As of this moment, I can get syntax highlighted on hard coded lines within `<pre><code>` tags but I'd like to make it more dynamic by having users type into the `<textarea>` section and let Prism do the highlighting on the fly (can be done, as they have it on their site but I haven't been able to emulate it yet). 

However, this being said the website can create users and checks for duplicate users, valid emails, and whether or not the user has provided all of the necessary credentials for the current sign-up. Once, the users are created they are taken to the projects page so they can begin using CodeForest. While the main point of the site (as stated above) has yet to be fully implemented there's a rudimentary save feature at the moment. All this does is take the name the user has given the project (through the project's toolbar) and stores it in the DB along with other pertinent data (sans `<textarea>` text).

All passwords are currently hashed using `'sha256'+salt`

#### Link to website: [https://codeforest.herokuapp.com]

#### Author: Jaime Guevara

