let scoreStr = localStorage.getItem('userScore');
let userScore;
resetScore(scoreStr);
function resetScore(scoreStr) {
  userScore = scoreStr ? JSON.parse(scoreStr) : {
    win: 0,
    lost: 0,
    tie: 0,
  };

  userScore.displayScore = function () {
    return `Win : ${userScore.win}, Lost : ${userScore.lost}, Tie : ${userScore.tie}`;
  }
  displayResult();
}


// Basic Method
// if (scoreStr !== undefined) {
//   userScore = JSON.parse(scoreStr);
// }
// else {
//   userScore = {
//     win: 0,
//     lost: 0,
//     tie: 0,
//   };
// }



function displayResult(userChoice, computerChoice, result) {
  localStorage.setItem('userScore', JSON.stringify(userScore));
  document.querySelector('#user').innerHTML = userChoice ? `Your choice is ${userChoice}` : '';
  document.querySelector('#computer').innerHTML = computerChoice ? `Computer's choice is ${computerChoice}` : '';
  document.querySelector('#result').innerHTML = result || '';
  document.querySelector('#score').innerHTML = `Score: ${userScore.displayScore()}`;
}

function getResult(userChoice, computerChoice) {

  if (userChoice === 'Bat') {
    if (computerChoice === 'Ball') {
      userScore.win++;
      return 'You won';
    }
    else if (computerChoice === 'Stump') {
      userScore.lost++;
      return 'Computer won';
    }

    else {
      userScore.tie++;
      return "It's a tie";
    }
  }

  else if (userChoice === 'Ball') {
    if (computerChoice === 'Stump') {
      userScore.win++;
      return 'You won';
    }
    else if (computerChoice === 'Bat') {
      userScore.lost++;
      return 'Computer won';
    }

    else {
      userScore.tie++;
      return "It's a tie";
    }
  }

  else {
    if (computerChoice === 'Bat') {
      userScore.win++;
      return 'You won';
    }
    else if (computerChoice === 'Ball') {
      userScore.lost++;
      return 'Computer won';
    }

    else {
      userScore.tie++;
      return "It's a tie";
    }
  }

}

function generateComputerChoice() {
  let randomNumber = Math.random() * 3;
  if (randomNumber < 1) {
    return 'Bat';
  }
  else if (randomNumber < 2) {
    return 'Ball';
  }
  else {
    return 'Stump';
  }
}
