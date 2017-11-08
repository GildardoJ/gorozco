
        // page is read page by page so we can't use variables that havent been declared in the
        // previous lines. 

    
    var selectedWord = ""; // set as global?
    var selectedHint = "";
    var board = "";
    var remainingGuesses = 6;
    var words = ["snake", "monkey", "beetle"];
    
    var randomInt = Math.floor( Math.random() * words.length );
    selectedWord = words[randomInt];
    console.log(selectedWord);
    
    initBoard();
    
    for (var letter of board){
    document.getElementById("word").innerHTML += letter + " ";
    }
    function initBoard(){
        
        for (var i =0; i < selectedWord.length;i++){
            
            board += "_";
        }
        
        console.log(board);
    }
    
    initBoard();
    
    for (var letter of board){
    document.getElementById("word").innerHTML += letter + " ";
    }