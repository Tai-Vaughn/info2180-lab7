window.onload = function() {
    var lookup = document.getElementById('lookup');
    var lookupCity= this.document.getElementById('LookupCities')
    var httpRequest = new XMLHttpRequest();
    lookup.addEventListener('click' , function(){
        var searchOption = document.getElementById('country').value;
        var url = 'world.php?country='+searchOption+"&context=country"
        httpRequest.open('GET',url) 
        httpRequest.send();
        httpRequest.onload =function(){
            if(this.readyState == 4 && this.status == 200){
                var result = document.getElementById('result');
                result.innerHTML = this.responseText
            }
        }
        
    })

    lookupCity.addEventListener('click',function(){
        var searchOption = document.getElementById('country').value;
        var url = 'world.php?country='+searchOption+"&context=cities"
        httpRequest.open('GET',url) 
        httpRequest.send();
        httpRequest.onload =function(){
            if(this.readyState == 4 && this.status == 200){
                var result = document.getElementById('result');
                result.innerHTML = this.responseText
            }
        }
    })
}