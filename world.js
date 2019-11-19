window.onload = function() {
    var lookup = document.getElementById('lookup');
    var httpRequest = new XMLHttpRequest();
    var url = 'world.php?country='
    let countries;
    lookup.addEventListener('click' , function(){
        var searchOption = document.getElementById('country').value;
        httpRequest.open('GET',url+searchOption) 
        httpRequest.send();
        httpRequest.onload =function(){
            if(this.readyState == 4 && this.status == 200){
                var result = document.getElementById('result');
                result.innerHTML = this.responseText
            }
        }
        
    })
}