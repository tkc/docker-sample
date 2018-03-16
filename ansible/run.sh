#!/usr/bin/env bash
ansible webservers -m copy -a "src=/etc/hosts dest=/tmp/hosts"
ansible webservers -m file -a "dest=/tmp/hosts mode=600 owner=root group=root" -s -K
ansible-playbook "＜PlaybookName＞"
