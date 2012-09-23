#!/usr/bin/php
<?php
/*
	This script is intended as a Sickbeard post processing script.
	Input is from the command line as 6 arguments
	This file will create a symlink in a configured folder, intended to serve as a
	directory containing unwatched episodes
*/

# Set the directory in which the symlinks should be created
define("SBBASEDIR", "/media/verbatim/Video/TVToBeWatched");

# Set the path from which a relative path should be created (required were storage is a NAS)
# The defaults would result in something like "test.mkv > ../TV/Test/S01/test.mkv" instead of "test.mkv > /media/verbatim/Video/TV/Test/S01/test.mkv"
define("SBBASEREM", "/media/verbatim/Video/");

$showPath = $argv[1];

if (file_exists($showPath)) {
	# We should not proceed unless the destination show file actually exists
	$fileComponents = pathinfo($showPath);
	$relPath = substr($fileComponents['dirname'], strlen(SBBASEREM));
	print("Creating symlink to new episode directory\n");
	$exec = sprintf(
	"%s %s && %s -s \"../%s/%s\"",
		"cd",
		SBBASEDIR,
		"/bin/ln",
		$relPath,
		$fileComponents['basename']
	);
	#printf("Source: %s\n", $exec);
	exec($exec);
}
