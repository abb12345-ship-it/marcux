SANDY ASKS — XAMPP classroom quiz

SETUP
1. Extract the contents of this Quiz folder into C:\xampp\htdocs\Quiz.
   The resulting path must be C:\xampp\htdocs\Quiz\index.php (not Quiz\Quiz\index.php).
2. Start Apache in XAMPP Control Panel. MySQL is not required.
3. Open http://localhost/Quiz/ on the laptop.
4. Edit questions, then choose Host a quiz. Twenty sample questions are included.
5. In the host sidebar choose Open projector screen. Drag that browser window onto
   an extended display, or duplicate the laptop display and show that tab fullscreen.
   On a duplicated display, open the projector tab in the host browser. Press F
   for fullscreen, and SPACE to advance (start / lock / reveal / leaderboard /
   next question). These shortcuts work only in the browser that owns the room.

CONNECT PHONES
1. Connect the laptop and phones to the same Wi-Fi or a phone hotspot.
2. On Windows, run ipconfig in Command Prompt. Find the active Wi-Fi adapter IPv4
   address, for example 192.168.1.25.
3. In host controls > Join link & setup, replace localhost in the link with that IP:
   http://192.168.1.25/Quiz/index.php?view=player&room=123456
   Keep the actual room code shown by your game. The QR updates automatically.
4. Test that link on one phone before the class. If Apache asks for Windows Firewall
   permission, allow it on your trusted private network. If using a nonstandard
   Apache port, include it, e.g. http://192.168.1.25:8080/Quiz/...
5. School Wi-Fi may isolate devices. If phones cannot open the link, use a shared
   hotspot or ask the network administrator to allow devices to reach the laptop.
6. Leave Apache and the laptop running throughout the quiz. Prevent laptop sleep.

RUN THE SHOW — AUTOMATIC BY DEFAULT
After everyone joins, assign characters in the host's Assign player characters
panel. Upload a head photo plus a funny body PNG, or upload a complete character
as the body. Head/body uploads are optional, up to 1 MB and 4096 pixels per image.
Players cannot choose, upload, or edit their profiles. Transparent PNG is best.
Close the panel and click Start automatic quiz.

The flow is: 3-second countdown -> question -> everyone answers OR timer expires
-> correct answer and funny reactions (5 seconds) -> character race scoreboard
(at least 8 seconds, longer for larger groups) -> next countdown/question.
At round changes, a 3-second round introduction appears. The final race leads
to the winner screen. Race distance reflects each player's accumulated points
out of the quiz's possible maximum. Groups of 8 racers are shown automatically.

Keep the projector and host tabs open so they keep syncing with the server.
The server advances the game on incoming requests, using server timestamps;
if every device stops polling, it continues on the next request, preserving
answer deadlines. No background service or Windows scheduled task is needed.

Pause quiz / Resume quiz freezes timers and automatic progression. Switch to
manual is available for presenter-led pacing. Manual controls still work as
overrides. On the projector in the host browser: F fullscreen, P pause/resume,
SPACE manually advances. Enable Sound on each screen where reactions are wanted.
Player phones use playful spoken Woohoo/Boo reactions if their browser supports
speech synthesis. A user tap to enable sound is required; voices vary by device.
Boo feedback happens after reveal so it cannot give away answers early.

Speed scoring: 300–1,000 points based on server-received response time.
Other rounds use each question's configured points. Bonuses: +100 at a 3-answer
streak and +250 at a 5-answer streak. Incorrect or missing answers reset streaks.
Each player submits once. Refreshing the same phone/browser restores them.
Use unique names for a clear leaderboard. Scores tie by correct count, then name.


EDITING
Use Edit questions before creating a room, or in the room lobby. Change options,
correct answers, timers, points, explanations, and rounds. Move questions up/down.
Round assignments do not reorder the quiz automatically. The built-in sample has
four consecutive groups of five. Export JSON to keep a portable backup.
For image clues, copy images into assets and enter assets/your-image.jpg.
Browser quiz drafts and host/player access tokens persist locally. Game data is
stored server-side in a project-specific directory inside the OS temporary folder.
Do not delete temporary game files during class. OS cleanup can remove old rooms;
export quiz content separately. Keep host control links/tokens private.

TECHNICAL
PHP 7.4+ with standard file functions; no extensions, CDN, database, or internet
required. Uses a server-side exclusive file lock for atomic answer submissions
and state/scoring updates. Devices poll every second. Designed for a classroom
(up to 100 players); real 50-device load has not been measured. Network latency
can influence the speed round. Correct answers are withheld from public/player
API responses until reveal. The host is authorized by a random room-specific token.
This is a local classroom application. Do not expose XAMPP directly to the public
internet. QR library: qrcodejs 1.0.0 by davidshimjs (MIT), included locally.

VALIDATION
PHP and JavaScript syntax checks passed. A complete two-player, 20-question API
game passed, including permission checks, duplicate submissions, timer expiry,
scoring, streaks, final results, and restart. Browser visual testing could not run
in the build environment. Test the interface and one phone on your network before
class; full 50-device classroom load has not been tested.

STUDIO THEME UPDATE
New bold typography, cream/purple/orange/yellow colour system, hard-edged answer
blocks, animated round transitions, and a brighter leaderboard and podium.
To update an existing installation, back up your current files, then replace the
application files inside C:\xampp\htdocs\Quiz with this package. Keep the same
folder name. Host/player tokens remain in the same browser; game data remains in
the server temporary folder. Press Ctrl+F5 after updating to reload the new assets.

AUTOPILOT & CHARACTER UPDATE VALIDATION
Automatic phase progression, both answer/time triggers, once-only scoring,
pause/resume, final completion, host-only image uploads, and invalid-image
rejection passed API checks. JavaScript/PHP syntax checks passed. The new race
layout, speech voices, and real classroom device load still need a browser test.

SHINCHAN CARTOON CLUB UPDATE
Rounded corners, raised 3D-style buttons and answer cards, pastel cartoon colours,
and four generated Shinchan character sprites are included locally. Tap the
characters in the home screen/lobby for playful reactions. The host can choose
Shinchan, Kazama, Nene, or Bo-chan for a player in Assign player characters.
Default racers use these characters automatically; custom body uploads override
the built-in body. Uploaded player heads appear over the built-in cartoon bodies.
Participants still cannot edit their character or images.
Character assets were generated using the built-in image tool with this prompt:
"Transparent 2-by-2 sprite sheet of Shinchan, Kazama, Nene, and Bo-chan in playful
running poses, facing right, glossy 3D toy/cartoon style, no text or frames."
Motion respects the device's reduced-motion preference. Existing question data,
scoring, profile uploads, and automatic game flow are retained. This package has
syntax and server feature validation; please check its new visual layouts in the
laptop and phone browsers before class.
