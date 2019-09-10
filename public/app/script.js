var startSec = 0;
var startMin = 0;
var clickCount = 0;
var matchesFound = 0;
var matchFound = false;
var clickImage;
window.addEventListener('load', () =>{
    let minCounter = document.getElementById('minutes');
    let preMinCounter = document.getElementById('preMin');
    let secCounter = document.getElementById('seconds');
    let preSecCounter = document.getElementById('preSec');
    var counter = setInterval(() =>{
        if(startSec < 59){
            startSec++;
            secCounter.innerText = startSec;
        }
        else{
            startSec = 0;
            startMin++;
            secCounter.innerText = startSec;
            preSecCounter.innerText = 0;
            minCounter.innerText = startMin;
        }
        if(startSec == 10){
            preSecCounter.innerText = "";
        }

        if(startMin == 10){
            preMinCounter.innerText = "";
        }
    },1000)
   document.onclick = (e) =>{
       // if(e.target.has)
       let clickTarget = e.target;
       if(clickCount == 0){
           if(clickTarget.classList[0] == 'no-opacity'){
               clickCount++;
               clickImage = clickTarget;
               clickTarget.classList.remove('no-opacity');
               clickTarget.classList.add('full-opacity');
           }
       }
       if(clickCount == 1 && !matchFound){

           if(clickTarget.classList[0] == 'no-opacity'){
               clickTarget.classList.remove('no-opacity');
               matchFound = true;
               if(clickTarget.src == clickImage.src){
                    clickImage.classList.remove('full-opacity');
                    clickImage = null;
                    matchesFound++;
                    clickCount = 0;
                   matchFound = false;

               }
               else{
                   setTimeout(() =>{
                       clickTarget.classList.add('no-opacity');
                       clickImage.classList.add('no-opacity');
                       clickImage.classList.remove('full-opacity');
                       clickImage = null;
                       clickCount = 0;
                       matchFound = false;
                   }, 1000);

               }
           }
       }
       updateCounter();
       if((matchesFound == 8)){
           clearInterval(counter);
       }
   }
});
updateCounter = () =>{
    document.getElementById('matchCounter').innerText = matchesFound;

};


