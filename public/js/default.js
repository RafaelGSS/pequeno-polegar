function check() {
    alert('oi');
    var element = document.getElementById('select').value;
    console.log(element);

      if(element == 'name'){
        x = document.getElementById('numeric');
        y = document.getElementById('radio');
        x.setAttribute('display', 'none');
        y.setAttribute('display', 'none');
      }
}
