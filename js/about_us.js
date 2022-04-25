const btn = document.getElementsByClassName('btn');
for (var i = 0; i < btn.length; i++) {
    btn[i].addEventListener('mouseover', function(){
        this.style.backgroundColor = 'grey'
        this.style.color = 'black';
    })
    
    btn[i].addEventListener('mouseout', function(){
        this.style.backgroundColor = 'black';
        this.style.color = 'white';
    })
}

document.getElementById('map').addEventListener('mouseover', function(){
    this.style.border = "thick solid #0000FF";
})