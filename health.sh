#!/bin/sh

curl --noproxy localhost, localhost:8080/health.php | grep OK
# Comment
if [ $? -ne 0 ]
then
	exit 254
fi
