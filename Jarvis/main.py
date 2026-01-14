import time
import speech_recognition as sr
import pyttsx3
import playsound as ps

recognizer = sr.Recognizer()
START_SOUND = "Jarvis.mp3"

# Function to convert text to speech
def speak(text):
  engine = pyttsx3.init()
  engine.say(text)
  engine.runAndWait()
  engine.stop()

# Function to listen and recognize speech
def listen_speech():
  with sr.Microphone() as source:
    print("Listening...")
    try: 
      audio = recognizer.listen(source, timeout=3)
      command = recognizer.recognize_google(audio)
      return command.lower()
    except sr.WaitTimeoutError:
      return None
    except sr.UnknownValueError:
      return None
    except sr.RequestError:
      print("Could not request results; check your network connection.")
      return None
    except Exception as e:
      print(f"An error occurred: {e}")
      return None

# Function to process recognized commands
def process_command(command):
  if "hello" in command:
    speak("Hello! How can I assist you today?")
  elif "time" in command:
    current_time = time.strftime("%I:%M %p")
    speak(f"The current time is {current_time}")

# Main loop
if __name__ == "__main__":
  ps.playsound(START_SOUND, block=True)
  with sr.Microphone() as source:
    print("Calibrating microphone for ambient noise...")
    recognizer.adjust_for_ambient_noise(source, duration=1)
  
  failure_count=0
  
  while True:
    command = listen_speech()
    
    if command:
        process_command(command)
        failure_count=0

        if "exit" in command or "quit" in command or "stop" in command:
          speak("Goodbye!")
          break
    else:
      failure_count+=1
      speak("I can't hear you. Please try again.")
      
    if failure_count>=5:
      speak("Too many Failed Attempts. Exiting the program.")
      break

    time.sleep(1) 