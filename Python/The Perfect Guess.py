import random
print("Welcome to 'The Perfect Guess' game!")
print("I have selected a number between 1 and 100.")
print("Can you guess what it is?")
number = random.randint(1, 100)
attempts=0
guess = int(input("Enter your guess: "))
while(guess != number):
    if(guess > number):
      print("Too high!")
    else:
      print("Too low!")
    attempts += 1
    guess = int(input("Enter your guess: "))
print(f"Congratulations! You guessed the number in {attempts} attempts.")