/* Create a faulty calculator using JavaScript

This faulty calculator does following:
1. It takes two numbers as input from the user
2. It perfoms wrong operations as follows:

+ ---> -
* ---> +
- ---> /
/ ---> **


It performs wrong operation 10% of the times

*/

let random = Math.random();
let first = prompt("Enter first number: ");
let second = prompt("Enter second number: ");
let operation = prompt("Enter operation: ");
let obj = {
  "+" : "-",
  "*" : "+",
  "-" : "/",
  "/" : "**",
}
if(random>0.1){
  // Correct Calculation
  alert(`The result is ${eval(`${first} ${operation} ${second}`)}`);
}

else{
  // Wrong Calculation
  operation = obj[operation];
  alert(`The result is ${eval(`${first} ${operation} ${second}`)}`);
}