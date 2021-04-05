#!/bin/bash

# bluesky controller
CTL="${BASEURL}index.php?/module/bluesky/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/bluesky.sh" -o "${MUNKIPATH}preflight.d/bluesky.sh"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/bluesky.sh"

	# Set preference to include this file in the preflight check
	setreportpref "bluesky" "${CACHEPATH}bluesky.txt"

else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/bluesky.sh"

	# Signal that we had an error
	ERR=1
fi
