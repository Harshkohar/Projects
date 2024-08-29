import os
import sys
import subprocess

def execution(command, current_working_directory):
    if command.startswith("cd "):
        try:
            path=command[3:].strip()
            os.chdir(path)
            return os.getcwd()
        except FileNotFoundError:
            print(f"cd: no such file or directory: {path}", file=sys.stderr)
        except PermissionError:
            print(f"cd: permission denied: {path}", file=sys.stderr)
        return current_working_directory
    try:
        output=subprocess.run(command, shell=True, capture_output=True, check=True, text=True)
        print(output.stdout, end='')
        if output.stderr:
            print(output.stderr, file=sys.stderr)
    except subprocess.CalledProcessError as exception:
        print(f"Command failed with error: {exception}", file=sys.stderr)
    except FileNotFoundError:
        print(f"Command not found: {command.split()[0]}", file=sys.stderr)
    return current_working_directory



def main():
    current_working_directory=os.getcwd()
    while True:
        command=input(f"{current_working_directory} $").strip()

        if(command.lower()=="exit"):
            print("Exiting shell.....")
            break
        if not command:
            continue
        
        current_working_directory=execution(command, current_working_directory)


if __name__=="__main__":
   main() 

