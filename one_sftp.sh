#!/bin/bash

sshpass -p '$one_sftp_pwd' sftp $one_usr@$one_sftp:staging/wp-content/themes << EOF
put -r slow-wheels
bye
EOF
