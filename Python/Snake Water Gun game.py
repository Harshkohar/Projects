import random 
wish='y'
while(wish=='y'):
  # computer_choice = random.randint(1, 3)
  computer_choice = random.choice([1, 2, 3])
  user_choice = int(input("Enter 1 for Snake, 2 for Water, 3 for Gun: "))
  if computer_choice == 1:
      computer_choice_name = "Snake"
  elif computer_choice == 2:
      computer_choice_name = "Water"
  else:
      computer_choice_name = "Gun"
  if user_choice == 1:
      user_choice_name = "Snake" 
  elif user_choice == 2:
      user_choice_name = "Water"
  else:
      user_choice_name = "Gun"
  print(f"Computer chose: {computer_choice_name}")
  print(f"You chose: {user_choice_name}")
  if computer_choice == user_choice:
      print("It's a tie!")
  elif (computer_choice==1 and user_choice==2) or (computer_choice==2 and user_choice==3) or (computer_choice==3 and user_choice==1):
      print("Computer Win!")
  else:
      print("You Win!")

  wish = input("Want to play(y/n): ")