\#nowplaying
==========

##installation
Upload the directory "nowplaying" on your webserver running PHP 5 (or higher). Then edit lastfm.php – it's easy as 1-2-3!

##compatibility
###Server
PHP 5 or higher.
###Client
Works best with Safari or Google Chrome. WebKit recommended for best user-experience. HTML5 notifications currently only running in Safari.

##copyright
There's a picture included called 'festival.jpg'. I made the picture and allow you to use it in \#nowplaying however you want but I would like you not to use it in a commercial way or [mail me](mailto:nowplaying@jh0.eu "write me an email!") if you want to do so. Thank you!
See additional information in the LICENSE file.

##preview
![HTML5 Notifications in Safari](HTML5_Notifications.png "HTML5 Notifications (Safari)")

HTML5 Notifications (Safari)

![Preview](Preview_2.png "Preview 2 (Chrome on Mac OS X)")
Preview (Chrome on Mac OS X)

![Preview](Preview.png "Preview (Safari on Mac OS X)")
Preview (Safari on Mac OS X)

Visit my website for a [live preview](http://nowplaying.jh0.eu "live preview").

##FAQ
####Why does it take so long to refresh?
It gets the new meta information (song, album, artist, cover) every 4 seconds (the background refreshes every 5 seconds) to save the lastfm API from getting overloaded. It's also more reliable when it takes longer. You can change it in `index.html` if you know, what you're doing.
####How can I change the period of the top artists statistics?
Change `$period`in `lastfm.php` to either `overall`, `7day`, `1month`, `3month`, `6month` or `12month`.
####I found a bug!
[email me!](mailto:nowplaying@jh0.eu "write me an email!")
***
Have fun, 

Jannis
@Der_Hutt
