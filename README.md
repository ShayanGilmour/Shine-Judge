# Automatic Code Judge
Using several programming languages, without **any** standard or framework, this judge works! One reason for this is that, so it won't be limited to anything. You can add a question for it with any kind of checker.

### Prelude:
This site isn't very advanced and doens't use cookies or anything like that. I've made this when i was 19. This project made me learn a lot of languages (the languages used in it): HTML and CSS, Java Script, PHP. And Python, C++, Bash are the languages which I knew at the time, but got more skilled because of this project.

This site runs on Apache2 server. There are 2 servers which make this site possible: First server has all the data and data bases and input/output samples and .... The second server, only runs the submitted codes. So if anything happens because of some distructive code or etc. the main server doesn't get affected at all, as it doesn't run any code.

### Bascics:
The main page looks like _left_ figure. Then the in the problem sections, for different programming languages, there are some questions placed in different sections (levels). In each section, there are the name of the questions.

<p float="left">
  <img src="https://user-images.githubusercontent.com/12760574/130933899-2a7ee1e9-1481-4661-bc4d-a96c553f96a4.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130933906-3cf16ede-e386-4163-abfa-f0180b3a05e1.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130933909-986ace39-4efd-4042-a652-88b0abfe7470.png" height="400" />
</p>

The for every question, there's the statement of the question, the syntax of the input and output, and some sample input/output. The username and password must be entered as well. Then, the site (second server) will judge the code and get your the results:

<p float="left">
  <img src="https://user-images.githubusercontent.com/12760574/130935483-c0f2f959-a9f6-4c79-83ed-07d3d537c609.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130935505-0347b683-5655-42ad-a55b-2f967c2ee796.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130935524-cb2feb74-d429-4e95-81f3-bf7270ce9569.png" height="400" />
</p>

And if the code performs incorrectly or doesn't compile, or exceeds the time limit, the results would be something like these:

<p float="left">
  <img src="https://user-images.githubusercontent.com/12760574/130936508-1986a55a-e908-4ecb-aa3b-a730a6689559.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130936513-90513e8f-acc0-4a54-82f9-3fffd00a1746.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130936516-4d491330-4a0f-4297-901d-e1ef4dd57db3.png" height="400" />
</p>

As mentioned, **any** kind of checker can be made for this judge. For instance, one of the "unusual" question/checker that this site has, is the one that states: "You're given integer `n`. Generate `n` random floats in range (0, 1) and print the maximum of them." As this question has probablity in it, and there's no actual right output, ordinary checker can't work for this question. But the checker for this quesiton is present in the site. This checker checks if the code always outputs the same number. Also, it uses probablity to disqualify the "wrong" codes:

It accepts the correct code:
<p float="left">
  <img src="https://user-images.githubusercontent.com/12760574/130938034-939a77ee-1b4e-4696-ae3b-9dd3842d0a91.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/130938043-03cbfcb1-c208-4c0f-9d70-a2f16c68d5ca.png" height="400" />
</p>

And if i replace "max" with "min", it won't accept the code! Not because it searches for the word `min` in the code, but, it uses probablity and figures it's very unlikely for the output to be correct.

### Features:
+ The clients can see their accepted codes
+ They admins have different permissions. For example the professors can add or edit their questions
+ Professors can take quizes from particular students in the site
+ It can have "connecting" questions as well
+ Admins (with required permissions) can see the server log from the site
+ Admins can add clients without `ssh`
+ Clients can have fun by changing the color of the site and suggesting a good color set to admins
+ Clients can write letters to the admins in the site


<p float="left">
  <img src="https://user-images.githubusercontent.com/12760574/131015733-88c01f44-69ac-4e69-b3f2-6ad7c338212e.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/131015741-5488c28c-e4ea-4302-acc7-da3a14ac5527.png" height="400" />
  <img src="https://user-images.githubusercontent.com/12760574/131015743-1bb3ec9f-d836-4361-b1c4-acc68807e7f8.png" height="400" />
</p>


### Security:
As I mentioned, I've made this site without any framework or et cetera and at the time, I didn't have any knowledge of security. This site is not completely secure, and as I've wrote in the site, **Clients Must NOT use Important Passwords** for their account. The site saved the passwords, without any hashing. The directories with some "code" after their name, is important directories, and by having some difficult postfix after their name, it makes a a little bit more secure. 

### Installation:
You'll need 2 (virual) servers. One main server, another just for running codes. Install the following on both of them:
+ Apache2
+ php
+ G++
+ Python3
+ 
Then place the files in each server. Then run the following command. (Replace `Server1IP` with the IP of the main server), and `Server2IP` with the executer server's ip.

```
grep -rl 'MainIP' ./ | xargs sed -i 's/MainIP/Server1IP/g'
grep -rl 'ExecuterIP' ./ | xargs sed -i 's/ExecuterIP/Server2IP/g'
````

Run these commands in both of the servers **after** setting up the files.
