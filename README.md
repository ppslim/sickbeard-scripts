sickbeard-scripts
=================

A collection of Sickbeard post-processing scripts for various functions.

These scripts run independantly of sickbeard and should be kept out of the sickbeard root installation directory, to ensure correct update operation from the live Repo

All code should be self executing, where this is not possible, a shell wrapper script that is capable of this should lauch the app.

##Code
###PHP
####newEpisodeDir
Creates symlinks in a directory of your choice, to all imports that are post-processed. Acts as an unwatched dir.

Delete the symlinks at will, as the original files will remain.
