#!/bin/zsh

# Script to collect data
# and put the data into outputfile

CWD=$(dirname $0)
CACHEDIR="$CWD/cache/"
OUTPUT_FILE="${CACHEDIR}bluesky.txt"
SEPARATOR=' = '
SERIAL=$(/usr/libexec/PlistBuddy -c "print :'serial'" /var/bluesky/settings.plist)
VERSION=$(/usr/libexec/PlistBuddy -c "print :'version'" /var/bluesky/settings.plist)

# Test for BlueSky settings.plist exists
if [ -d "/var/bluesky/settings.plist" ]; then

# Output data here
echo "version${SEPARATOR}$VERSION" > ${OUTPUT_FILE}
echo "serial${SEPARATOR}$SERIAL" >> ${OUTPUT_FILE}
# END Output data

else
# There is no settings.plist so Remove the output file
rm -rf $OUTPUT_FILE
fi