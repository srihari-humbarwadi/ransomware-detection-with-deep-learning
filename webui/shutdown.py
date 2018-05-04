from paramiko import SSHClient, AutoAddPolicy


SERVER_IP = 'localhost'
SERVER_PASS = 'HACKERhere'
CMD = 'notepad'
SERVER_USERNAME = "Srihari Humbarwadi@ROGGL703"

ssh = SSHClient()
ssh.set_missing_host_key_policy(AutoAddPolicy())

ssh.connect(SERVER_IP, username=SERVER_USERNAME, password=SERVER_PASS)

ssh_stdin, ssh_stdout, ssh_stderr = ssh.exec_command(CMD)
