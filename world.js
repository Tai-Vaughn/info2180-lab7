window.onload = function() {
    var lookup = document.getElementById('lookup');
    var httpRequest = new XMLHttpRequest();
    var url = 'world.php?country='
    
    lookup.addEventListener('click' , function(){
        var result = document.getElementById('result');
        var searchOption = document.getElementById('country').value;
        httpRequest.open('GET',url+searchOption) 
        httpRequest.send();
        httpRequest.onload =function(){
            if(this.readyState == 4 && this.status == 200){
                alert(this.responseText)
            }
        }
        
    })
}