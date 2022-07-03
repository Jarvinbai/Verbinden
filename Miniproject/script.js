var pos=0,board,status,qus,choices,A,B,C,cor=0;
/* var questions=[
    ["____ is to surgery as writer is to ____","plan,outline","hospital,library","doctor,book","A"],
    ["c library functions will always invoke a system call when executed from a single-threaded process in a linux system","exit","malloc","sleep","B"],
    ["let the representation of a number in base 3 be 210. what is the hexadecimal representation of the number","15","21","D2","C"],
    ["there are five bags each containing identical sets of ten distinct chocolates. one chocolate is picked from each bag. the probability that at least two chocolates are identical is ______","0.3024","0.4235","0.6976","A"]
]; */

function DisplayQuestion(){
    board=document.getElementById("board");
    if(pos>=questions.length){
        board.innerHTML="<h2>you got "+cor+" of "+questions.length+"<h2>";
        document.getElementById("status").innerHTML="Quiz completed";
        pos=0;
        cor=0;
        return false;
    }
    document.getElementById("status").innerHTML="Question "+(pos+1)+" of "+questions.length;
    qus=questions[pos].QUE;
    A=questions[pos].O1;
    B=questions[pos].O2;
    C=questions[pos].O3;
    D=questions[pos].O4;
    board.innerHTML="<h3>"+qus+"</h3>";
    board.innerHTML+="<label><input type='radio' name='choices' value='A'> "+A+"</label>";
    board.innerHTML+="<label><input type='radio' name='choices' value='B'> "+B+"</label>";
    board.innerHTML+="<label><input type='radio' name='choices' value='C'> "+C+"</label>";
    board.innerHTML+="<label><input type='radio' name='choices' value='D'> "+D+"</label>";
    board.innerHTML+="<button onclick='checkAnswer()'>Submit Answer</button>";


}
function checkAnswer(){
    var choice;
    choices=document.getElementsByName("choices");
    for(var i=0;i<choices.length;i++){
        if(choices[i].checked){
            choice=choices[i].value;
        }

    }
    if(choice==questions[pos].ANS){
        cor++;

    }
    pos++;
    DisplayQuestion();
}
